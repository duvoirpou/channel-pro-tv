<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel='stylesheet' href='{{ asset('bootstrap-3.3.7-dist/css/bootstrap.min.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('css/font-awesome.min.css') }}' type='text/css' media='all' />
    <link rel="stylesheet" href="{{ asset('uicons-regular-rounded/css/uicons-regular-rounded.css') }}" type='text/css'>
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-4 col-md-offset-4">
                <h4>Connexion utilisateur</h4>
                <hr>
                <form action="{{ route('auth.check') }}" method="POST">
                    @csrf

                    <div class='results'>
                        @if (Session::get('success'))

                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>

                        @endif

                        @if (Session::get('fail'))

                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>

                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">@</span>
                            <input type="email" name="email" id="email" class="form-control" placeholder=""
                                aria-describedby="sizing-addon2" value="{{ old('email') }}">
                        </div>
                        <small id="helpEmail" class="text-danger">@error('email')
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
                        <label for="password">Password</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="fi-rr-key"></i>
                            </span>
                            <input type="password" name="password" id="password" class="form-control" placeholder=""
                                aria-describedby="sizing-addon2">

                        </div>
                        <small id="helpPassword" class="text-danger">@error('password')
                                {{ $message }}
                            @enderror</small><br>
                        <input type="checkbox" name="" onclick="myfunction()" id="viewpsw">
                        <label for="viewpsw">Afficher le mot de passe</label>
                        {{-- <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder=""
                            aria-describedby="helpMdp">
                        <small id="helpMdp" class="text-danger">@error('password')
                                {{ $message }}
                            @enderror</small><br>
                        <input type="checkbox" name="" onclick="myfunction()" id="viewpsw">
                        <label for="viewpsw">Afficher le mot de passe</label> --}}
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                    </div>
                    <br>
                    <a href="{{ route('admin.register') }}">Créer un nouveau compte maintenant ! </a>
                </form>
            </div>
        </div>
    </div>

    <script src='{{ asset('js/jquery.js') }}'></script>
    <script src='{{ asset('bootstrap-3.3.7-dist/js/bootstrap.min.js') }}'></script>
    <script>
        function myfunction() {
            var x = document.getElementById('password');
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

        }
    </script>
</body>

</html>
