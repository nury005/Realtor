@extends('layouts.app')
@section('title')
    @lang('app.appName')
@endsection
@section('content')
    <div style="" class="bg-secondary bg-opacity-50">
        <div class="container-xxl">
            <div class="row">
                <div class="col">
                    <img class="animation d-none d-lg-block" src="{{asset('img/index.JPG')}}" style="height: 231px; margin-top: 80px;">
                </div>
                <div class="col-6 text-center" style="margin-top: 80px">
                    <div id="mytext">
                        <h1 id="names">
                            Welcome to
                            <span style="--i:0;" data-text="Realtor.com">Realtor.com</span>
                            <span style="--i:1;" data-text="Realtor.com">Realtor.com</span>
                            <span style="--i:2;" data-text="Realtor.com">Realtor.com</span>
                        </h1>
                    </div>

                </div>
                <div class="col mb-5">
                    <img class="animation d-none d-lg-block" src="{{asset('img/sssss.JPG')}}"
                         style="height: 224px; margin-top: 80px;">
                </div>
            </div>
        </div>
    </div>

    <div class="splide mt-3 mx-5" role="group" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($sliders as $slider)
                    <li class="splide__slide"><img src="{{ $slider->getImage() }}" class="img-fluid w-100" style="height: 60vh"></li>
                @endforeach
            </ul>
        </div>
    </div>

    @foreach($typeEstates as $typeEstate)
        <div class="border-top">
            <div class="container-xl py-4">
                <div class="h5 mb-4">
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

    <div class="socialm bg-secondary bg-opacity-75">
        <div class="container-xl row">
        <div class="col footerd">
            <div class="fttxt">
                <h1>Habarlaşmak üçin <small>>>></small></h1>
                <br>
                <h4>designed and developed by:</h4>
                <h4>sdfadfdsfsdfsdfadsfsdfff</h4>
                <br>

            </div>
        </div>
        <div class="col footerd2">
            <div class="smblk">
                <div class="hoverbox">
                    <ul class="hvul">
                        <li onclick="window.open('https://www.youtube.com/@bb')" class="hvli" style="--cb:-2;--colr:#ff0000;" data-text="YouTube"><a onclick="window.open('https://www.youtube.com/@bb')" class="hva" ><span class="hvspan"><i class='bx bxl-youtube' ></i></span>@realtor.com</a></li>
                        <li onclick="window.open('https://www.instagram.com/bb/')" class="hvli" style="--cb:-1;--colr:#C32aa3;" data-text="Instagram"><a onclick="window.open('https://www.instagram.com/bb/')" class="hva" ><span class="hvspan"><i class='bx bxl-instagram' ></i></span>@realtor.com</a></li>
                        <li onclick="window.open('https://www.facebook.com/@bb')" class="hvli" style="--cb:0;--colr:#1877f2;" data-text="Facebook"><a onclick="window.open('https://www.facebook.com/@bb')" class="hva" ><span class="hvspan"><i class='bx bxl-facebook-circle'></i></span>@realtor.com</a></li>
                        <li onclick="window.open('https://www.linkedin.com/in/bb/')" class="hvli" style="--cb:1;--colr:#1da1f2;" data-text="Linkedin"><a onclick="window.open('https://www.linkedin.com/in/bb/')" class="hva" ><span class="hvspan"><i class='bx bxl-linkedin'></i></span>realtor.com</a></li>
                        <li onclick="window.open('https://www.patreon.com/bb')" class="hvli" style="--cb:2;--colr:#959595;" data-text="Patreon"><a onclick="window.open('https://www.patreon.com/bb')" class="hva" ><span class="hvspan"><i class='bx bxl-patreon' ></i></span>Patreon</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script>
        var splide = new Splide( '.splide' );
        splide.mount();
    </script>
<style>
    /*in asagy*/
    .socialm {
        font-family: "Poppins", sans-serif;
        position: relative;
        display: flex;
        flex-wrap: wrap;
        flex-flow: wrap;
        flex-direction: row;
        width: 100%;
        height: 20rem;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
        backdrop-filter: blur(17px);
        -webkit-backdrop-filter: blur(17px);
        border-top: 1px solid #6d6d6d8d;
        transition: all 250ms ease-in-out;
    }

    .footerd {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: right;
        justify-items: center;
        align-content: right;
        width: 50%;
        height: 100%;
        transition: all 250ms ease-in-out;
    }

    .footerd2 {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: left;
        justify-content: center;
        justify-items: left;
        align-content: center;
        width: 50%;
        height: 100%;
        transition: all 250ms ease-in-out;
    }

    .hoverbox {
        top: 0;
        position: relative;
    }

    .smblk  {
        display: flex;
        align-items: center;
        justify-items: center;
        align-content: center;
        justify-content: center;
        height: 100%;
        width: 50%;
    }

    .hvul {
        position: relative;
        transform: skewY(-25deg);
    }

    .hvul .hvli {
        position: absolute;
        top: 0;
        transform: translate(calc(var(--cb) * 40px), calc(var(--cb) * 40px));
        list-style: none;
        width: 100px;
        padding: 15px;
        background: #383838;
        transition: 0.5s;
        cursor: pointer;
    }

    .hvul .hvli:hover {
        top: -54px;
        background: var(--colr);

    }

    .hvul .hvli::before {
        content: "";
        position: absolute;
        top: 0;
        left: -40px;
        width: 40px;
        height: 100%;
        background: #2f2f30;
        transform-origin: right;
        transform: skewY(45deg);
        transition: 0.5s;
    }

    .hvul .hvli:hover::before {
        background: var(--colr);
        filter: brightness(0.8);
    }

    .hvul .hvli::after {
        content: attr(data-text);
        position: absolute;
        top: -39px;
        left: 0;
        width: 100%;
        height: 40px;
        background: #3e3e3e;
        transform-origin: bottom;
        transform: skewX(45deg);
        box-shadow: -120px 120px 20px rgba(0, 0, 0, 0.25);
        transition: 0.5s;
        display: flex;
        align-items: center;
        left: 0.05em;
        padding-left: 15px;
        box-sizing: border-box;
        color: var(--colr);
        font-size: 0.9rem;
    }

    .hvul .hvli:hover::after {
        filter: brightness(0.9);
        background: var(--colr);
        color: #fff;
        box-shadow: -170px 170px 20px rgba(0, 0, 0, 0.25);
    }

    .hvul .hvli .hva {
        text-decoration: none;
        color: transparent;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        transition: 0.5s;
        text-align: left;
        font-size: 0.8em;
    }


    .hvul .hvli:hover .hva {
        color: #000;
        font-size: 0.57rem;
        font-weight: bolder;
    }

    .hvul .hvli .hva .hvspan {
        position: absolute;
        top: 0;
        left: -40px;
        width: 40px;
        text-align: center;
        height: 100%;
        color: var(--colr);
        transform-origin: right;
        transform: skewY(45deg);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2em;
    }

    .hvul .hvli:hover .hva .hvspan {
        color: #fff;
    }

    .fttxt {
        text-align: left;
        height: 100%;
        width: 50%;
        align-content: center;
        justify-content: center;
        color: #161719;
        transition: all 250ms ease-in-out;
    }




    /*Welcome*/
    #names {
        top: 1;
        left: 0;
        margin-top: 4rem;
        color: #fff;
        font-size: 3em;
        padding: 0 10px;
        font-weight: 600;

        transition: all 250ms ease-in-out;
    }

    #names span{
        position: relative;
        color: rgba(255, 255, 255, 0.1);
        animation: displaytext 9s infinite;
        animation-delay: calc(-3s * var(--i));
    }

    @keyframes displaytext {
        0% {
            display: inline-block;
        }
        33.33%, 100% {
            display: none;
        }
    }

    #names span::before {
        content: attr(data-text);
        position: absolute;
        background: linear-gradient(70deg, #ffe100, #ff00dd);
        -webkit-text-fill-color: transparent;
        -webkit-background-clip: text;
        background-clip: text;
        width: 100%;
        overflow: hidden;
        border-right: 4px solid red;
        filter: drop-shadow(0 0 20px #ff00dd) drop-shadow(0 0 25px #ffe100);
        animation: indicator 3s linear infinite;
    }

    @keyframes indicator {
        0%, 10%, 100% {
            width: 0;
        }
        70%, 90% {
            width: 100%;
        }

    }
</style>

@endsection