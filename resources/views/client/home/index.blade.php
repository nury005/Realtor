@extends('client.layouts.app')
@section('title')
    @lang('app.app-name')
@endsection
@section('content')
    @include('client.home.index.popular')
@endsection
