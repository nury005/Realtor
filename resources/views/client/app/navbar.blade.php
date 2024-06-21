{{--<div class="dropend">--}}
{{--<a href="#" class="dropdown-item" data-bs-toggle="dropdown">@lang('app.lang') <i--}}
{{--class="bi bi-translate"></i></a>--}}
{{--<div class="dropdown-menu shadow" style="z-index: 2050 !important;">--}}
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
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<nav class="navbar navbar-expand-sm sticky-top bg-body-tertiary">--}}
{{--<div class="container-xl">--}}
{{--<a class="navbar-brand fs-3 fw-bold" href="{{route('/')}}">@lang('app.app-name')</a>--}}
{{--<button class="navbar-toggler border-0" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"--}}
{{--aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--<div class="hamburger-toggle">--}}
{{--<div class="hamburger">--}}
{{--<span></span>--}}
{{--<span></span>--}}
{{--<span></span>--}}
{{--</div>--}}
{{--</div>--}}
{{--</button>--}}
{{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--<ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center align-items-center">--}}
{{--<li class="nav-item hover-underline-animation">--}}
{{--<a class="nav-link" href="{{route('/')}}">@lang('app.home')</a>--}}
{{--</li>--}}
{{--@auth()--}}
{{--@if(auth()->user()->admin == 1)--}}
{{--<li class="nav-item hover-underline-animation"><a class="nav-link"--}}
{{--href="{{route('admin.dashboard')}}">--}}
{{--@lang('app.dashboard')</a></li>--}}
{{--<li class="nav-item hover-underline-animation"><a href="{{ route('logout') }}"--}}
{{--class="nav-link"--}}
{{--onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">--}}
{{--@lang('app.logout')</a>--}}
{{--<form method="POST" action="{{ route('logout') }}" id="logoutForm">--}}
{{--@csrf--}}
{{--</form>--}}
{{--</li>--}}
{{--@endif--}}
{{--@endauth--}}
{{--@guest()--}}
{{--<li class="nav-item dropdown hover-underline-animation">--}}
{{--<a class="nav-link dropdown-toggle user-select-none" data-bs-toggle="dropdown"--}}
{{--data-bs-auto-close="outside">@lang('app.profil')</a>--}}
{{--@endguest--}}
{{--<ul class="dropdown-menu shadow">--}}
{{--@guest()--}}
{{--<li><a href="{{route('login')}}"--}}
{{--class="dropdown-item btn btn-sm btn-outline-secondary"><i--}}
{{--class="bi bi-door-open-fill"></i>--}}
{{--@lang('app.login')</a></li>--}}
{{--<li><a href="{{route('register')}}"--}}
{{--class="dropdown-item btn btn-sm btn-outline-secondary"><i--}}
{{--class="bi bi-door-closed-fill"></i>--}}
{{--@lang('app.register')</a></li>--}}
{{--@endguest--}}
{{--@auth()--}}
{{--@if(auth()->user()->admin == 0)--}}
{{--<li><a class="dropdown-item btn btn-sm btn-outline-secondary"><i--}}
{{--class="bi bi-person-fill-gear"></i>--}}
{{--{{ auth()->user()->name }}</a></li>--}}
{{--<li><a href="{{ route('logout') }}"--}}
{{--class="dropdown-item btn btn-sm btn-outline-secondary"--}}
{{--onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"><i--}}
{{--class="bi bi-box-arrow-in-right"></i>--}}
{{--@lang('app.logout')</a>--}}
{{--<form method="POST" action="{{ route('logout') }}" id="logoutForm">--}}
{{--@csrf--}}
{{--</form>--}}
{{--</li>--}}
{{--</li>--}}
{{--@endif--}}
{{--@endauth--}}
{{--</ul>--}}


<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            <h1><a href="index.html">@lang('app.app-name')</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">@lang('app.home')</a></li>
                <li class="dropdown"><a href="#"><span>@lang('app.about')</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="nav-link scrollto" href="#about">@lang('app.about')</a></li>
                        <li><a class="nav-link scrollto" href="#team">@lang('app.team')</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#contact">@lang('app.contact_us')</a></li>
                {{--<li class="dropdown"><a href="#"><span>@lang('app.lang')</span> <i class="bi bi-chevron-down"></i></a>--}}
                    {{--<ul>--}}
                        {{--<li><a class="nav-link scrollto" href="{{ route('language', 'tk') }}">@lang('app.tkm') <img height="16"--}}
                                                                                                                    {{--src="{{asset('img/flag/tkm.png')}}"></a></li>--}}
                        {{--<li><a class="nav-link scrollto" href="{{ route('language', 'ru') }}">@lang('app.rus') <img height="16"--}}
                                                                                                                    {{--src="{{asset('img/flag/rus.png')}}"></a></li>--}}
                        {{--<li><a class="nav-link scrollto" href="{{ route('language', 'en') }}">@lang('app.eng') <img height="16"--}}
                                                                                                                    {{--src="{{asset('img/flag/eng.png')}}"></a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}

                <li><a class="getstarted scrollto" href="#about">@lang('app.get')</a></li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->