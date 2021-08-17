@extends('layout.master')
@section('content')
<div class="container">
    <h3 class="text-center">{{ __('product_page') }}</h3>
    <a href="{{ route('products.create') }}" class="btn btn-primary text-uppercase font-weight-bold rounded-1" role="button" >
        {{ __('create_a_new_product') }}
    </a>
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col" class="">#</th>
                        <th scope="col" class="">{{ __('name') }}</th>
                        <th scope="col" class="">{{ __('img') }}</th>
                        <th scope="col" class="">{{ __('price') }}</th>
                        <th scope="col" class="">{{ __('category') }}</th>
                        <th scope="col" class="">{{ __('action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $prod)
                        <tr class="text-center">
                            <th scope="row">{{ $prod->id }}</th>
                            <td>{{ $prod->name }}</td>
                            <td><img src="{{ asset('storage/' . $prod->img) }}" alt="No Image" width="100px" class="thumbnail"></td>
                            <td>{{ $prod->price }}</td>
                            <td>{{ $prod->category->name }}</td>
                            <td class="d-flex align-items-center justify-content-around">
                                <a href="{{ route('products.show', $prod->id) }}" class="btn btn-success" role="button" >
                                    {{ __('show') }}
                                </a>
                                <a href="{{ route('products.edit', $prod->id) }}" class="btn btn-warning" role="button" >
                                    {{ __('edit') }}
                                </a>
                                <form action="{{ route('products.destroy', $prod->id) }}" method="post"
                                    onsubmit="return confirm(' {{ __('delete_confirm') }} ')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded-1">
                                        {{ __('delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
