<form action="{{ url()->current() }}" method="get">
    <div class="accordion" id="accordionPanelsStayOpenExample">

        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-heading-c">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-c" aria-expanded="true" aria-controls="panelsStayOpen-collapse-c">
                    @lang('app.types')
                </button>
            </h2>
            <div id="panelsStayOpen-collapse-c" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading-c">
                <div class="accordion-body px-2 py-1">
                    <select class="form-select" name="types[]" id="types" size="5" multiple>
                    @foreach($types as $type)
                        <div class="form-check my-2">
                            <option value="{{ $type->id }}" {{ in_array($type->id, $f_types) ? 'selected' : '' }}>{{ $type->name_tm }}</option>
                        </div>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-heading-b">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-b" aria-expanded="true" aria-controls="panelsStayOpen-collapse-b">
                    @lang('app.locations')
                </button>
            </h2>
            <div id="panelsStayOpen-collapse-b" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading-b">
                <div class="accordion-body px-2 py-1">
                    <select class="form-select" name="locations[]" id="locations" size="4" multiple>
                    @foreach($locations as $location)
                        <div class="form-check my-2">
                            <option value="{{ $location->id }}" {{ in_array($location->id, $f_locations) ? 'selected' : '' }}>{{ $location->name_tm }}</option>
                        </div>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-heading-b">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-b" aria-expanded="true" aria-controls="panelsStayOpen-collapse-b">
                    @lang('app.perPage')
                </button>
            </h2>
            <div id="panelsStayOpen-collapse-b" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading-b">
                <div class="accordion-body px-2 py-1">

            <select class="form-select" name="perPage" id="perPage">
                @foreach([15, 30, 60, 120] as $perPage)
                    <option value="{{ $perPage }}" {{ $perPage == $f_perPage ? 'selected' : '' }}>{{ $perPage }}</option>
                @endforeach
            </select>

            </div>
        </div>

        </div>

    </div>
    <div class="row g-2 my-1">
        <div class="col">
            <button type="submit" class="btn btn-danger btn-sm w-100"><i class="bi bi-funnel-fill"></i></button>
        </div>
        <div class="col">
            <a href="{{ url()->current() }}" class="btn btn-secondary btn-sm w-100"><i class="bi bi-trash-fill"></i></a>
        </div>
    </div>
</form>