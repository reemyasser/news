@extends('tamplate.dashboard.layout.master')
@section('title')
    create category
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="container">

        @if (session()->has('faild'))
            <div class="alert alert-danger">
                {{ session()->get('faild') }}
            </div>
        @endif

        <form action="{{ route('store.category_ar') }}" method="POST">
            @csrf
            <div class="row" id="form_create">

                <div class="col-6">

                    <div class="form_cat">
                    <label for="exampleDataList"
                        class="form-label">{{ __('messages.Create New arabic Category') }}</label>
                    <input required class="form-control" name="name" list="datalistOptions" id="exampleDataList"
                        placeholder="{{ __('messages.name') }}">

                    </div>
                </div>

                <div class="col-6">

                    <div class="form_cat">
                    <label for="exampleDataList"
                        class="form-label">{{ __('messages.Create New english Category') }}</label>
                    <input required class="form-control" name="name_en" list="datalistOptions" id="exampleDataList"
                        placeholder="{{ __('messages.name') }}">



                    </div>




                </div>
                <div  class='mx-auto' >
                    <button type="submit" class="btn btn-secondary btn-lg">{{ __('messages.create') }}</button>
                    
                </div>
            </div>
           
        </form>

    
    </div>
    <div  class='btn_create' >
    <a class="btn btn-secondary btn-lg" role="button" data-toggle="collapse" href="#arlist" aria-expanded="false"
        aria-controls="collapseExample">
        {{ __('messages.Categories List') }}
    </a>
    </div>

    <div class="collapse" id="arlist">
        <div class="well">

            <div class="card">
                <div class="card-header">
                    <h4> {{ __('messages.Categories List') }}</h4>
                </div>

                <div class="card-body">

                    @if (isset($type) && $type->count() > 0)
                        <table id="category"  class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>
                                        <h3> {{ __('messages.name') }} </h3>
                                    </th>
                                    <th class="text-center"> {{ __('messages.operation') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($type as $item)


                                    <tr>
                                        <td>{{ $item['type_name'] }}</td>
                                        <td class="text-center">
                                            <a href="{{ route("delete.category_$lang", $item['id']) }}"
                                                class="btn btn-danger btn-sm">{{ __('messages.delete') }}</a>

                                            <a href="{{ route('show.categorynews', $item['id']) }}"
                                                class="btn btn-success btn-sm">{{ __('messages.show news') }}</a>

                                            <a href="{{ route('edit.category', $item['id']) }}"
                                                class="btn btn-primary btn-sm">{{ __('messages.edit') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @else
                        <h3> {{ __('messages.There is No Categories') }}</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script>

$(document).ready(function() {

    $('#category').DataTable();
} );
</script>
    
@endsection
