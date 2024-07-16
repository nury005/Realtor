@extends('admin.layouts.app')
@section('title')
    @lang('app.citizens')
@endsection
@section('content')
    <div class="h6 p-2">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none green">
            @lang('app.dashboard')
        </a>
        <i class="bi-chevron-right small"></i>
        <a href="{{ route('admin.sliders.index') }}" class="text-decoration-none green">
            @lang('app.citizens')
        </a>
        <i class="bi-chevron-right small"></i>
        {{$obj->name}}
    </div>

    <div class="row mb-3 justify-content-center">
        <div class="bg-body-tertiary rounded-3 m-3 p-3 text-center col-11">
            <form action="{{ route('admin.sliders.update', $obj->id) }}" enctype="multipart/form-data" method="post">
                @method('PUT')
                @csrf
                <div class="d-flex align-items-center justify-content-center">
                    <div class="col-3 m-3">
                        <label for="name" class="form-label fw-bold">
                            @lang('app.name')
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               id="name" value="{{ $obj->name }}" maxlength="16" required autofocus>
                        @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>




                    <div class="col-3 m-3">
                        <label for="image" class="form-label fw-bold">
                            @lang('app.image')
                        </label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                               name="image"
                               id="image" value="{{ $obj->image }}">
                        @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>


                </div>

                <button type="submit" class="btn btn-primary">
                    @lang('app.update')
                </button>
            </form>
        </div>
    </div>
@endsection
