<form action="{{ url()->current() }}">
    <div class="mb-3">
        <label for="types" class="form-label fw-semibold">@lang('app.types')</label>
        <select class="form-select form-select-sm" name="types[]" id="types" size="3" multiple>
            @foreach($types as $type)
                <option value="{{ $type->id }}" {{ in_array($type->id, $f_types) ? 'selected' : '' }}>{{ $type->name_tm }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="locations" class="form-label fw-semibold">@lang('app.locations')</label>
        <select class="form-select form-select-sm" name="locations[]" id="locations" size="3" multiple>
            @foreach($locations as $location)
                <option value="{{ $location->id }}" {{ in_array($location->id, $f_locations) ? 'selected' : '' }}>{{ $location->name_tm }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="perPage" class="form-label fw-semibold">@lang('app.perPage')</label>
        <select class="form-select form-select-sm" name="perPage" id="perPage">
            @foreach([15, 30, 60, 120] as $perPage)
                <option value="{{ $perPage }}" {{ $perPage == $f_perPage ? 'selected' : '' }}>{{ $perPage }}</option>
            @endforeach
        </select>
    </div>
    @auth
        <div class="mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="active" name="active" value="0">
                <label class="form-check-label" for="active">@lang('app.pending')</label>
            </div>
        </div>
    @endauth
    <div class="row g-3">
        <div class="col">
            <a href="{{ url()->current() }}" class="btn btn-secondary btn-sm w-100">
                @lang('app.clear')
            </a>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-danger btn-sm w-100">
                <i class="bi-funnel"></i> @lang('app.filter')
            </button>
        </div>
    </div>
</form>