
   @extends('tamplate.fornt.master')

    @section('content')
        
   
    <div class="main-body">
        <div class="wrap">
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">{{__('messages.home')}}</a></li>
                <li class="active">{{$category[0]['type_name']}}</li>
            </ol>
            <div class="col-md-8 content-left">
                <div class="articles sports">
                    <header>
                        <h3 class="title-head">{{$category[0]['type_name']}}</h3>
                    </header>
                    @foreach ($news_cat as $item)
                        
                  
                    <div class="article">
                        <div class="article-left">
                            <a href="{{route('show-single-news',$item['id'])}}"><img src="/assets/img/{{$item['media_name']}}"></a>
                        </div>
                        <div class="article-right">
                            <div class="article-title">
                                <p>On {{$item['created_at']}} </p>
                                <a class="title" href="{{route('show-single-news',$item['id'])}}"> {{$item["news_$lang"]['description']}}</a>
                            </div>
                            <div class="article-text">
                                <p>
                                    {{$item["news_$lang"]['news_text']}}</p>
                                <a href="{{route('show-single-news',$item['id'])}}"><img src="/front/images/more.png" alt="" /></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @endforeach
                </div>

              
               
                <div class="photos">
                    <header>
                        <h3 class="title-head">Photos</h3>
                    </header>
                    <div class="course_demo1">
                        <ul id="flexiselDemo">
                            @foreach ($news_cat as $item)
                                
                           
                            <li>
                                <a href="{{route('show-single-news',$item['id'])}}"><img src="/assets/img/{{$item['media_name']}}" alt="" /></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <link rel="stylesheet" href="{{asset('front/css/flexslider.css')}}" type="text/css" media="screen" />
                    <script type="text/javascript">
                        $(window).load(function() {
                            $("#flexiselDemo").flexisel({
                                visibleItems: 4,
                                animationSpeed: 1000,
                                autoPlay: true,
                                autoPlaySpeed: 3000,
                                pauseOnHover: true,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 480,
                                        visibleItems: 2
                                    },
                                    landscape: {
                                        changePoint: 640,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 768,
                                        visibleItems: 3
                                    }
                                }
                            });

                        });

                    </script>
                    <script type="text/javascript" src="{{asset('front/js/jquery.flexisel.js')}}"></script>
                </div>

            </div>
            
           
        </div>
    </div>
    @endsection
    <!-- content-section-ends-here -->
  