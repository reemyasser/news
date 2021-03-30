<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\main\news;
use App\Models\ar\news_ar;
use App\Models\ar\photo_ar;
use App\Models\en\news_en;
use App\Models\main\photo;
use App\Models\en\photo_en;
use App\Models\type_en;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class NewsEnController extends Controller
{
    use UploadImages;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //



        
        $file_name=$this->saveImages($request->media_name,'assets/img');
      $news=  news::create([
            'media_name'=> $file_name,
            'type_id' => $request->category_en
        ]);
        for($i=0 ;$i<$request->num_image;$i++){
            
            $file_name1=$this->saveImages($request["media_name$i"],'assets/img');
       $photo= photo::create([
            'photo_name'=>$file_name1,
            'news_id'=>$news->id,
            'choice'=>0
        ]);
        photo_en::create([
            'description'=>$request["description_img_en$i"],
            'photo_id' => $photo->id
        ]);
        photo_ar::create([
            'description' => $request["description_img_ar$i"],
            'photo_id' => $photo->id
        ]);
        }
        $z=news_en::create( [
            'news_text'=> $request->news_text_en,
            'description'=>$request->description_en,
            'news_id'=>$news->id
        ]);
       news_ar::create([
            'news_text' => $request->news_text,
            'description' => $request->description,
            'news_id' => $news->id
        ]);
           

            return redirect()->back()->with('success','created successfully');
    }
    public function news_category($id)
    {
        $news= news::with('news_en')->where('type_id',$id)->get();
       
        return view('control.dashboard.show_category_news',compact('news'));
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\news_en  $news_en
     * @return \Illuminate\Http\Response
     */
    public function show(news_en $news_en)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\news_en  $news_en
     * @return \Illuminate\Http\Response
     */
  /*  public function edit($id)
    {
        //
        $type = type_en::get();
        $news =  news::with('news_en')->find($id);
        $photos = photo::with('photo_en')->where('news_id', $id)->get();
        return view('admin.edit_news_en', compact('news', 'photos', 'type'));
    }*/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\news_en  $news_en
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $news =  news::find($id);
        if ($request->media_name != '') {
            $file_name = $this->saveImages($request->media_name, 'assets/img');
            $news->media_name = $file_name;
        }
        $news->type_id = $request->category;

        $photos = photo::where('news_id',$id)->get();
        for ($i = 0; $i < $request->count; $i++) {
           

            if ($request["media_name$i"] != "") {
                $file_name1 = $this->saveImages($request["media_name$i"], 'assets/img');
                $Photos[$i]['photo_name'] = $file_name1;
            }

            $photo_en = photo_en::where('photo_id', $photos[$i]['id'])->first();
        

            $photo_en->description = $request["description_img$i"];
            $photos[$i]->save();
            $photo_en->save();
        }

        $news_ar = news_en::where('news_id', $id)->first();
        $news_ar->news_text = $request->news_text;
        $news_ar->description = $request->description;
        $news->save();
        $news_ar->save();
        return redirect()->route('show.allnews')->with('success', 'updated successfully');
      
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\news_en  $news_en
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $photo= photo::with('photo_en')->where('news_id',$id)->get();
        foreach( $photo as $item)
        {
            $item->delete();
            $item->photo_en()->delete();
        }
        $news=  news::find($id);
        $news_en= news_en::where('news_id',$id)->first();
    
        $news_en->delete();




        $photo= photo::with('photo_ar')->where('news_id',$id)->get();
        foreach( $photo as $item)
        {
            $item->delete();
            $item->photo_ar()->delete();
        }
      $news=  news::find($id);
     $news_ar= news_ar::where('news_id',$id)->first();
     $news->delete();
     $news_ar->delete();
        return redirect()->back()->with('success','deleted successfully');
    }
}
