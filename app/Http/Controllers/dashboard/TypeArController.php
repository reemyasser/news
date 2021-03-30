<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\an\type_en as AnType_en;
use App\Models\main\news;
use App\Models\main\photo;
use App\Models\ar\type_ar;
use App\Models\en\type_en;
use Illuminate\Http\Request;

class TypeArController extends Controller
{
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
        if(session()->get('lang')==''){
            $lang='en';
            $type= type_en::get();
        }
        else{
            $lang=session()->get('lang');
            if(session()->get('lang')=='ar'){
            $type= type_ar::get();
        }
        else{
            $type=Type_en::get();
        }
            
        }
      

        return view('control.dashboard.create_category',compact('lang','type'));
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
        $type =type_ar::where('type_name',$request->name)->get();
        $type_en =type_ar::where('type_name',$request->name_en)->get();
        if($type->count()>0 | $type_en->count()>0){
            return  redirect()->back()->with('faild','category is exist');
        }
        else{
        type_ar::create([
            'type_name'=> $request->name
        ]);
        type_en::create([
            'type_name'=> $request->name_en
        ]);
         return  redirect()->back()->with('success','created successfully');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\type_ar  $type_ar
     * @return \Illuminate\Http\Response
     */
    public function show(type_ar $type_ar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\type_ar  $type_ar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(session()->get('lang')==''){
            $lang='en';
       $type= type_en::find($id);
        return view('control.dashboard.edit_category',compact('lang','type'));
        }
        else{
            $lang=session()->get('lang');
            if(session()->get('lang')=='ar')
            {
            
            $type= type_ar::find($id);
            }
            else
            {
                $type= type_en::find($id);
            }
             return view('control.dashboard.edit_category',compact('lang','type'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\type_ar  $type_ar
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        //
        $type=type_ar::find($id);
        $type->type_name=$request->name;
        $type->save();
        return redirect()->route('create.category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\type_ar  $type_ar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $type= type_ar::find($id);
      
      $news= news::with('news_ar')->where('type_id',$id)->get();
     
    
       foreach( $news as $item)
       {
        $photo= photo::with('photo_ar')->where('news_id',$item['id'])->get();
        foreach( $photo as $item1)
        {
            $item1->delete();
            $item1->photo_ar()->delete();
        }
           $item->delete();
           $item->news_ar()->delete();
       }
       $type->delete();







       $type= type_en::find($id);

       $news= news::with('news_en')->where('type_id',$id)->get();
       foreach( $news as $item)
       {
           $photo= photo::with('photo_en')->where('news_id',$item['id'])->get();
       foreach( $photo as $item1)
       {
           $item1->delete();
           $item1->photo_en()->delete();
       }
           $item->delete();
           $item->news_en()->delete();
       }
      $type->delete();


       return redirect()->back()->with('success','deleted successfully');
    }
}
