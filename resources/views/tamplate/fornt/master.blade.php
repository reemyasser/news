<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title>youm 7 </title>
    <link href="{{ asset('front/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <!-- Custom Theme files -->
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('front/css/style1.css') }}" rel="stylesheet" type="text/css" media="all" />
    
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Express News Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- for bootstrap working -->
    <script type="text/javascript" src="{{ asset('front/js/bootstrap.js') }}"></script>
    <!-- //for bootstrap working -->
    <!-- web-fonts -->
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <script src="{{ asset('front/js/responsiveslides.min.js') }}"></script>
    <script>
        $(function() {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });

    </script>
    <script type="text/javascript" src="{{ asset('front/js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/easing.js') }}"></script>
    <!--/script-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });

    </script>
</head>

<body>
    <!-- header-section-starts-here -->
    @include('tamplate.fornt.include.nav-bar')
    <!-- header-section-ends-here -->
    <div class="wrap">
        <div class="move-text">
            <div class="breaking_news">
                <h2>{{__('messages.Breaking News')}}</h2>
            </div>
            <div class="marquee">
                @foreach ($all_news as $item)
                    
                <div class="marquee1"><a class="breaking" href="{{route('show-single-news',$item['id'])}}">>>{{$item["news_$lang"]['description']}}..</a></div>
             
                   @endforeach
                    <div class="clearfix"></div>
                    
            </div>
            <div class="clearfix"></div>
            <script type="text/javascript" src="{{ asset('front/js/jquery.marquee.min.js') }}"></script>
            <script>
                $('.marquee').marquee({
                    pauseOnHover: true
                });
                //@ sourceURL=pen.js

            </script>
        </div>
    </div>
    <!-- content-section-starts-here -->
    <div class="main-body">
        <div class="wrap">
           




            @yield('content')



            <div class="col-md-4 side-bar">
                <div class="first_half">
                   
                    <div class="list_vertical">
                        <section class="accordation_menu">
                            <div>
                                <input id="label-1" name="lida" type="radio" checked />
                                <label for="label-1" id="item1"><i class="ferme"> </i>{{__('messages.Recent Posts')}}<i
                                        class="icon-plus-sign i-right1"></i><i
                                        class="icon-minus-sign i-right2"></i></label>
                                <div class="content" id="a1">
                                    <div class="scrollbar" id="style-2">
                                        <div class="force-overflow">
                                            <div class="popular-post-grids">

                                                @foreach ($new_news as $item)
                                                    
                                               
                                                <div class="popular-post-grid">
                                                    <div class="post-img">
                                                        <a href="{{route('show-single-news',$item['id'])}}"><img
                                                                src="/assets/img/{{$item['media_name']}}"
                                                                alt="" /></a>
                                                    </div>
                                                    <div class="post-text">
                                                        <a class="pp-title" href="{{route('show-single-news',$item['id'])}}">{{$item["news_$lang"]['description']}} </a>
                                                        <p>On {{$item['created_at']}} 
                                                        </p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input id="label-2" name="lida" type="radio" />
                                <label for="label-2" id="item2"><i class="icon-leaf" id="i2"></i>{{__('messages.popular posts')}} <i
                                        class="icon-plus-sign i-right1"></i><i
                                        class="icon-minus-sign i-right2"></i></label>
                                <div class="content" id="a2">
                                    <div class="scrollbar" id="style-2">
                                        <div class="force-overflow">
                                            <div class="popular-post-grids">
                                                @foreach ($reading as $item)
                                                <div class="popular-post-grid">
                                                    <div class="post-img">
                                                        <a href="{{route('show-single-news',$item['id'])}}"><img
                                                            src="/assets/img/{{$item['media_name']}}"
                                                                alt="" /></a>
                                                    </div>
                                                    <div class="post-text">
                                                        <a class="pp-title" href="{{route('show-single-news',$item['id'])}}"> {{$item["news_$lang"]['description']}}</a>
                                                        <p>On {{$item["created_at"]}}
                                                        </p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                @endforeach
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </section>
                    </div>
                    <div class="side-bar-articles">
                        @foreach ($reading_less as $item)
                            
                       
                        <div class="side-bar-article">
                            <a href="{{route('show-single-news',$item['id'])}}"><img    src="/assets/img/{{$item['media_name']}}" alt="" /></a>
                            <div class="side-bar-article-title">
                                <a href="{{route('show-single-news',$item['id'])}}">{{$item["news_$lang"]['description']}}</a>
                            </div>
                        </div>
                        @endforeach
                    
                      
                    </div>
                </div>
                <div class="secound_half">
                   
                    <div class="popular-news">
                        <header>
                            <h3 class="title-popular">{{__('messages.popular posts')}}</h3>
                        </header>
                        <div class="popular-grids">
                            @foreach ($reading as $item)
                                
                          
                            <div class="popular-grid">
                                <a href="{{route('show-single-news',$item['id'])}}"><img  src="/assets/img/{{$item['media_name']}}"
                                        alt="" /></a>
                                <a class="title" href="{{route('show-single-news',$item['id'])}}">{{$item["news_$lang"]['description']}}</a>
                                <p>On {{$item['created_at']}} </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- content-section-ends-here -->
    <!-- footer-section-starts-here -->
    @include('tamplate.fornt.include.footer')
    <!-- footer-section-ends-here -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
            var defaults = {
            wrapID: 'toTop', // fading element id
            wrapHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear' 
            };
            */
            $().UItoTop({
                easingType: 'easeOutQuart'
            });
        });

    </script>
    <a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    <!---->

    @yield('script')
</body>

</html>
