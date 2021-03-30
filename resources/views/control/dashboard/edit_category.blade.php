@extends('tamplate.dashboard.layout.master')
@section('title')
    Edit Category
@endsection
@section('content')
 

<div class="container">
  <div class="row"  >

  <div class="col" style=" margin: 50px 15px  ">

  
<div class="card" >

    <div class="card-header" >
        <h3>Update Category</h3>
     </div>

  <div class="card-body">

   


         <form action="{{route("update.category_$lang",$type->id)}}" method="POST" >
             @csrf

                 <div class="form-group">
                   <label> {{__('messages.name')}}</label>
                   <input type="text" class="form-control" name="name" value="{{$type->type_name}}">

                 </div>

                 <div  class='btn_create' >
                 <button type="submit" class="btn btn-secondary btn-lg">{{__('messages.edit')}}</button>
                 </div>
         </form>
         


  </div>
</div>
</div>
</div>
</div>
@endsection
