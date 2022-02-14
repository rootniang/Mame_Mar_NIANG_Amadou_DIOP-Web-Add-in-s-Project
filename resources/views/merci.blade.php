<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Merienda:wght@700&family=Sacramento&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Mon propre style -->
        <link rel="stylesheet" href="{{ asset('css/monStyle.css') }}">
    </head>
    <body class="merci_body">
        <div class="merci_container">
            <div class="logo_container_merci">
                <img src="{{ asset('images/inspirations/logo3.png') }}" alt="">
            </div>
            <h1>Jërëjëf ci waxtaan wi.
            </h1>
            <span class="subtext">Amoon na solo lool</span>
            <a href="{{Route("home")}}">
                <button><i class="fa  fa-home"></i> Revenir à l'accueil</button>
            </a>
        </div>
    </body>
</html>
