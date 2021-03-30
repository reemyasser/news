@extends('tamplate.dashboard.layout.master')
@section('title')
show all news 
@endsection
@section('content')

@if (isset($news) && $news->count() > 0)
    <div class="card">
    <div class="card-header"> <h4> {{__('messages.show all news')}} </h4></div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                    <th>{{__('messages.news text')}}</th>
                    <th>{{__('messages.description')}}</th>
                    <th>{{__('messages.image')}}</th>
                    <th class="text-align:center">{{__('messages.operation')}}</th>
                    </tr>
                </thead>
                <tbody>
                @if (Session()-> has('success'))
                    <div class="alert alert-info">
                        {{ Session()->get('success')}}
                    </div>                    
                @endif
                    @foreach ($news as $item)
                   @if(!empty($item["news_$lang"]['description']))
                       
                 
                <tr>
                <td  style="width:30%" > {{$item["news_$lang"]['news_text']}} </td>
                <td  style="width:30%" > {{$item["news_$lang"]['description']}} </td>
                <td> <img height="60" width="60" 
                        src ="/assets/img/{{ $item['media_name'] }}"> </td>
                        <td class="text-align:center"> 
                            <a href="{{route("edit.news",$item['id'])}}" class="btn btn-primary btn-sm">{{__('messages.edit')}}</a>
                            <a href="{{route("delete.news_$lang",$item['id'])}}" class="btn btn-danger btn-sm">{{__('messages.delete')}}</a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table> 
    </div>
</div>

@else
       <div style="text-align: center" class="alert alert-danger">
           <h4>{{__('messages.There is no news')}}</h4>
       </div>
@endif
</div>
@stop
@section('script')
<script>

$(document).ready(function() {

    $('#example').DataTable();
} );
</script>
    
@endsection