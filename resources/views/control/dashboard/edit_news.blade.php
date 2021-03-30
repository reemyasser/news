@extends('tamplate.dashboard.layout.master')
@section('title')
edit news 
@endsection
@section('content')
    <div class="container">
        <div class="row">

            
            @if (Session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ Session()->get('success') }}
                                    </div>
                                @endif
          

<div class="col" style="margin:15px ">
                   
                        <div class="card">
                            <div class="card-header"> {{__('messages.edit')}}</div>
                            <div class="card-body">
                                
                                <!--to upload images to the server-->


                                <form action="{{route("update.news_$lang",$news['id'])}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label>{{__('messages.news text')}} </label>
                                        <textarea required cols="4" rows="4" class="form-control" name="news_text"
                                           >{{$news["news_$lang"]['news_text']}}</textarea>

                                    </div>
                                    <div class="form-group">
                                        <label> {{__('messages.description')}} </label>
                                        <textarea required cols="4" rows="4" class="form-control" name="description"
                                            >{{$news["news_$lang"]['description']}}</textarea>

                                    </div>




                                    <div class="form-group">
                                        <label> {{__('messages.Select Category')}} </label>
                                        <select required name="category" class="form-control">

                                            

                                            @foreach ($type as $item)
                                            @if($item['id']==$news['type_id'])
                                            <option selected value="{{$item['id']}}"> {{$item['type_name']}} </option>
                                            @else
                                            <option value="{{$item['id']}}"> {{$item['type_name']}} </option>
                                            @endif
                                            @endforeach

                                        </select>

                                    </div>



                                    <div class="form-group">
                                        <img src="/assets/img/{{$news['media_name']}}" >
                                        <br>
                                        <label for="upload_file"> {{__('messages.image')}} </label>
                                        <input type="file"  class="form-control" name="media_name" id="upload_file"
                                            value="{{ old('upload_file') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="upload_file"> {{__('messages.how many images in news')}}  </label>
                                      
                                            <div class="result1">
                                               @php
                                                   $i=0
                                               @endphp
                                                @foreach ($photos as $item)
                                                    
                                               
                                                <div style="border: 1px solid #ccc">
                                                    <div class="form-group">
                                                        <label> {{__('messages.description')}} </label>
                                                        <textarea required cols="4"  rows="4" class="form-control" name="description_img{{$i}}"
                                                           > {{$item["photo_$lang"]['description']}}</textarea>
                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <img src="/assets/img/{{$item['photo_name']}}" >
                                                        <br>
                                                        <label for="upload_file"> {{__('messages.image')}} </label>
                                                        <input type="file" class="form-control" name="media_name{{$i}}" id="upload_file"
                                                           >
                                                    </div>
                                                    </div>
                                                    <input type="hidden" name="count" value="{{$i}}">
                                                    @php
                                                    $i++
                                                @endphp
                                                    @endforeach
                                            </div>

                                    </div>



                                    <br>
                                    <div  class='btn_create' >

                                    <button type="submit" name="submit" class="btn btn-secondary btn-lg">{{__('messages.edit')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
         
                </div>

    </div>
    

@endsection
