@extends('tamplate.dashboard.layout.master')
@section('title')
    create book
@endsection
@section('content')
    <div class="container">
        <div class="row">

            <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample1" aria-expanded="false"
                aria-controls="collapseExample">
      {{__('messages.create english book')}}
            </a>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                aria-expanded="false"  aria-controls="collapseExample">
                {{__('messages.create arabic book')}}
            </button>
            @if (Session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ Session()->get('success') }}
                                    </div>
                                @endif
            <div class="collapse" id="collapseExample1">
                <div class="well">


                    <div class="col-6">
                        <div class="panel panel-defult">
                            <div class="panel-heading"> {{__('messages.create english book')}} </div>
                            <div class=" panel panel-body">
                                
                                <!--to upload images to the server-->


                                <form action="{{route('create.book_en')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label> {{__('messages.name')}} </label>
                                        <input required  class="form-control" name="auther_name"
                                            value="{{ old('name') }}">

                                    </div>
                                    <div class="form-group">
                                        <label>{{__('messages.book name')}} </label>
                                        <input required  class="form-control" name="book_name"
                                            value="{{ old('name') }}">

                                    </div>
                                    <div class="form-group">
                                        <label> {{__('messages.description')}} </label>
                                        <textarea required cols="4" rows="4" class="form-control" name="description"
                                            value="{{ old('name') }}"></textarea>

                                    </div>




                                   



                                    <div class="form-group">
                                        <label for="upload_file"> {{__('messages.image')}} </label>
                                        <input type="file" required class="form-control" name="media_name" id="upload_file"
                                            value="{{ old('upload_file') }}">
                                    </div>
                                    


                                    <br>
                                    <button type="submit" name="submit" class="btn btn-primary">{{__('messages.create')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapseExample">
                <div class="well">

                    <div class="col-6">
                        <div class="panel panel-defult">
                            <div class="panel-heading">  {{__('messages.create arabic book')}}</div>
                            <div class=" panel panel-body">
                                <form action="{{route('create.book_ar')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label> {{__('messages.name')}} </label>
                                        <input required  class="form-control" name="auther_name"
                                            value="{{ old('name') }}">

                                    </div>
                                    <div class="form-group">
                                        <label>{{__('messages.book name')}} </label>
                                        <input required class="form-control" name="book_name"
                                            value="{{ old('name') }}">

                                    </div>
                                    <div class="form-group">
                                        <label> {{__('messages.description')}} </label>
                                        <textarea required cols="4" rows="4" class="form-control" name="description"
                                            value="{{ old('name') }}"></textarea>

                                    </div>




                                   



                                    <div class="form-group">
                                        <label for="upload_file"> {{__('messages.image')}} </label>
                                        <input type="file" required class="form-control" name="media_name" id="upload_file"
                                            value="{{ old('upload_file') }}">
                                    </div>
                                   


                                    <br>
                                    <button type="submit" name="submit" class="btn btn-primary">{{__('messages.create')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    

@endsection
