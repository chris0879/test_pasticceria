
<!DOCTYPE html>
<html lang="it">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="{{ asset('admin_template/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <!-- <link href="css/simple-sidebar.css" rel="stylesheet"> -->
  <link href="{{ asset('admin_template/css/simple-sidebar.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/a7f87102b2.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Pasticceria del Corso </div>
      <div class="list-group list-group-flush">
      <a href="{{ route('admin.logout') }}"><i class="zmdi zmdi-power"></i>Logout</a>

      <a href="{{route('admin.settings')}}" class="list-group-item list-group-item-action bg-light">Settings</a>
      <a href="{{route('admin.dolci.index')}}" class="list-group-item list-group-item-action bg-light">Dolci</a>
      <a href="{{route('admin.ingredienti.index')}}" class="list-group-item list-group-item-action bg-light">Ingredienti</a>


      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('home')}}">Vai alla home del sito --><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
             
            </li>
           
          </ul>
        </div>
      </nav>

      <div class="container-fluid">

        <!--ERRORI VALIDAZIONI -->
          @foreach ($errors->all() as $message)
            <div class="alert alert-danger" role="alert">
              {{ $message}}
            </div>
          @endforeach
          @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
          @endif
        <!--/ERRORI VALIDAZIONI-->
        @yield('content')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <script src="{{ asset('admin_template/js/jquery.min.js') }}"></script>


  <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="{{ asset('admin_template/js/bootstrap.bundle.min.js') }}" ></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
@stack('scripts')
</body>

</html>
