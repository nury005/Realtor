@extends('admin.layouts.app')
@section('title')
    @lang('app.estates')
@endsection
@section('content')
    <div class="h6 p-2">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none green">
            @lang('app.dashboard')
        </a>
        <i class="bi-chevron-right small"></i>
        <a href="{{ route('admin.estates.index') }}" class="text-decoration-none green">
            @lang('app.estates')
        </a>
        <i class="bi-chevron-right small"></i>
        @lang('app.add')
    </div>

    <div class="row mb-3 justify-content-center">
        <div class="bg-body-tertiary rounded-3 m-3 p-3 text-center col-11">
            <form action="{{ route('admin.estates.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="d-flex align-items-center justify-content-center">
                    <div class="col-3 m-3">
                        <label for="name" class="form-label fw-bold">
                            @lang('app.name')
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               id="name" value="{{ old('name') }}" maxlength="16" required autofocus>
                        @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-3 m-3">
                        <label for="type" class="form-label fw-bold">
                            @lang('app.type')
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('type') is-invalid @enderror"
                               name="type"
                               id="type" value="{{ old('type') }}" maxlength="16" required>
                        @error('type')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-3 m-3">
                    <label for="location" class="form-label fw-bold">
                    @lang('app.location')
                    <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('location') is-invalid @enderror" name="location" id="location"
                    required>
                    <option value="1" {{ old('location')  == 1 ? 'selected' : ''}}>@lang('app.ashgabat')</option>
                    <option value="2" {{ old('location') == 2 ? 'selected' : ''}}>@lang('app.lebap')</option>
                    <option value="3" {{ old('location') == 3 ? 'selected' : ''}}>@lang('app.mary')</option>
                    <option value="4" {{ old('location') == 4 ? 'selected' : ''}}>@lang('app.balkan')</option>
                    <option value="5" {{ old('location') == 5 ? 'selected' : ''}}>@lang('app.ahal')</option>
                    <option value="6" {{ old('location') == 6 ? 'selected' : ''}}>@lang('app.dashoguz')</option>
                    </select>
                    @error('location')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-center">
                    <div class="col-3 m-3">
                        <label for="price" class="form-label fw-bold">
                            @lang('app.price')
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            {{--<span class="input-group-text"></span>--}}
                            <input class="form-control" type="number" placeholder="@lang('app.price')" name="price"
                                   id="price" value="{{ old('price') }}"
                                   min="0" max="65999999">
                        </div>
                        @error('price')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>


                </div>

                <div class="d-flex align-items-center justify-content-center">


                    <div class="col-3 m-3">
                        <label for="image" class="form-label fw-bold">
                            @lang('app.image')
                        </label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                               name="image"
                               id="image" value="{{ old('image') }}">
                        @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>


                </div>

                <button type="submit" class="btn btn-primary">
                    @lang('app.add')
                </button>
            </form>
        </div>
@endsection
