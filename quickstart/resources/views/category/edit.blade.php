@extends('layout.master')
@section('content')
<div class="container">
    <h3 class="text-center">{{ __('edit_page') . " " . __('category') }}</h3>
    <form action="{{ route('categories.update',$cate->id) }}" method="POST">
        @csrf 
        @method("PUT")
        <div class="form-group">
            <label >{{ __('name') }}</label>
            <input type="text" class="form-control" value="{{ $cate->name }}"
                name="name" required  placeholder="{{ __('name') }}"
            >
        </div>
        <div class="form-group">
            <label >{{ __('description') }}</label>
            <input type="text" class="form-control" value="{{ $cate->desc }}"
                name="desc" required placeholder="{{ __('description') }}"
            >
        </div>
        <button type="submit" class="btn btn-primary">{{ __('edit') }}</button>
    </form>
</div>
@endsection
