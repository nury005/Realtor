<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('img/123.jpg')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front.css') }}">
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/aos.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/splide.min.js') }}"></script>
    {{--CSS--}}

    {{--<script type="text/javascript" src="{{ asset('js/splide.min.js') }}"></script>--}}
    {{--<link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">--}}

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/fancybox.min.css') }}">




    {{--JavaScript--}}

    <script type="text/javascript" src="{{ asset('js/mode.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/fancybox.min.js') }}"></script>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
    }

    main {
        background: linear-gradient(to bottom, #2d91c2 0%, #1e528e 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Pacifico", cursive;
        height: 100vh;
        padding: 20px;
        text-align: center;
    }

    h1 {
        color: white;
    }

    #snow-container {
        height: 100vh;
        overflow: hidden;
        position: absolute;
        top: 0;
        transition: opacity 500ms;
        width: 100%;
    }

    .snow {
        animation: fall ease-in infinite, sway ease-in-out infinite;
        color: skyblue;
        position: absolute;
    }

    footer {
        background-color: #ffdfb9;
        bottom: 0;
        font-family: sans-serif;
        padding: 1rem;
        text-align: center;
        width: 100%;
    }

    footer a {
        color: inherit;
        text-decoration: none;
    }

    footer .heart {
        color: #dc143c;
    }

    @keyframes fall {
        0% {
            opacity: 0;
        }
        50% {
            opacity: 1;
        }
        100% {
            top: 100vh;
            opacity: 1;
        }
    }

    @keyframes sway {
        0% {
            margin-left: 0;
        }
        25% {
            margin-left: 50px;
        }
        50% {
            margin-left: -50px;
        }
        75% {
            margin-left: 50px;
        }
        100% {
            margin-left: 0;
        }
    }

</style>
    {{--Dark lite button--}}
    <style>
        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        #wrapper {
            overflow-x: hidden;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            transition: margin 0.25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
            width: 15rem;
        }

        #page-content-wrapper {
            min-width: 100vw;
        }

        body.sb-sidenav-toggled #wrapper #sidebar-wrapper {
            margin-left: 0;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            body.sb-sidenav-toggled #wrapper #sidebar-wrapper {
                margin-left: -15rem;
            }
        }
    </style>
</head>

<body class="bg-success bg-opacity-25">

{{--Start dark ligt theme button--}}
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check2" viewBox="0 0 16 16">
        <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"></path>
        <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
        <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
    </symbol>
</svg>
<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
            <use href="#circle-half"></use>
        </svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                    aria-pressed="false">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                    <use href="#sun-fill"></use>
                </svg>
                Light
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                    <use href="#check2"></use>
                </svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                    <use href="#moon-stars-fill"></use>
                </svg>
                Dark
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                    <use href="#check2"></use>
                </svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                    aria-pressed="true">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                    <use href="#circle-half"></use>
                </svg>
                Auto
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                    <use href="#check2"></use>
                </svg>
            </button>
        </li>
    </ul>
</div>
{{--End dark ligt theme button--}}

<div id="snow-container" title="Click anywhere to remove snow">
</div>
<script>


    const snowContainer = document.getElementById("snow-container");
    const snowContent = ['&#10052', '&#10053', '&#10054']

    const random = (num) => {
        return Math.floor(Math.random() * num);
    }

    const getRandomStyles = () => {
        const top = random(100);
        const left = random(100);
        const dur = random(8) + 8;
        const size = random(20) + 20;
        return `
    top: -${top}%;
    left: ${left}%;
    font-size: ${size}px;
    animation-duration: ${dur}s;
  `;
    }

    const createSnow = (num) => {
        for (var i = num; i > 0; i--) {
            var snow = document.createElement("div");
            snow.className = "snow";
            snow.style.cssText = getRandomStyles();
            snow.innerHTML = snowContent[random(3)]
            snowContainer.append(snow);
        }
    }

    const removeSnow = () => {
        snowContainer.style.opacity = "0";
        setTimeout(() => {
            snowContainer.remove()
        }, 500)
    }

    window.addEventListener("load", () => {
        createSnow(30)
        setTimeout(removeSnow, (1000 * 60))
    });

    window.addEventListener("click", () => {
        removeSnow()
    });


</script>




@include('app.nav')
@include('app.alert')

@yield('content')

<button class="btn bg-secondary bg-opacity-25 border btn-sm rounded-pill shadow-sm position-fixed bottom-0 end-0 my-3 mx-3 mx-lg-5 mx-xl-5"
        style="display: block; z-index: 99;" onclick="topFunction()" id="myBtn"><i
            class="bi bi-caret-up-fill text-lg text-white"></i></button>
<script>
    let mybutton = document.getElementById("myBtn");
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

</script>

</body>
</html>