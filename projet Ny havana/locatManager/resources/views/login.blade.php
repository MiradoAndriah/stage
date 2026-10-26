<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Login Form Template" name="keywords">
        <meta content="Login Form Template" name="description">
        <link href="{{url('/xcss/app.css')}}" rel="stylesheet">
  <!-- Bootstrap CSS & JS -->
        <link rel="stylesheet" href="{{url('/xcss/bootstrap.min.css')}}">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Stylesheet -->
        <link href="{{url('css/style2.css')}}" rel="stylesheet">
    </head>
    <body class="login-bg">
        <div class="wrapper login-1">
            <div class="container">
                <div class="col-left">
                    <div class="login-text">
                        <h2>Welcome Back</h2>
                        <p>Crée votre compte ici</p>
                        <a class="btn" href="{{ route('regadmin.create') }}">Sign Up</a>
                    </div>
                </div>
                <div class="col-right">
                    <div class="login-form">
                        <h2>Login Admin</h2>
                        @if ($errors->get('mail'))
                            @foreach ($errors->get('mail') as $message)
                                <li class="text-danger list-unstyled small">{{$message}}</li>
                            @endforeach
                        @endif
                        <form action="{{ route('login.store') }}" method="POST" class="mt-2">
                            @csrf
                            <div>
                                <label>Email<span>*</span></label>
                                <input type="text"  name="mail" required value="{{ old('mail') }}">
                                
                            </div>
                            
                            <div class="mt-2">
                                <label>mot de passe<span>*</span></label>
                                <input type="password" name="password" required>
                                
                            </div>

                            <p class="mt-2">
                                <input type="submit" value="Sing In" />
                            </p>
                            <p>
                                <a href="">mot de passe oublié?</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
