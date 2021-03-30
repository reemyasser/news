@extends('tamplate.dashboard.layout.master')
@section('title')
    create news
@endsection
@section('content')
    <div class="container">
          
        @if (Session()->has('success'))
        <div class="alert alert-success">
            {{ Session()->get('success') }}
        </div>
    @endif
   
        <form action="{{ route('store.news_en') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">

          

                    <div class="col-6">
                        <div class="card">
                            <div class="card-header"> {{ __('messages.create english news') }} </div>
                            <div class="card-body">

                                <!--to upload images to the server-->


                                

                                    <div class="form-group">
                                        <label> {{ __('messages.news text') }} </label>
                                        <textarea required cols="4" rows="4" class="form-control" name="news_text_en"
                                            value="{{ old('name') }}"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label> {{ __('messages.description') }} </label>
                                        <textarea required cols="4" rows="4" class="form-control" name="description_en"
                                            value="{{ old('name') }}"></textarea>

                                    </div>




                                    <div class="form-group">
                                        <label> {{ __('messages.Select Category') }} </label>
                                        <select required name="category_en" class="form-control">

                                            <option> </option>

                                            @foreach ($types_en as $item)
                                                <option value="{{ $item['id'] }}"> {{ $item['type_name'] }} </option>
                                            @endforeach

                                        </select>


                                    </div>

                                  


                                   

                                    <br>

                                    <div class="result2">

                                    </div>

                                   
                            </div>
                        </div>
                    </div>
                
          

                    <div class="col-6">
                        <div class="card">
                            <div class="card-header"> {{ __('messages.create arabic news') }}</div>
                            <div class="card-body">
                               

                                    <div class="form-group">
                                        <label> {{ __('messages.news text') }}</label>
                                        <textarea required cols="4" rows="4" class="form-control" name="news_text"
                                            value="{{ old('name') }}"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label> {{ __('messages.description') }} </label>
                                        <textarea required cols="4" rows="4" class="form-control" name="description"
                                            value="{{ old('name') }}"></textarea>

                                    </div>




                                    <div class="form-group">
                                        <label> {{ __('messages.Select Category') }} </label>
                                        <select required name="category" class="form-control">
                                            <option> </option>


                                            @foreach ($types_ar as $item)
                                                <option value="{{ $item['id'] }}"> {{ $item['type_name'] }} </option>
                                            @endforeach

                                        </select>

                                    </div>

                                    


                                 


                                    <br>
                                    <div class="result1">

                                    </div>

                                  
                            </div>
                        </div>
                    </div>
                    <div class="col-12">

                    <div class="card">
                        <div class="card-header"> Main</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="upload_file"> {{ __('messages.image') }} </label>
                                <input type="file" required class="form-control" name="media_name" id="upload_file"
                                    value="{{ old('upload_file') }}">
                            </div>
                            <div class="form-group">
                                <label for="upload_file"> {{ __('messages.how many images in news') }} </label>
                                <input type="number" class="form-control"  id="num_img" name="num_image">
                                <input type="hidden"  class="lar" value="ar" >
                                <div class="result">

                                </div>

                            </div>
                           
                        </div>
                    </div>
                    </div>

                    <div  class='btn_create' >
                    <button type="submit" name="submit"
                    class="btn btn-secondary btn-lg">{{ __('messages.create') }}</button>
                </div>
            
        </div>
    </form>

    </div>


@endsection
@section('script')


    <script>
        $(document).ready(function() {

            $('#num_img').keyup(function() {
                var key = $(this).val();
                var lag= $('.lar').val();
                if (key != '') {
                    //Ajax Script 
                    $.ajax({
                        url: "{{ route('store.img-num') }}",
                        method: 'POST',
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'key': $(this).val(),
                            'lag':lag

                        },
                        success: function(response) {
                            $('.result').show();
                            $('.result').html(response);

                        }
                    });
                } else {
                    $('.result').hide();
                }


                if (key != '') {
                    //Ajax Script 
                    $.ajax({
                        url: "{{ route('store.des') }}",
                        method: 'POST',
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'key': $(this).val(),
                            'lag':lag
                        },
                        success: function(response) {
                            $('.result1').show();
                            $('.result1').html(response);

                        }
                    });
                } else {
                    $('.result1').hide();
                }
                
                if (key != '') {
                    //Ajax Script 
                    $.ajax({
                        url: "{{ route('store.des_en') }}",
                        method: 'POST',
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'key': $(this).val(),
                            'lag':lag
                        },
                        success: function(response) {
                            $('.result2').show();
                            $('.result2').html(response);

                        }
                    });
                } else {
                    $('.result1').hide();
                }

            });
          
        });

    </script>
@endsection
