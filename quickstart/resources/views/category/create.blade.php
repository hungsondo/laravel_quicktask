@extends('layout.master')
@section('content')
<div class="container">
    <h3>{{ __('create_a_new_category') }}</h3>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf 
        <div class="form-group">
            <label >{{ __('name') }}</label>
            <input type="text" class="form-control"  name="name" required  placeholder="{{ __('name') }}">
        </div>
        <div class="form-group">
            <label >{{ __('description') }}</label>
            <input type="text" class="form-control"  name="desc" required placeholder="{{ __('description') }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ __('save') }}</button>
    </form>
</div>
@endsection
