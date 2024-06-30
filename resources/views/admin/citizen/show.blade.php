@extends('admin.layouts.app')
@section('title')
    @lang('app.estates')
@endsection
@section('content')
    <div class="h6 mb-3 p-2">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none green">
            @lang('app.dashboard')
        </a>
        <i class="bi-chevron-right small"></i>
        <a href="{{ route('admin.estates.index') }}" class="text-decoration-none green">
            @lang('app.estates')
        </a>
        <i class="bi-chevron-right small"></i>
        {{$obj->name_tm}}
    </div>
    <div class="row m-3 bg-body-tertiary justify-content-center align-items-center rounded-2">
        <div class="col-2 text-center">
            <img class="img-fluid rounded-circle mt-3" src="{{$obj->image()}}">
            {{--<div--}}
                    {{--class="h3 pt-2 d-flex align-items-center justify-content-center">{!! $obj->gender() !!} {{$obj->name}}</div>--}}
            {{--<div class="mb-3">{{ $obj->birthday->format('d.m.Y') }}</div>--}}
        </div>
        <div class="col-3">
            <div class="mb-4">
                <label class="green small fw-bolder">@lang('app.name')</label>
                <div class="border border-primary border-1 rounded-1">{{$obj->name}}</div>
            </div>
            <div class="mb-4">
                <label class="green small fw-bolder">@lang('app.type')</label>
                <div class="border border-primary border-1 rounded-1">{{$obj->type}}</div>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-4">
                <label class="green small fw-bolder">@lang('app.location')</label>
                <div class="border border-primary border-1 rounded-1">{{$obj->location}}</div>
            </div>
            <div class="mb-4">
                <label class="green small fw-bolder">@lang('app.description')</label>
                <div class="border border-primary border-1 rounded-1">{{$obj->description}}</div>
            </div>
        </div>

        <div class="col-3">
            <div class="mb-4">
                <label class="green small fw-bolder">@lang('app.price')</label>
                <div class="border border-primary border-1 rounded-1">{{$obj->price}}</div>
            </div>
        </div>

    </div>
    <div class="row m-3 p-2 bg-body-tertiary justify-content-center align-items-center rounded-2">
        <div class="table-responsive">
            <table class="table table-hover table-striped text-center">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">@lang('app.estate')</th>
                    <th scope="col">@lang('app.from')</th>
                    <th scope="col">@lang('app.result')</th>
                    <th scope="col">@lang('app.contact1')</th>
                    <th scope="col">@lang('app.time1')</th>
                    <th scope="col">@lang('app.time2')</th>
                    <th scope="col"><i class="bi-gear-fill"></i></th>
                </tr>
                </thead>
                <tbody>


                @forelse($contacts as $obj)
                    <tr>
                        <td>{{ $obj->id }}</td>
                        <td>{{ $obj->estate->name_tm }}</td>
                        <td>{!! $obj->from() !!}</td>
                        <td>{{ $obj->result }}</td>
                        <td>{{ $obj->contact }}</td>
                        <td>{{ $obj->created_at->format('d.m.Y') }}</td>
                        <td>{{ $obj->updated_at->format('d.m.Y') }}</td>
                        <td>
                            <a href="{{ route('admin.contacts.edit', $obj->id) }}" class="btn btn-success btn-sm my-1">
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
                                                {{ $obj->id }}.{{ $obj->estate->name }}
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @lang('app.delete-question')
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('admin.contacts.destroy', $obj->id) }}" method="post">
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
                @empty
                    <tr>
                        <td colspan="16">@lang('app.contacts')</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
