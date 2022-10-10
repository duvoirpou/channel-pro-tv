@extends('app')

@section('content')
    <div id="content" class="site-content">
        <div id="primary" class="content-area column full">
            <main id="main" class="site-main">
                <div class="row" style="margin-top: 45px">
                    <div class="col-md-4 col-md-offset-4">
                        <h4>Connexion</h4>
                        <hr>
                        <form class="" action="{{ route('utilisateur.check') }}" method="POST">
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
                                <label for="identifiant">Identifiant</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    <input type="text" name="identifiant" id="identifiant" class="form-control" placeholder="pseudo ou email"
                                        aria-describedby="sizing-addon2" value="{{ old('identifiant') }}">
                                </div>
                                <small id="helpidentifiant" class="text-danger">@error('identifiant')
                                        {{ $message }}
                                    @enderror</small>
                                {{-- <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder=""
                                    aria-describedby="helpEmail" value="{{ old('email') }}">
                                <small id="helpEmail" class="text-danger">@error('email')
                                        {{ $message }}
                                    @enderror</small> --}}
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">
                                        {{-- <i class="fi-rr-key"></i> --}}
                                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                    </span>
                                    <input type="password" name="password" id="password" class="form-control" placeholder=""
                                        aria-describedby="sizing-addon2" value="{{ old('email') }}">

                                </div>
                                <small id="helpPassword" class="text-danger">@error('password')
                                        {{ $message }}
                                    @enderror</small><br>
                                <input type="checkbox" name="" onclick="myfunction()" id="viewpsw">
                                <label for="viewpsw">Afficher le mot de passe</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                            </div>
                            <br>
                            <a href="{{ route('inscription') }}">Créer un nouveau compte maintenant ! </a>
                        </form>
                    </div>
                </div>
                <br>
            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->
    </div>
    <!-- #content -->
@endsection
