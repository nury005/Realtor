<div class="border-end bg-body-tertiary" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-body-tertiary">@lang('app.app-name')</div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('admin.dashboard') }}">@lang('app.dashboard')</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3">@lang('app.citizens')</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" >
           {{--href="{{ route('admin.notes.index') }}">@lang('app.notes')--}}
        </a>
    </div>
</div>
