@extends('tamplate.dashboard.layout.master')
@section('title')
    create book
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row" style="margin: 0px 120px" >
       
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3> {{App\Models\main\news::count()}} <sup style="font-size: 20px"></sup></h3>

              <p>{{__('messages.all news')}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('show.allnews')}}"  class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        

		<div class="col-lg-6 col-6">
			<!-- small box -->
			<div class="small-box bg-danger">
			  <div class="inner">
				<h3>{{App\Models\ar\type_ar::count()}}</h3>
  
				<p>{{__('messages.all category')}} </p>
			  </div>
			  <div class="icon">
				<i class="ion ion-pie-graph"></i>
			  </div>
			  <a href="{{route('create.category')}}"  class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		  </div>
        <!-- ./col -->
		<div class="col-12 col-sm-6 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{__('messages.vistors')}}</span>
                <span class="info-box-number">{{App\Models\main\Visitor::count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>



		<div class="col-md-12">
			<p class="text-center">
			  <strong>{{__('messages.count of news for Categories')}} </strong>
			</p>
			@php
				$i=0;
				@endphp
			@foreach ($alltypes as $item)
			@php
			
			
				if ($i % 4== 0)
				{
					$val="primary";
				}	
				if ($i % 4== 1)
				{
					$val="danger";
				}	
				if ($i % 4== 2)
				{
					$val="success";
				}	
				if ($i % 4== 3)
				{
					$val="warning";
				}	
				$per=(( App\Models\main\news::where('type_id',$item['id'])->count())/(App\Models\main\news::count()))*100;
				@endphp

			<div class="progress-group">
			 {{$item['type_name']}}
			  <span class="float-right"><b>{{App\Models\main\news::where('type_id',$item['id'])->count()}}</b>/{{App\Models\main\news::count()}}</span>
			  <div class="progress progress-sm">
				<div class="progress-bar bg-{{$val}}" style="width: {{$per}}%"></div>
			  </div>
			</div>
			<!-- /.progress-group -->

			

		  @php
		  $i++;
		  @endphp
		  @endforeach

		</div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
    


     


     
     
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  @endsection