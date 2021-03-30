 <!-- ======= Header ======= -->

 <div class="header">
		
    <div class="header-bottom">
        <div class="logo text-center">
            <a href="{{route('home')}}"><img src="{{asset('front/images/logo.jpg')}}" alt="" /></a>
        </div>
        <div class="navigation">
            <nav class="navbar navbar-default" role="navigation">
       <div class="wrap">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
        </div>
        <!--/.navbar-header-->
    
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{route('home')}}">{{__('messages.home')}}</a></li>
                @php
                    $i=0;
                @endphp
                @foreach ($all_types as $item)
                   
               
                   
                <li><a href="{{route('category',$item['id'])}}">{{$item['type_name']}}</a></li>
                @php
                if($i==3)
                {
                    break;
                }
                $i++;
                
            @endphp
                @endforeach
                  <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">{{__('messages.more')}}<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-column columns-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="multi-column-dropdown">
                                    @php
                                    $i=0;
                                    $halved=   $all_types->chunk(($all_types->count()/2)+4);
                                    $halved->all();
                                   
                                         @endphp
                                @foreach ($halved[0] as $item)
                                   @if ($i>4)
                                       
                                   
                               
                                    <li><a href="{{route('category',$item['id'])}}">{{$item['type_name']}}</a></li>
                                    <li class="divider"></li>
                                   
                                    @endif
                                    @php
                                   
                                    $i++;
                                    
                                @endphp
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="multi-column-dropdown">
                                    @foreach ($halved[1] as $item)
                                   <li><a href="{{route('category',$item['id'])}}">{{$item['type_name']}}</a></li>	
                                    <li class="divider"></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </ul>
                </li>
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                    <div class="language" name="{{ $localeCode }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                    <a id="lang"  class="lang"   rel="alternate"  hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                       
                       {{ $properties['native'] }} 
                    </a>
                    </div>
                   
                </li>
            @endforeach
                <div class="clearfix"></div>
            </ul>
           
        </div>
        <!--/.navbar-collapse-->
 <!--/.navbar-->
        </div>
    </nav>
    </div>
</div>
@section('script')
<script>



    $(document).ready(function() {
        $('.language').click(function(event){
            
          
    
    
          var val= $(this).attr('name');
         
            $.ajax({
                url: "{{ route('convert') }}",
                method: 'POST',
                async: false,
                data: {
                        '_token' : "{{ csrf_token() }}",
                        'key'    : val
                      },
                success: function(response){
                    $('.result').show();
                    $('.result').html(response);
               }
            });
        });
    });
    </script>
    
@endsection



















