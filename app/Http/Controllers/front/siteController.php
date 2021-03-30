<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\main\book;
use App\Models\main\news;
use App\Models\ar\news_ar;
use App\Models\en\news_en;
use App\Models\main\photo;
use App\Models\type;
use App\Models\ar\type_ar;
use App\Models\en\type_en;
use App\Models\main\visitor;
use Illuminate\Http\Request;

class siteController extends Controller
{
    //
    public function home(){
      visitor::create(
        [
          'count'=>1
        ]
      );
      if(session()->get('lang')==''){
        $lang='en';
      $new_news=  news::with('news_en')->take(6)->orderBy('created_at','Desc')->get();
      $all_news=  news::with('news_en')->get();
      $all_types= type_en::get();
     
     $type_id= type_en::select('id')->where('type_name','researches')->get();
      $t7kykat= news::with('news_en')->where('type_id',$type_id[0]['id'])->get();
    
   
      $choiceyoum7 = photo::where('choice',1)->take(5)->orderBy('created_at','Desc')->get();
      $books = book::with('book_en')->take(6)->orderBy('created_at','Desc')->get();
      $type_id= type_en::select('id')->where('type_name','Albums')->get();
      $albums= news::with('news_en')->where('type_id',$type_id[0]['id'])->take(4)->orderBy('created_at','Desc')->get();
      $reading=news::with("news_$lang")->take(6)->orderBy('count', 'desc')->get();
      $reading_less=news::with("news_$lang")->take(4)->orderBy('count', 'asc')->get();
       
        return view('control.front.home', compact('reading_less','reading','lang','new_news','albums','all_news','books','choiceyoum7','all_types','t7kykat'));
    }
    else
    {
      $lang=session()->get('lang');
      $new_news=  news::with("news_$lang")->take(4)->orderBy('created_at','Desc')->get();
      $all_news=  news::with("news_$lang")->get();
      if($lang=='ar'){
      $all_types= type_ar::get();
      $type_id= type_ar::select('id')->where('type_name','تحقيقات')->get();
      $t7kykat= news::with("news_$lang")->where('type_id',$type_id[0]['id'])->get();
      $type_id= type_ar::select('id')->where('type_name','البومات')->get();
      $albums= news::with("news_$lang")->where('type_id',$type_id[0]['id'])->take(4)->orderBy('created_at','Desc')->get();
     
      }
      else{
        $all_types= type_en::get();
        $type_id= type_en::select('id')->where('type_name','researches')->get();
        $t7kykat= news::with("news_$lang")->where('type_id',$type_id[0]['id'])->get();
        
        $type_id= type_en::select('id')->where('type_name','Albums')->get();
        
        $albums= news::with("news_$lang")->where('type_id',$type_id[0]['id'])->take(4)->orderBy('created_at','Desc')->get();
         
      }
   
    
      $reading_less=news::with("news_$lang")->take(4)->orderBy('count', 'asc')->get();
       
      $choiceyoum7 = photo::where('choice',1)->take(5)->orderBy('created_at','Desc')->get();
      $books = book::with("book_$lang")->take(6)->orderBy('created_at','Desc')->get();
       $reading=news::with("news_$lang")->take(6)->orderBy('count', 'desc')->get();
       
        return view('control.front.home', compact('reading_less','reading','lang','new_news','albums','all_news','books','choiceyoum7','all_types','t7kykat'));
  
    }
  }
    public function search( )
    {
      $name="";
      if(session()->get('lang')==''){
        $lang='en';
         //post data
         if(isset($_GET['search'])){
         $name= '%'.$_GET['search'].'%';
         }
   

   
        $res_search = news_en::with('news')->where('news_text','like',$name)->paginate(8)->appends(request()->query());
        $all_types= type_en::get(); 
        return view('control.front.search',compact('all_types','res_search'));
        }
        else
        {
          $lang=session()->get('lang');
          //post data
          if(isset($_GET['search'])){
          $name= '%'.$_GET['search'].'%';
          }
    
          if($lang=='ar'){
            $all_types= type_ar::get();
            $res_search = news_ar::with('news')->where('news_text','like',$name)->paginate(8)->appends(request()->query());
     
          }
          else{
    
            $all_types= type_en::get(); 
            $res_search = news_en::with('news')->where('news_text','like',$name)->paginate(8)->appends(request()->query());
     
          }
         return view('control.front.search',compact('lang','all_types','res_search'));
        }
     
     
    }
    public function category($id)
    {
      if(session()->get('lang')==''){
        $lang='en';
      $type_id= type_en::select('id')->where('type_name','Albums')->get();
      $albums= news::with('news_en')->where('type_id',$type_id[0]['id'])->take(4)->orderBy('created_at','Desc')->get();
         
      $all_types= type_en::get();
      $category=type_en::where('id',$id)->get();
      $news_cat=news::with('news_en')->where('type_id',$id)->paginate(20)->appends(request()->query());
      $reading=news::with("news_$lang")->take(6)->orderBy('count', 'desc')->get();
       
      }
      else{

        $lang=session()->get('lang');


        if($lang=='ar'){
          $all_types= type_ar::get();
        
          $type_id= type_ar::select('id')->where('type_name','البومات')->get();
          $albums= news::with("news_$lang")->where('type_id',$type_id[0]['id'])->take(4)->orderBy('created_at','Desc')->get();
          $category=type_ar::where('id',$id)->get();
          }
          else{
            $all_types= type_en::get();
          
            
            $type_id= type_en::select('id')->where('type_name','Albums')->get();
            $albums= news::with("news_$lang")->where('type_id',$type_id[0]['id'])->take(4)->orderBy('created_at','Desc')->get();
            $category=type_en::where('id',$id)->get();
          }
       
          $reading=news::with("news_$lang")->take(6)->orderBy('count', 'desc')->get();
       
        $news_cat=news::with("news_$lang")->where('type_id',$id)->paginate(20)->appends(request()->query());
        }


        $new_news=  news::with("news_$lang")->take(4)->orderBy('created_at','Desc')->get();
        $all_news=  news::with("news_$lang")->get();
        $reading_less=news::with("news_$lang")->take(4)->orderBy('count', 'asc')->get();
     
        return view('control.front.category',compact('reading_less','all_news','new_news','reading','lang','all_types','category','albums','news_cat'));
    
    }
    public function single_news($id)
    {


      if(session()->get('lang')==''){
        $lang='en';
        $type_id= type_en::select('id')->where('type_name','Albums')->get();
        $albums= news::with('news_en')->where('type_id',$type_id[0]['id'])->take(4)->orderBy('created_at','Desc')->get();
           
        $all_types= type_en::get();
        $news=news::with("news_$lang")->find($id);
          }
      else{

        $lang=session()->get('lang');


        if($lang=='ar'){
          $all_types= type_ar::get();
          $type_id= type_ar::select('id')->where('type_name','البومات')->get();
          $albums= news::with("news_$lang")->where('type_id',$type_id[0]['id'])->take(4)->orderBy('created_at','Desc')->get();
         
       
             }
          else{
            $all_types= type_en::get();
            $type_id= type_en::select('id')->where('type_name','Albums')->get();
            $albums= news::with("news_$lang")->where('type_id',$type_id[0]['id'])->take(4)->orderBy('created_at','Desc')->get();
           
        
            }
       $news=news::with("news_$lang")->find($id);
       
         
      }
      $news_cat=news::with("news_$lang")->where('type_id',$news['type_id'])->take(4)->get();
      $new_news=  news::with("news_$lang")->take(4)->orderBy('created_at','Desc')->get();
      $all_news=  news::with("news_$lang")->get();
      $reading_less=news::with("news_$lang")->take(4)->orderBy('count', 'asc')->get();
   
      $count= news::find($id); 
      $count->count= $count->count+1;
      $count->save();
      $reading=news::with("news_$lang")->take(6)->orderBy('count', 'desc')->get();
       $photos=photo::with('photo_ar')->where('news_id',$id)->get();
      return view('control.front.single_news',compact('news_cat','reading_less','all_news','new_news','photos','reading','lang','all_types','albums','news'));   
    }




    public function single_book($id)
    {


      if(session()->get('lang')==''){
        $lang='en';
        $type_id= type_en::select('id')->where('type_name','Albums')->get();
        $albums= news::with('news_en')->where('type_id',$type_id[0]['id'])->take(4)->orderBy('created_at','Desc')->get();
           
        $all_types= type_en::get();
        $news=book::with("book_$lang")->find($id);
          }
      else{

        $lang=session()->get('lang');


        if($lang=='ar'){
          $all_types= type_ar::get();
          $type_id= type_ar::select('id')->where('type_name','البومات')->get();
          $albums= news::with("news_$lang")->where('type_id',$type_id[0]['id'])->take(4)->orderBy('created_at','Desc')->get();
         
       
             }
          else{
            $all_types= type_en::get();
            $type_id= type_en::select('id')->where('type_name','Albums')->get();
            $albums= news::with("news_$lang")->where('type_id',$type_id[0]['id'])->take(4)->orderBy('created_at','Desc')->get();
           
        
            }
       $news=book::with("book_$lang")->find($id);
       
         
      }
      
      $reading=news::with("news_$lang")->take(6)->orderBy('count', 'desc')->get();
       
      return view('control.front.single_books',compact('reading','lang','all_types','albums','news'));   
    }
}
