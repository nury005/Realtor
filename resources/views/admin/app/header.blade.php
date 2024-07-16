<div class="container-fluid">
    <button class="btn btn-primary" id="sidebarToggle"><i class="bi bi-menu-button-wide-fill"></i></button>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
            <li id="menu" class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">@lang('app.dashboard')</a></li>
            <li id="menu" class="nav-item"><a class="nav-link"  href="{{ route('admin.estates.index') }}">@lang('app.estates')</a></li>
            <li id="menu" class="nav-item"><a class="nav-link" href="{{ route('admin.contacts.index') }}">@lang('app.contacts')</a></li>
            <li id="menu" class="nav-item"><a class="nav-link" href="{{ route('admin.sliders.index') }}">@lang('app.sliders')</a></li>
            {{--<li id="menu" class="nav-item"><a class="nav-link" href="{{ route('admin.types.index') }}">@lang('app.types')</a></li>--}}

            <li class="nav-item dropdown">
                <a href="#" class="nav-link" data-bs-toggle="dropdown">@lang('app.lang') <i
                            class="bi bi-translate"></i></a>
                <div class="dropdown-menu dropdown-menu-end shadow" style="z-index: 2050 !important;">
                    {{--<a id="a11" class="dropdown-item" href="{{ route('language', 'tk') }}"><img--}}
                                {{--class="pe-1" height="16"--}}
                                {{--src="{{asset('img/flag/tkm.png')}}">--}}
                        {{--@lang('app.tkm')</a>--}}
                    {{--<a id="a22" class="dropdown-item" href="{{ route('language', 'ru') }}"><img--}}
                                {{--class="pe-1" height="16"--}}
                                {{--src="{{asset('img/flag/rus.png')}}">--}}
                        {{--@lang('app.rus')</a>--}}
                    {{--<a id="a33" class="dropdown-item" href="{{ route('language', 'en') }}"><img--}}
                                {{--class="pe-1" height="16"--}}
                                {{--src="{{asset('img/flag/eng.png')}}">--}}
                        {{--@lang('app.eng')</a>--}}
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle" width="30" src="{{ auth()->user()->getImage() }}"></a>
                <div class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#!">@lang('app.profil')</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">@lang('app.logout') <span
                                class="text-warning">{{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                            @csrf
                        </form>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>