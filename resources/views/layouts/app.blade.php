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
</head>

<body class="bg-success bg-opacity-25">

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