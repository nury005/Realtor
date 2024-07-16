@extends('admin.layouts.app')
@section('title')
    @lang('app.sliders')
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            @lang('app.sliders')
        </h1>

        <a href="{{ route('admin.sliders.create') }}"
           class="btn btn-danger btn-sm text-decoration-none d-flex">
            <i class="bi-plus-lg"></i> @lang('app.add')
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped text-center">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">@lang('app.image')</th>
                <th scope="col">@lang('app.name')</th>
                <th scope="col"><i class="bi-gear-fill"></i></th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td><img class="rounded-circle" width="50" height="50" src="{{ $obj->getImage() }}"></td>
                    <td>{{ $obj->name }}</td>
                    <td>
                        <a href="{{ route('admin.sliders.show', $obj->id) }}" class="btn btn-info btn-sm my-1">
                            <i class="bi-eye-fill"></i>
                        </a>
                        <a href="{{ route('admin.sliders.edit', $obj->id) }}" class="btn btn-success btn-sm my-1">
                            <i class="bi-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-secondary btn-sm my-1" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $obj->id }}">
                            <i class="bi-trash"></i>
                        </button>
                        <div class="modal fade" id="delete{{ $obj->id }}" tabindex="-1"
                             aria-labelledby="delete{{ $obj->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title fs-5 fw-bold" id="delete{{ $obj->id }}Label">
                                            {{ $obj->id }}. {{ $obj->name }}
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @lang('app.delete-question')
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('admin.sliders.destroy', $obj->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-secondary btn-sm"><i
                                                        class="bi-trash"></i> @lang('app.delete')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
