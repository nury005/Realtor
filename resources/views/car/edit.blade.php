@extends('layouts.app')
@section('title') {{ $estate->name_tm }} - @lang('app.edit') @endsection
@section('content')
    <div class="container-xxl py-3">
        <div class="d-block h3 text-dark fw-bold text-center border-bottom py-2 mb-3">
            {{ $estate->name }} - @lang('app.edit')
        </div>
        <div class="row justify-content-center">
            <form action="{{ route('estates.update', $estate->id) }}" method="post" enctype="multipart/form-data" class="col-md-6 col-lg-4">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="type_id" class="form-label fw-bold">
                        @lang('app.type') <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('type_id') is-invalid @enderror" id="type_id" name="type_id" required>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ $type->id == $estate->type_id ? 'selected':'' }}>
                                {{ $type->name_tm }}
                            </option>
                        @endforeach
                    </select>
                    @error('type_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="location_id" class="form-label fw-bold">
                        @lang('app.location') <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('location_id') is-invalid @enderror" id="location_id" name="location_id" required autofocus>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}" {{ $location->id == $estate->location_id ? 'selected':'' }}>
                                {{ $location->name_tm }}
                            </option>
                        @endforeach
                    </select>
                    @error('location_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">
                        @lang('app.name')
                    </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $estate->name }}">
                    @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>


                {{--<div class="mb-3">--}}
                    {{--<label for="bar_code" class="form-label fw-bold">--}}
                        {{--@lang('app.bar_code') <span class="text-danger">*</span>--}}
                    {{--</label>--}}
                    {{--<input type="text" class="form-control @error('bar_code') is-invalid @enderror" name="bar_code" id="bar_code" value="{{ $ktap->bar_code }}" maxlength="255" required>--}}
                    {{--@error('bar_code')--}}
                    {{--<div class="alert alert-danger mt-1">{{ $message }}</div>--}}
                    {{--@enderror--}}
                {{--</div>--}}

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">
                        @lang('app.description')
                    </label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3" maxlength="2550">{{ $estate->description }}</textarea>
                    @error('description')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">
                        @lang('app.price') <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ $estate->price }}" min="0" step="0.1" required>
                    @error('price')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">@lang('app.image') (500x500)</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" accept="image/jpeg">
                    @error('image')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check2-circle"></i> @lang('app.update')
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection