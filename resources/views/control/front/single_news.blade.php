<!-- content-section-starts-here -->
@extends('tamplate.fornt.master')
@section('content')
    

<div class="main-body">
    <div class="wrap">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">{{__('messages.home')}}</a></li>
            <li class="active">{{__('messages.Single Page')}}</li>
        </ol>
        <div class="single-page">
           
            <div class="col-md-8 content-left single-post">
                <div class="blog-posts">
                    <h3 class="post">{{$news["news_$lang"]['description']}}</h3>
                    <div class="last-article">
                        <p class="artext"> {{$news["news_$lang"]['description']}} </p>
                      
                        <img src="/assets/img/{{$news['media_name']}}" width="100%">
                        @foreach ($photos as $item)
                       
                        <p class="artext"> {{$item["photo_$lang"]['description']}}</p>
                        <img width="100%" src="/assets/img/{{$item['photo_name']}}" frameborder="0"
                        allowfullscreen="">
                        @endforeach
                        @php
                        $i=0;
                        $halved=   $all_types->chunk(4);
                        $halved->all();
                       
                             @endphp
                   
                        <ul class="categories">
                            @foreach ($halved[0] as $item)
                            <li><a href="{{route('category',$item['id'])}}">{{$item['type_name']}}</a></li>
                            @endforeach
                        </ul>
                        <div class="clearfix"></div>
                        <!--related-posts-->
                        <div class="row related-posts">
                            <h4>{{__('messages.Articles You May Like')}}</h4>
                            @foreach ($news_cat as $item)
                            <div class="col-xs-6 col-md-3 related-grids">
                                <a href="{{route('show-single-news',$item['id'])}}" class="thumbnail">
                                    <img src="/assets/img/{{$item['media_name']}}" alt="" />
                                </a>
                                <h5><a href="{{route('show-single-news',$item['id'])}}">{{$item["news_$lang"]['description']}}</a></h5>
                            </div>
                            @endforeach
                           
                           
                        </div>
                        <!--//related-posts-->

                    
                       
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
           
        </div>
    </div>
</div>
@endsection
<!-- content-section-ends-here -->
