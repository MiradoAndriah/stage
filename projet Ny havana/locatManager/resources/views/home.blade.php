<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Home</title>

	<link rel="shortcut icon" href="{{url('assets/images/gt_favicon.png')}}">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="{{url('assets/css/bootstrap-theme.css')}}" media="screen" >
	<link rel="stylesheet" href="{{url('assets/css/main.css')}}">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand"  href="index.html"><img style="width:158px; height:100px;" src="assets/images/logo2.png" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					@guest				
						<li><a class="btn" href="{{ route('login.create') }}">SIGN IN / SIGN UP</a></li>
					@endguest
					@auth
						<li><a class="btn" href="{{ route('home.index') }}">Go to home</a></li>
					@endauth
						
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead text-dark" style="color: white; text-shadow: 2px 2px 5px rgba(0,0,0,0.7)">PROTÉGER VOTRE AVENIR, C’EST NOTRE PRIORITÉ</h1>
				<p class="tagline">Ny Havana Assurance – Votre partenaire de confiance pour sécuriser vos biens, votre famille et votre avenir.</p>
			</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
	<div class="container text-center">
		<br> <br>
		<h2 class="thin">Des solutions d’assurance simples, rapides et fiables</h2>
		<p class="text-muted">
			Chez Ny Havana Assurance, nous vous offrons des garanties adaptées à vos besoins : assurance santé, automobile, habitation, entreprise et plus encore.
Notre mission : vous accompagner au quotidien avec des services accessibles, transparents et flexibles.
		</p>
	</div>
	<!-- /Intro-->
		
	<!-- Highlights - jumbotron -->
	




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="{{url('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js')}}"></script>
	<script src="{{url('http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js')}}"></script>
	<script src="{{url('assets/js/headroom.min.js')}}"></script>
	<script src="{{url('assets/js/jQuery.headroom.min.js')}}"></script>
	<script src="{{url('assets/js/template.js')}}"></script>
</body>
</html>