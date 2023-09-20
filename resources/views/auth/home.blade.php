@extends('auth.layout')

@if (isset($user))
    <title>Bienvenue {{ $user->name }}</title>
@else
    <title>Bienvenue ???</title>
@endif

<style>
    .welcome {
        text-align: center;
        margin-top: 1em;
    }

    ul li a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
    }

    ul li {
        padding: 1em;
    }

    ul {
        list-style-type: none;
        display: flex;
        padding-right: 2em;
    }
</style>

@section('content')

@if ($user->name == "Mr. Jeux-Vidéo")
<div style="background-image: linear-gradient(to right, purple , red, orange);">
    <ul>
        <!-- Afficher le lien Déconnexion lorsque l'utilisateur est connecté -->
        @auth
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            <!-- j'inclus le champ de jeton CSRF masqué dans le formulaire afin que le middleware de protection CSRF puisse valider la demande -->
            @csrf
        </form>
        @endauth
        
        <!-- Afficher le lien Inscription/Connexion lorsque l'utilisateur n'est pas connecté -->
        @guest
            <li><a href="{{ route('inscription-connexion') }}">Inscription/Connexion</a></li>
            @endguest
        </ul>
    </div>
@else
<div class="collapse navbar-collapse d-flex justify-content-end bg-primary">
    <ul>
        <!-- Afficher le lien Déconnexion lorsque l'utilisateur est connecté -->
        @auth
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            <!-- j'inclus le champ de jeton CSRF masqué dans le formulaire afin que le middleware de protection CSRF puisse valider la demande -->
            @csrf
        </form>
        @endauth
        
        <!-- Afficher le lien Inscription/Connexion lorsque l'utilisateur n'est pas connecté -->
        @guest
            <li><a href="{{ route('inscription-connexion') }}">Inscription/Connexion</a></li>
            @endguest
        </ul>
    </div>
    
@endif
    
    <!--------------------------------------------- 
Si l'utilisateur $user est connecté, 
    alors on affiche "Bienvenue $user->name",
        sinon "Bienvenue ???" 
---------------------------------------------->
<div class="welcome">
    @if (isset($user))
        <h1>Bienvenue {{ $user->name }}</h1>
        <h3>n°{{ $user->id }}</h3>
    @else
        <h1>Bienvenue ???</h1>
        <h3>n° ???</h3>
    @endif

    @if ($user->name == "Mr. Jeux-Vidéo")
        <h5>Je suis <strong>quelqu'un</strong> de passionné pour les <strong style="color:#FF07BD"><u>jeux vidéo</u></strong>.<br> De plus, je suis le gamer <strong>le plus expérimenté</strong>, autrement dit le <strong style="color:#9C44B9;"><u>mastergamer</u></strong>.</h5>
        <h5><strong>Quiconque</strong> ose me défier, je <strong>promets</strong> à mes challengers <strong style="color:red;">une défaite <u>cuisante</u> et <u>humiliante</u></strong>.</h5>
    @endif
</div>

@endsection