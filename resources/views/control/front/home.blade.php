
@extends('tamplate.fornt.master')


@section('content')
	

<div class="col-md-8 content-left">
	<div class="slider">
		<div class="callbacks_wrap">
			<ul class="rslides" id="slider">
			
				@foreach ($new_news as $item)
					
				
				<li>
					<img height="400px" src="/assets/img/{{$item['media_name']}}" alt="">
					<div class="caption">
						<a href="{{route('show-single-news',$item['id'])}}">  {{$item["news_$lang"]['description']}}  </a>
					</div>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
	<div class="articles">
		<header>
			<h3 class="title-head">{{$all_types[0]['type_name']}}</h3>
		</header>
		@php
			 $news1 = App\Models\main\news::with("news_$lang")->where('type_id', $all_types[0]['id'])
                                    ->take(5)
                                    ->orderBy('created_at', 'Desc')
                                    ->get();

		@endphp
	@foreach ($news1 as $item)
		

		<div class="article">
			<div class="article-left">
				<a href="{{route('show-single-news',$item['id'])}}"><img src="/assets/img/{{$item['media_name']}}"></a>
			</div>
			<div class="article-right">
				<div class="article-title">
					<p>On {{$item['created_at']}} </p>
					<a class="title" href="{{route('show-single-news',$item['id'])}}">{{$item["news_$lang"]['description']}} </a>
				</div>
				<div class="article-text">
					<p class="news_text">
						{{$item["news_$lang"]['news_text']}}
					</p>
					<a href="{{route('show-single-news',$item['id'])}}"><img src="{{ asset('front/images/more.png') }}" alt="" /></a>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		@endforeach
	</div>
	
	<div class="life-style">
		<header>
			<h3 class="title-head">{{ $all_types[1]['type_name']}}</h3>
		</header>
		@php
		$news2 = App\Models\main\news::with("news_$lang")->where('type_id', $all_types[1]['id'])
							   ->take(4)
							   ->orderBy('created_at', 'Desc')
							   ->get();

   @endphp
   @for($i=0;$i<4;$i++)
   
		@if ($i%2==0)
			
		
		<div class="life-style-grids">
			<div class="life-style-left-grid">
				<a href="{{route('show-single-news',$news2[$i]['id'])}}"><img src="/assets/img/{{$news2[$i]['media_name']}}" alt="" /></a>
				<a class="title" href="{{route('show-single-news',$news2[$i]['id'])}}"> {{$news2[$i]["news_$lang"]['description']}} </a>
			</div>
			<div class="life-style-right-grid">
				<a href="{{route('show-single-news',$news2[$i+1]['id'])}}"><img  src="/assets/img/{{$news2[$i+1]['media_name']}}"  alt="" /></a>
				<a class="title" href="{{route('show-single-news',$news2[$i+1]['id'])}}">{{$news2[$i+1]["news_$lang"]['description']}}</a>
			</div>
			<div class="clearfix"></div>
		</div>
		@endif
		@endfor
	</div>
	<div class="sports-top">
		@php
		$j = 0;
	@endphp
	@for($j=0;$j<($all_types->count())/2;$j++)

		@if (($j % 2 == 0) & ($j > 2))	
		
		<div class="s-grid-left">
			<div class="cricket">
				<header>
					<h3 class="title-head">{{$all_types[$j]['type_name']}}</h3>
				</header>
				@php
				$news2 = App\Models\main\news::with("news_$lang")->where('type_id', $all_types[$j]['id'])
									   ->take(4)
									   ->orderBy('created_at', 'Desc')
									   ->get();
		
		   @endphp
				<div class="c-sports-main">
					<div class="c-image">
						<a href="{{route('show-single-news',$news2[0]['id'])}}"><img src="/assets/img/{{$news2[0]['media_name']}}" alt="" /></a>
					</div>
					<div class="c-text">
					
						<a class="power" href="{{route('show-single-news',$news2[0]['id'])}}">{{$news2[0]["news_$lang"]['description']}}</a>
						<p class="date">{{$news2[0]["created_at"]}}</p>
						<a class="reu" href="{{route('show-single-news',$news2[0]['id'])}}"><img src="{{ asset('front/images/more.png') }}"
								alt="" /></a>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				@php
				$i = 0;
			@endphp
				@foreach ($news2 as $item)
				@if ($i!=0)
					
				
				<div class="s-grid-small">
					<div class="sc-image">
						<a href="{{route('show-single-news',$item['id'])}}"><img src="/assets/img/{{$item['media_name']}}" alt="" /></a>
					</div>
					<div class="sc-text">
						
						<a class="power" href="{{route('show-single-news',$item['id'])}}">{{$item["news_$lang"]['description']}}</a>
						<p class="date">{{$item['created_at']}}</p>
						<a class="reu" href="{{route('show-single-news',$item['id'])}}"><img src="{{ asset('front/images/more.png') }}"
								alt="" /></a>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				@endif
				@php
				$i++;
			@endphp
				@endforeach
				
				
			</div>
		</div>
		<div class="s-grid-right">
			<div class="cricket">
				<header>
					<h3 class="title-popular">{{$all_types[$j+1]['type_name']}}</h3>
				</header>
				@php
				$news3 = App\Models\main\news::with("news_$lang")->where('type_id', $all_types[$j+1]['id'])
									   ->take(4)
									   ->orderBy('created_at', 'Desc')
									   ->get();
		
				   @endphp
				@if (isset($news3) & $news3->count()!=0)
					
			
					
				
				<div class="c-sports-main">
					<div class="c-image">
						<a href="{{route('show-single-news',$news3[0]['id'])}}"><img src="/assets/img/{{$news3[0]['media_name']}}" alt="" /></a>
					</div>
					<div class="c-text">
						
						<a class="power" href="{{route('show-single-news',$news3[0]['id'])}}">{{$news3[0]["news_$lang"]['description']}}</a>
							<p class="date">{{$news3[0]["created_at"]}}</p>
						<a class="reu" href="{{route('show-single-news',$news3[0]['id'])}}"><img src="{{ asset('front/images/more.png') }}"
								alt="" /></a>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>

				@php
				$k = 0;
			@endphp
				@foreach ($news3 as $item)
				@if ($k!=0)
				<div class="s-grid-small">
					<div class="sc-image">
						<a href="{{route('show-single-news',$item['id'])}}"><img src="/assets/img/{{$item['media_name']}}" alt="" /></a>
					</div>
					<div class="sc-text">
					
						<a class="power" href="{{route('show-single-news',$item['id'])}}"> {{$item["news_$lang"]['description']}}</a>
						<p class="date">{{$item['created_at']}}</p>
						<a class="reu" href="{{route('show-single-news',$item['id'])}}"><img src="{{ asset('front/images/more.png') }}"
								alt="" /></a>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
			
			</div>
			@endif
			@php
			$k++;
		@endphp
			@endforeach
			@endif
		</div>
		<div class="clearfix"></div>
	</div>
	@endif



		@endfor
	</div>
</div>
@endsection