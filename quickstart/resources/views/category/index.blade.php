@extends('layout.master')
@section('content')
<div class="container">
    <h3 class="text-center">{{ __('category_page') }}</h3>
    <a href="{{ route('categories.create') }}" class="btn btn-primary text-uppercase font-weight-bold rounded-1" role="button" >
        {{ __('create_a_new_category') }}
    </a>
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col" class="">#</th>
                        <th scope="col" class="">{{ __('name') }}</th>
                        <th scope="col" class="">{{ __('description') }}</th>
                        <th scope="col" class="">{{ __('action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="text-center">
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->desc }}</td>
                            <td class="d-flex align-items-center justify-content-around">
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-success" role="button" >
                                    {{ __('show') }}
                                </a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning" role="button" >
                                    {{ __('edit') }}
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="post"
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
        </div>
    </div>
</div>
@endsection
