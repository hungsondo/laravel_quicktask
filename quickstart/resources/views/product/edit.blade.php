@extends('layout.master')
@section('content')
<div class="container">
    <h3>{{ __('edit_page') . " " . __('product') }}</h3>
    <form action="{{ route('products.update' , $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method("PUT")
        <div class="form-group">
            <label >{{ __('name') }}</label>
            <input type="text" class="form-control"  name="name" value="{{ $product->name }}"
                required  placeholder="{{ __('name') }}">
        </div>
        <div class="form-group">
            <label >{{ __('img') }}</label>
            <input type="file" class="form-control"  name="image" value="{{ $product->img }}">
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
            <input type="number" class="form-control"  name="price" value="{{ $product->price }}" required placeholder="{{ __('price') }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ __('save') }}</button>
    </form>
</div>
@endsection
