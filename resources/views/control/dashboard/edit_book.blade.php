@extends('tamplate.dashboard.layout.master')
@section('title')
edit book
@endsection
@section('content')
    <div class="container">
        <div class="row">

            
            @if (Session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ Session()->get('success') }}
                                    </div>
                                @endif
          


                    <div class="col-6">
                        <div class="panel panel-defult">
                            <div class="panel-heading"> {{__('messages.edit')}} </div>
                            <div class=" panel panel-body">
                                
                                <!--to upload images to the server-->
                                <form action="{{route("update.books_$lang",$books['id'])}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label> {{__("messages.name")}} </label>
                                        <input required  class="form-control" name="auther_name"
                                            value="{{$books["book_$lang"]['auther_name'] }}">

                                    </div>
                                    <div class="form-group">
                                        <label> {{__('messages.book name')}} </label>
                                        <input required class="form-control" name="book_name"
                                            value="{{$books["book_$lang"]['book_name'] }}">

                                    </div>
                                    <div class="form-group">
                                        <label>{{__('messages.description')}}</label>
                                        <textarea required cols="4" rows="4" class="form-control" name="description"
                                          >  {{$books["book_$lang"]['description'] }}</textarea>

                                    </div>




                                   



                                    <div class="form-group">
                                        <img src="/assets/img/{{$books['photo'] }}">
                                        <br>
                                        <label for="upload_file"> {{__('messages.image')}} </label>
                                        <input type="file"  class="form-control" name="media_name" id="upload_file"
                                            value="{{ old('upload_file') }}">
                                    </div>
                                   


                                    <br>
                                    <button type="submit" name="submit" class="btn btn-primary">{{__('messages.edit')}}</button>
                                </form>

                               
                            </div>
                        </div>
                    </div>
         
        </div>

    </div>
    

@endsection
