<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\main\book;
use App\Models\ar\book_ar;
use App\Models\en\book_en;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class BookEnController extends Controller
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
        book_en::create([
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
     * @param  \App\book_en  $book_en
     * @return \Illuminate\Http\Response
     */
  /*  public function show()
    {
       $books= book::with('book_en')->get();
      
       return view('admin.show_all_books_en',compact('books'));
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book_en  $book_en
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        //
      $books = book::with('book_en')->find($id);
      return view('admin.edit_book_en',compact('books'));

    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book_en  $book_en
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $book= book::find($id);
        if($request->media_name!=""){
         $file_name = $this->saveImages($request->media_name, 'assets/img');
            $book->photo= $file_name;

        }

       $book_en= book_en::where('book_id',$id)->first();
       $book_en->auther_name=$request->auther_name;
       $book_en->book_name=$request->book_name;
       $book_en->description=$request->description;
       $book->save();
       $book_en->save();
       return redirect()->route('show.all.books')->with('success', 'updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book_en  $book_en
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book=book::find($id);
       $book_en= book_en::where('book_id',$id)->first();
       $book->delete();
       $book_en->delete();

       return redirect()->back()->with('success','deleted  successfully');
    }
}
