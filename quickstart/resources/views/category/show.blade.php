@extends('layout.master')
@section('content')
<div class="container">
    <h3 class="text-center">{{ __('show') . " " . __('category') }}</h3>
    <a href="{{ route('categories.create') }}" class="btn btn-primary text-uppercase font-weight-bold rounded-1" role="button" >
        {{ __('create_a_new_category') }}
    </a>
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col" class="">ID</th>
                        <th scope="col" class="">{{ __('name') }}</th>
                        <th scope="col" class="">{{ __('description') }}</th>
                        <th scope="col" class="">{{ __('action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <th scope="row">{{ $cate->id }}</th>
                        <td>{{ $cate->name }}</td>
                        <td>{{ $cate->desc }}</td>
                        <td class="d-flex align-items-center justify-content-around">
                            <a href="{{ route('categories.edit', $cate->id) }}" class="btn btn-warning" role="button" >
                                {{ __('edit') }}
                            </a>
                            <form action="{{ route('categories.destroy', $cate->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger rounded-1">
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
