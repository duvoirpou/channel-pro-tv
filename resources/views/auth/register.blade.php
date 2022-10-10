<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link rel='stylesheet' href='{{ asset('bootstrap-3.3.7-dist/css/bootstrap.min.css') }}' type='text/css' media='all' />
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-4 col-md-offset-4">
                <h4>Inscription utilisateur</h4>
                <hr>
                <form action="{{ route('auth.create') }}" method="POST">
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
                      <label for="nom">Nom</label>
                      <input type="text" name="nom" id="nom" class="form-control" placeholder="" aria-describedby="helpNom" value="{{ old('nom') }}">
                      <small id="helpNom" class="text-danger">@error("nom")
                        {{ $message }}
                      @enderror</small>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpEmail" value="{{ old('email') }}">
                      <small id="helpEmail" class="text-danger">@error("email")
                        {{ $message }}
                      @enderror</small>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpMdp">
                      <small id="helpMdp" class="text-danger">@error("password")
                        {{ $message }}
                      @enderror</small><br>
                      <input type="checkbox" name="" onclick="myfunction()" id="viewpsw">
                        <label for="viewpsw">Afficher le mot de passe</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                    </div>
                    <br>
                    <a href="{{ route('admin.login') }}">J'ai déjà un compte ! </a>
                </form>
            </div>
        </div>
    </div>

    <script src='{{ asset('js/jquery.js') }}'></script>
    <script src='{{ asset('bootstrap-3.3.7-dist/js/bootstrap.min.js') }}'></script>
    <script>
        function myfunction(){
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
