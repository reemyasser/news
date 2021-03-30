@extends('tamplate.dashboard.layout.master')
@section('title')
show all books
@endsection
@section('content')

@if (isset($books) && $books->count() > 0)
    <div class="class panel panel-defulat">
    <div class="class panel-heading"> <h4> {{__('messages.show all book')}} </h4></div>
        <div class="class panel panel-body">
            <table class="table table-borderedS">
                <thead>
                    <tr>
                    <th>{{__('messages.name')}}</th>
                    <th>{{__('messages.book name')}}</th>
                    <th>{{__('messages.description')}}</th>
                    <th>{{__('messages.image')}}</th>
                    <th class="text-align:center"> {{__('messages.operation')}}</th>
                    </tr>
                </thead>
                <tbody>
                @if (Session()-> has('success'))
                    <div class="alert alert-info">
                        {{ Session()->get('success')}}
                    </div>                    
                @endif
                    @foreach ($books as $item)
                    @if ($item["book_$lang"]!=null)
                       
                 
                <tr>
                <td > {{$item["book_$lang"]['auther_name']}} </td>
                <td style="width: 30%"  > {{$item["book_$lang"]['book_name']}}</td>
                <td  style="width: 30%">{{$item["book_$lang"]['description']}} </td>
                <td> <img height="60" width="60" 
                        src ="/assets/img/{{ $item['photo'] }}"> </td>
                        <td class="text-align:center"> 
                            <a href="{{route("edit.books",$item['id'])}}" class="btn btn-primary btn-sm">{{__('messages.edit')}}</a>
                            <a href="{{route("delete.books_$lang",$item['id'])}}" class="btn btn-danger btn-sm">{{__('messages.delete')}}</a>
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
           <h4>{{__('messages.There is no Books')}}</h4>
       </div>
@endif
</div>
@stop