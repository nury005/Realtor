<div class="border rounded shadow-sm bg-white p-3">
    <a href="{{ route('estates.show', $estate->id) }}" class="d-flex justify-content-between">
        <div>
            <div class="mb-1">
                <img class="img-fluid w-100 rounded" src="{{$estate->image()}}" style="height: 150px; width: 350px" >

                <div class="d-flex align-items-center justify-content-between">

                    <a href="{{ route('estates.index', ['type' => $estate->type->id]) }}" class="mt-3 text-dark h5 fw-semibold text-decoration-none">
                        {{ $estate->type->name_tm }}
                    </a>

                    <div>
                        @if($estate->created_at >= \Carbon\Carbon::now()->subMonths(3)->toDateTimeString())
                            <span class="badge bg-danger-subtle border border-danger-subtle text-danger-emphasis rounded-pill">
                    @lang('app.new')
                </span>
                        @endif
                        <button class="btn btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCar{{ $estate->id }}" aria-expanded="false" aria-controls="collapseCar{{ $estate->id }}">
                            <i class="bi-caret-down-fill"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <div id="collapseCar{{ $estate->id }}" class="small text-secondary collapse">
        <a href="{{ route('estates.index', ['location' => $estate->location->id]) }}" class="link-dark text-decoration-none">
            {{ $estate->location->name_tm }}
        </a>
        ∙ {{ $estate->description }} ({{ $estate->created_at }})
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <span class="text-primary fw-semibold">
                {{ round($estate->price, 2) }} <small>TMT</small>
            </span>
        </div>
        <div>
            <a href="{{ route('estates.show', $estate->id) }}" class="text-dark text-decoration-none">
                <i class="bi-eye-fill"></i> {{ $estate->viewed }}
            </a>
        </div>
    </div>
</div>
