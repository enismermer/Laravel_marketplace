@extends('auth.layout')

<title>Inscription - Connexion</title>

<style>
    .formulaires {
        display: flex;
    }

    .container .row {
        padding: 0.3em;
    }

    ul {
        margin: 0 65% 0 13em;
        font-weight: bold;
        border: 2px solid #D2D2D2;
        font-weight: bold;
    }
</style>
@section('content')
<div class="formulaires">
    <!-------------------- Formulaire d'inscription -------------------->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h1>{{ __('Inscription') }}</h1></div>

                    <div class="card-body">
                        <form method="post" action="{{ route('inscription') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('S\'inscrire') }}
                                    </button>
                                </div>
                            </div>
                            
                            @if(session('error-session'))
                            <div class="alert alert-danger">
                                {{ session('error-session') }}
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-------------------- Formulaire de connexion -------------------->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h1>{{ __('Connexion') }}</h1></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('connexion') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email-connexion') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email-connexion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password-connexion') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password-connexion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Se souvenir de moi') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Se connecter') }}
                                    </button>

                                    <!-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oublié ?') }}
                                        </a>
                                    @endif -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<ul>
    <li class="rule-text">Au moins 8 caractères</li>
    <li class="rule-text">Au moins 1 minuscule</li>
    <li class="rule-text">Au moins 1 majuscule</li>
    <li class="rule-text">Au moins 1 chiffre</li>
    <li class="rule-text">Au moins 1 caractère spécial</li>
</ul>


<!------------------------------------------------------------
                        JAVASCRIPT 
------------------------------------------------------------->
<script>
    // Je sélectionne le premier élément input#password qui provient du formulaire d'inscription
    const passwordInput = document.getElementById('password');
    // Je sélectionne tous les éléments ul>li.rule-text
    const ruleTexts = document.querySelectorAll('.rule-text');

    // J'applique un événement en sélectionnant le input (champ password)
    passwordInput.addEventListener('input', function() {
        // Je sélectionne la valeur du champ password
        const password = this.value;
        // Pour chaque règles ('.rule-text')
        ruleTexts.forEach((ruleText, index) => {
            const isSatisfied = checkRuleSatisfaction(index, password);
            // Si l'une des règles s'applique, elle se change en vert sinon elle redevient à la normale
            ruleText.style.color = isSatisfied ? '#77D743' : '';
        });
    });

    function checkRuleSatisfaction(ruleIndex, password) {
        switch (ruleIndex) {
            case 0: // Au moins 8 caractères 
                return /^.{8,}$/.test(password);

            case 1: // Au moins 1 minuscule
                return /[a-z]/.test(password);

            case 2: // Au moins 1 majuscule
                return /[A-Z]/.test(password);

            case 3: // Au moins 1 chiffre
                return /[0-9]/.test(password);

            case 4: // Au moins 1 caractère spécial
                return /[@$!%*?&]/.test(password);

            default:
                return false;
        }
    }
</script>


@endsection
