<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\main\book;
use App\Models\ar\book_ar;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class BookArController extends Controller
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
        return view('control.dashboard.create_books');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_name = $this->saveImages($request->media_name, 'assets/img');
      $book= book::create([
        'photo'=>$file_name
       ]);
        book_ar::create([
            'auther_name'=>$request->auther_name,
            'book_name'=>$request->book_name,
            'description'=>$request->description,
            'book_id'=>$book->id
        ]);
        return redirect()->back()->with('success','created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\book_ar  $book_ar
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(session()->get('lang')==''){
            $lang='en';
       $books= book::with('book_ar')->get();
       return view('control.dashboard.show_all_books',compact('lang','books'));
        }
        else{
            $lang=  session()->get('lang') ;  
            $books= book::with("book_$lang")->get();
            return view('control.dashboard.show_all_books',compact('lang','books'));
        }
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book_ar  $book_ar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(session()->get('lang')==''){
            $lang='en';
      $books = book::with('book_en')->find($id);
      return view('control.dashboard.edit_book',compact('lang','books'));
        }
        else
        {

            $lang=session()->get('lang');
            $books = book::with("book_$lang")->find($id);
            return view('control.dashboard.edit_book',compact('lang','books'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book_ar  $book_ar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $book= book::find($id);
        if($request->media_name!=""){
         $file_name = $this->saveImages($request->media_name, 'assets/img');
            $book->photo= $file_name;

        }

       $book_ar= book_ar::where('book_id',$id)->first();
       $book_ar->auther_name=$request->auther_name;
       $book_ar->book_name=$request->book_name;
       $book_ar->description=$request->description;
       $book->save();
       $book_ar->save();
       return redirect()->route('show.all.books')->with('success', 'updated successfully');
      
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book_ar  $book_ar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book=book::find($id);
       $book_ar= book_ar::where('book_id',$id)->first();
       $book->delete();
       $book_ar->delete();

       return redirect()->back()->with('success','deleted  successfully');
    }
}
