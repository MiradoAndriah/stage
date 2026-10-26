<!DOCTYPE html>
<html lang="en">

<head>
  <link href="{{url('/xcss/app.css')}}" rel="stylesheet">
  <!-- Bootstrap CSS & JS -->
  <link rel="stylesheet" href="{{url('/xcss/bootstrap.min.css')}}">

  <!-- Bootstrap CSS & JS Online
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
      -->
  <script src="{{url('/jsx/bootstrap.bundle.min.js')}}"></script>
  <!-- END Bootstrap -->
  <link rel="stylesheet" href="{{url('/xcss/style.css')}}">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>locataire management </title>
</head>

<body>
  <!--  Header -->
  <div class="container-fluid p-0">
    <img src="{{url('/img/ny-havana-logo.png')}}" class="resp" style="height: 220px;">
  </div>
  <!-- End Header -->

  <!--  Navbar -->
  <!-- https://getbootstrap.com/docs/5.0/components/navbar/  -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">

            <a class="nav-link text-white" aria-current="page" href="{{ url('/home')}}">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('home.create') }}">add locat</a>
          </li>

          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('batiment.create') }}">add buiding</a>
          </li>

           <li class="nav-item">
            <a class="nav-link" href="{{ route('appart.create') }}">add apparts</a>
          </li>

          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('occuped.create') }}">add contract</a>
          </li>

          <li class="nav-item">
            <a class='border nav-link bg-danger rounded-2 ms-3 text-white' href="{{ route('payment.index') }}">PAYMENT</a>
          </li>
    
        </ul>

        @auth('web')
        <div class="text-white me-3 border rounded-3 p-1 bg-success">
          <span>logged in as </span>{{ (Illuminate\Support\Facades\Auth::guard('web')->user()->nom) }}
        </div>
        <form class="d-flex" action="{{ route('detruire') }}" method="POST">
           @csrf 
          <button class="btn btn-outline-success" type="submit" onclick="return confirm('log out?')">log out</button>
        </form>
        
        @endauth

      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Sidenav & Body & Sidbar  -->
  <div class="container" style="margin-top: 20px; margin-left:0px;">
    <div class="row">

      <!-- 4.1)  Sidenav avec 2 colonnes -->
      <div class="col-2" style="margin-right:20px; margin-bottom:5px;">
        <!-- Mettez ici le contenu de votre sidenav: des liens, des boutons de commandes...  -->


        <div class="sidebar">
          <header>Main Menu</header>
          <a href="{{ route('home.index') }}">
            <i class="fas fa-qrcode"></i>
            <span>List of lacataire</span>
          </a>
          <a href="{{ route('batiment.index') }}">
            <i class="fas fa-link"></i>
            <span>Buildings</span>
          </a>
          <a href="{{ route('appart.index') }}">
            <i class="fas fa-stream"></i>
            <span>Appartements</span>
          </a>
          <a href="{{ route('occuped.index') }}">
            <i class="fas fa-calendar"></i>
            <span>Contract</span>
          </a>
          <a href="{{ route('facture.index') }}">
            <i class="far fa-question-circle"></i>
            <span>facture</span>
          </a>
        </div>


      </div>
      <!-- End Sidenav-->


      <!-- BODY avec 9 colonnes-->
      <div class="col-9">
        <div class="card" style="width: 100%; margin-left:75px; margin-right:0px;">
          <div class="card-header bg-primary" style="color:white; font-size: 18px; font-weight:bold;" style="width: 100%;">
            gestion des locataires !
          </div>
          <div class="card-body">

            <div class="container">
              @yield('content')

            </div>

            <p class="card-text">

            </p>
          </div>
        </div>
      </div>
      <!-- End Body-->



    </div>
  </div>
  <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Form -->
      <section class="">
        <form action="">
          <!--Grid row-->
          <div class="row d-flex justify-content-center">
            <!--Grid column-->
            <div class="col-auto">
              <p class="pt-2">
                <strong>Sign up for our newsletter</strong>
              </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-5 col-12">
              <!-- Email input -->
              <div class="form-outline form-white mb-4">
                <input type="email" id="form5Example2" class="form-control" />
                <label class="form-label" for="form5Example2">Email address</label>
              </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-auto">
              <!-- Submit button -->
              <button type="submit" class="btn btn-outline-light mb-4">
                Subscribe
              </button>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </form>
      </section>
      <!-- Section: Form -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>

</body>

</html>