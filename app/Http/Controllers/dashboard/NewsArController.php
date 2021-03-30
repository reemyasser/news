<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;

use App\Models\book as ModelsBook;
use App\Models\main\news;
use App\Models\ar\news_ar;
use App\Models\en\news_en;
use App\Models\main\photo;
use App\Models\ar\photo_ar;
use App\Models\ar\type_ar;
use App\Models\en\type_en;
use App\Traits\UploadImages;
use Illuminate\Http\Request;
use stdClass;

class NewsArController extends Controller
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
        //
        $types_en = type_en::get();
        $types_ar = type_ar::get();
        return view('control.dashboard.create_news', compact('types_ar', 'types_en'));
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


        $file_name = $this->saveImages($request->media_name, 'assets/img');
        $news =  news::create([
            'media_name' => $file_name,
            'type_id' => $request->category
        ]);
        for ($i = 0; $i < $request->num_image; $i++) {

            $file_name1 = $this->saveImages($request["media_name$i"], 'assets/img');
            $photo = photo::create([
                'photo_name' => $file_name1,
                'news_id' => $news->id,
                'choice' => 0
            ]);
            photo_ar::create([
                'description' => $request["description_img$i"],
                'photo_id' => $photo->id
            ]);
        }
        $z = news_ar::create([
            'news_text' => $request->news_text,
            'description' => $request->description,
            'news_id' => $news->id
        ]);


        return redirect()->back()->with('success', 'created successfully');
    }
    public function store_img(Request $request)
    {
        if(session()->get('lang')==''){
            $lang='en';
        }
        else{
            $lang=session()->get('lang');
        }
        for ($i = 0; $i < $request->key; $i++) {
            echo ' <div style="border: 1px solid #ccc">
        
        <div class="form-group">
            <label for="upload_file">'. __('messages.image').''.($i+1).' </label>
            <input type="file" required class="form-control" name="media_name' .$i. '" id="upload_file"
               >
        </div>
        </div>';
        }
    }
    public function store_des_ar(Request $request)
    {
        if(session()->get('lang')==''){
            $lang='en';
        }
        else{
            $lang=session()->get('lang');
        }
        for ($i = 0; $i < $request->key; $i++) {
            echo ' <div style="border: 1px solid #ccc">
        <div class="form-group">
            <label> '. __('messages.description').''.($i+1).' </label>
            <textarea required cols="4" rows="4" class="form-control" name="description_img_ar' . $i . '"
               ></textarea>

        </div>
       
        </div>';
        }
    }
    public function store_des_en(Request $request)
    {
        if(session()->get('lang')==''){
            $lang='en';
        }
        else{
            $lang=session()->get('lang');
        }
        for ($i = 0; $i < $request->key; $i++) {
            echo ' <div style="border: 1px solid #ccc">
        <div class="form-group">
            <label> '. __('messages.description').''.($i+1).' </label>
            <textarea required cols="4" rows="4" class="form-control" name="description_img_en' . $i . '"
               ></textarea>

        </div>
       
        </div>';
        }
    }
    public function news_category($id)
    {
        if(session()->get('lang')==''){
            $lang='en';
        $news = news::with('news_en')->where('type_id', $id)->get();

        return view('control.dashboard.show_category_news', compact('lang','news'));
        }
        else
        {
           
                $lang=session()->get('lang');
            $news = news::with("news_$lang")->where('type_id', $id)->get();
    
            return view('control.dashboard.show_category_news', compact('lang','news'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\news_ar  $news_ar
     * @return \Illuminate\Http\Response
     */
    public function show(news_ar $news_ar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\news_ar  $news_ar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(session()->get('lang')==''){
            $lang='en';
        $type = type_en::get();
        $news =  news::with('news_en')->find($id);
        $photos = photo::with('photo_en')->where('news_id', $id)->get();
        return view('control.dashboard.edit_news', compact('lang','news', 'photos', 'type'));
        }
        else{
            $lang=session()->get('lang');
            if(session()->get('lang')=='ar')
            {
                $type = type_ar::get();
            }
           else{
            $type = type_en::get();
           }


            $news =  news::with("news_$lang")->find($id);
            $photos = photo::with("photo_$lang")->where('news_id', $id)->get();
            return view('control.dashboard.edit_news', compact('lang','news', 'photos', 'type'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\news_ar  $news_ar
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

            $photo_ar = photo_ar::where('photo_id', $photos[$i]['id'])->first();

            $photo_ar->description = $request["description_img$i"];
            $photos[$i]->save();
            $photo_ar->save();
        }

        $news_ar = news_ar::where('news_id', $id)->first();
        $news_ar->news_text = $request->news_text;
        $news_ar->description = $request->description;
        $news->save();
        $news_ar->save();
        return redirect()->route('show.allnews')->with('success', 'updated successfully');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\news_ar  $news_ar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $photo= photo::with('photo_ar')->where('news_id',$id)->get();
        foreach( $photo as $item)
        {
            $item->delete();
            $item->photo_ar()->delete();
        }
      $news=  news::find($id);
     $news_ar= news_ar::where('news_id',$id)->first();
    
     $news_ar->delete();






     $photo= photo::with('photo_en')->where('news_id',$id)->get();
        foreach( $photo as $item)
        {
            $item->delete();
            $item->photo_en()->delete();
        }
        $news=  news::find($id);
        $news_en= news_en::where('news_id',$id)->first();
        $news->delete();
        $news_en->delete();

     return redirect()->back()->with('success','deleted successfully');
    }
    public function convert(Request $request)
    {
        session()->put('lang',$request->key);
       
    }
}
