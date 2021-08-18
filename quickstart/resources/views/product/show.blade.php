@extends('layout.master')
@section('content')
<div class="container">
    <h3 class="text-center">{{ __('product_page') }}</h3>
    <a href="{{ route('products.create') }}" class="btn btn-primary text-uppercase font-weight-bold rounded-1" role="button" >
        {{ __('create_a_new_product') }}
    </a>
    <div class="row mt-3">
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col" class="">#</th>
                        <th scope="col" class="">{{ __('name') }}</th>
                        <th scope="col" class="">{{ __('img') }}</th>
                        <th scope="col" class="">{{ __('price') }}</th>
                        <th scope="col" class="">{{ __('category') }}</th>
                        <th scope="col" class="" colspan = 2>{{ __('action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td><img src="{{ asset('storage/' . $product->img) }}" alt="No Image" width="369px" class="thumbnail"></td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td class="d-flex align-items-center justify-content-around">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning" role="button" >
                                {{ __('edit') }}
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="post"
                                onsubmit="return confirm(' {{ __('delete_confirm') }} ')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-1">
                                        {{ __('delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
