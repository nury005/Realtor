<nav class="navbar navbar-expand-lg bg-secondary bg-opacity-75" aria-label="Navbar">
    <div class="container-xl">
        <a class="navbar-type fw-bold {{ request()->routeIs('home') ? 'link-primary':'' }}" href="{{ route('home') }}">
            <img class="img-fluid" src="{{asset('img/logo-brand.svg')}}" style="height: 1.5rem">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('estates.index') ? 'link-primary':'' }}" href="{{ route('estates.index') }}">
                        <i class="bi-funnel"></i> @lang('app.filter')
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">@lang('app.types')</a>
                    <ul class="dropdown-menu">
                        @foreach($types as $type)
                            <li>
                                <a class="dropdown-item" href="{{ route('estates.index', ['types' => [$type->id]]) }}">
                                    {{ $type->name_tm }}
                                    <span class="badge bg-primary-subtle border border-primary-subtle text-primary-emphasis rounded-pill">
                                        {{ $type->estates_count }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">@lang('app.locations')</a>
                    <ul class="dropdown-menu">
                        @foreach($locations as $location)
                            <li>
                                <a class="dropdown-item" href="{{ route('estates.index', ['locations' => [$location->id]]) }}">
                                    {{ $location->name_tm }}
                                    <span class="badge bg-primary-subtle border border-primary-subtle text-primary-emphasis rounded-pill">
                                        {{ $location->estates_count }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle bi bi-translate" href="#" data-bs-toggle="dropdown" aria-expanded="false"> @lang('app.lang')</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('locale', 'tm') }}">Türkmençe</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale', 'tr') }}">Türkçe</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale', 'ru') }}">Русский</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale', 'en') }}">English</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacts.create') }}">
                        <i class="bi-envelope"></i> @lang('app.contact')
                    </a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('estates.userCars') }}">@lang('app.myPosts')</a>
                    </li>
                @endauth
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('estates.create') }}">@lang('app.add')</a>
                    </li>
                @endauth
            </ul>

            <div class="w-25">
                <form action="{{route('estates.index')}}" method="get">
                    <div class="input-group">
                        <button type="submit" class="input-group-text bg-secondary bg-opacity-50 border-0" id="basic-addon2"><i class="bi-search text-light text-opacity-25" style="transform: rotate(90deg)"></i></button>
                        <input type="text" name="q" class="form-control pe-5 text-dark  bg-white border-0 shadow-none" aria-describedby="basic-addon2" placeholder="Gozle....">
                    </div>
                </form>
            </div>



            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-person-circle"></i> {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end"><li>
                                <a class="dropdown-item" href="{{ route('contacts.index') }}">
                                    <i class="bi-envelope"></i> @lang('app.messages')
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                    <i class="bi-box-arrow-right"></i> @lang('app.logout')
                                </a>
                        </ul>
                        <form id="logout" action="{{ route('logout') }}" method="post" class="d-none">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link link-warning" href="{{ route('login') }}">
                            <i class="bi-box-arrow-in-right"></i> @lang('app.login')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-warning" href="{{ route('register') }}">
                            <i class="bi-person-add"></i> @lang('app.register')
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

{{--<img class="img-fluid ms-5 " src="{{asset('img/ImportedPhoto_1718570078545.JPG')}}" style="width: 87rem">--}}


