@extends('app')

@section('content')
    <div class="row" style="margin-top: 45px">
        <div class="col-md-4 col-md-offset-4">
            <h4>Inscription</h4>
            <hr>
            <form action="{{ route('utilisateur.create') }}" method="POST"> {{-- class="bloc-container" --}}
                @csrf

                <div class='results'>
                    @if (Session::get('success'))
                        <div class="alert alert-success" style="color: gray">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::get('fail'))
                        <div class="alert alert-danger" style="color: gray">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="" aria-describedby="helpNom"
                        value="{{ old('nom') }}">
                    <small id="helpNom" class="text-danger">
                        @error('nom')
                            {{ $message }}
                        @enderror
                    </small>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" placeholder="" aria-describedby="helpprenom"
                        value="{{ old('prenom') }}">
                    <small id="helpprenom" class="text-danger">
                        @error('prenom')
                            {{ $message }}
                        @enderror
                    </small>
                </div>
                <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder=""
                        aria-describedby="helppseudo" value="{{ old('pseudo') }}">
                    <small id="helppseudo" class="text-danger">
                        @error('pseudo')
                            {{ $message }}
                        @enderror
                    </small>
                </div>
                <div class="form-group">
                    <label for="sexe">sexe</label>
                    <select name="sexe" class="form-control" id="">
                        <option value=""></option>
                        <option value="M" {{ old('sexe') == 'M' ? 'selected' : '' }}>M</option>
                        <option value="F" {{ old('sexe') == 'F' ? 'selected' : '' }}>F</option>
                    </select>
                    <small id="helpsexe" class="text-danger">
                        @error('sexe')
                            {{ $message }}
                        @enderror
                    </small>
                </div>
                <div class="form-group" hidden>
                    <div class="form-group">
                        <label for="tel">Telephone</label>
                        <input type="tel" name="tel" id="" class="form-control" placeholder="" aria-describedby="tel"
                            value="{{ old('tel') }}">
                        {{-- <small class="text-danger">
                            @error('tel')
                                {{ $message }}
                            @enderror
                        </small> --}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder=""
                        aria-describedby="helpEmail" value="{{ old('email') }}">
                    <small id="helpEmail" class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </small>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder=""
                        aria-describedby="helpMdp">
                    <small id="helpMdp" class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </small><br>
                    <input type="checkbox" name="" onclick="myfunction()" id="viewpsw">
                    <label for="viewpsw">Afficher le mot de passe</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>
                <br>
                <a href="{{ route('connexion') }}">J'ai déjà un compte ! </a>
            </form>
        </div>
    </div>
    <br>
@endsection
