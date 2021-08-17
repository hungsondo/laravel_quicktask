@extends('layout.master')
@section('content')
<div class="container">
    <h3>{{ __('create_a_new_product') }}</h3>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="form-group">
            <label >{{ __('name') }}</label>
            <input type="text" class="form-control"  name="name" required  placeholder="{{ __('name') }}">
        </div>
        <div class="form-group">
            <label >{{ __('img') }}</label>
            <input type="file" class="form-control"  name="image">
        </div>
        <div class="form-group">
            <label >{{ __('category') }}</label>
            <select name="category_id" > 
                @foreach ($categories as $category)
                    <option value='{{ (int)$category->id }}'>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label >{{ __('price') }}</label>
            <input type="number" class="form-control"  name="price" required placeholder="{{ __('price') }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ __('save') }}</button>
    </form>
</div>
@endsection
