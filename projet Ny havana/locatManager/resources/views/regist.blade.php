<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>regist</title>
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
                        <h2>Welcome</h2>
                        <p>connectez vous ici</p>
                        <a class="btn" href="{{ route('login.create') }}">log in</a>
                    </div>
                </div>
                <div class="col-right">
                    <div class="login-form">
                        <h2>Admin register</h2>
                        @if ($errors->get('mail'))
                            @foreach ($errors->get('mail') as $message)
                                <li class="smal text-danger list-unstyled">{{$message}}</li>
                            @endforeach
                        @endif
                        <form method="POST" action="{{ route('regadmin.store') }}" class="mt-2">
                            @csrf
                            <p>
                                <label>nom<span>*</span></label>
                                <input type="text" placeholder="saisir votre nom" name="nom" required>
                            </p>
                            <p>
                                <label>Email<span>*</span></label>
                                <input type="email" placeholder="saisir une email existant" name="mail" required>
                            </p>
                            <p>
                                <label>contact<span>*</span></label>
                                <input type="number" placeholder="saisir votre contact" name="contact" required>
                            </p>
                            <p>
                                <label>mot de passe<span>*</span></label>
                                <input type="password" placeholder="creé votre mot de passe" name="password" required>
                            </p>
                            <p>
                                <input type="submit" value="creat account" />
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
