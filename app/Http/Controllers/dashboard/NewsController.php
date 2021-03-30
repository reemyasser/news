<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\ar\type_ar;
use App\Models\en\type_en;
use App\Models\main\news;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        if(session()->get('lang')==''){
            $lang='en';
         $alltypes=type_en::get();
      
     
        }
        else{
          $lang=  session()->get('lang');
          if($lang=='ar')
          {
            $alltypes=type_ar::get();   
          }
          else{
          $alltypes=type_en::get();
          }
        }
        return view('control.dashboard.index',compact('lang','alltypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show_ar()
    {
        //
        if(session()->get('lang')==''){
            $lang='en';
          $news=  news::with('news_en')->get();
      
      return view('control.dashboard.show_all_news',compact('lang','news'));
        }
        else{
          $lang=  session()->get('lang');
          $news=  news::with("news_$lang")->get();
      
          return view('control.dashboard.show_all_news',compact('lang','news'));
        }
    }
    /*
    public function show_en()
    {
    $news=  news::with('news_en')->get();
    return view('admin.show_all_news_en',compact('news'));
    }*/
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, news $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(news $news)
    {
        //
    }
}
