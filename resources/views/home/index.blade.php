@extends('layouts.app')
@section('title')
    @lang('app.appName')
@endsection
@section('content')
    @foreach($typeEstates as $typeEstate)
        <div class="border-top">
            <div class="container-xl py-4">
                <div class="h5 mb-3">
                    <a href="{{ route('estates.index', ['type' => $typeEstate['type']->id]) }}" class="link-dark text-decoration-none">
                        {{ $typeEstate['type']->name }}
                    </a>
                    <span class="text-dark">{{ $typeEstate['type']->estates_count }} @lang('app.estates')</span>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
                    @foreach($typeEstate['estates'] as $estate)
                        <div class="col">
                            @include('app.car')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endsection