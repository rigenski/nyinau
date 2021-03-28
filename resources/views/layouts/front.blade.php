<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NYINAU</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('/assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            }
        .wrapper {
            min-height: 100%;
            margin-bottom: -50px;
        }
        .footer,
        .push {
            height: 50px;
        }
    </style>
</head>

<body id="page-top" class="bg-light">
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand text-primary font-weight-bold" href="/">Nyinau</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</span></a>
                            </li>
                            @if(auth()->user()->role == 'siswa')
                            <li class="nav-item">
                                <a class="nav-link" href="/schedule">Jadwal Pelajaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/student">Daftar Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/announcement">Pengumuman</a>
                            </li>
                            @endif
                            @if(auth()->user()->role == "guru")
                            <li class="nav-item">
                                <a class="nav-link" href="/announcement">Pengumuman</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/student">Daftar Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/teacher">Daftar Guru</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/schedule">Jadwal Pelajaran</a>
                            </li>
                            @endif
                            <li class="d-none d-md-block">
                                <div class="mt-2 mx-2">|</div>
                            </li>

                            @if(auth()->user())
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{auth()->user()->name}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="/profile">Profile</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item text-danger" href="/logout">Logout</a>
                                </div>
                              </li>
                              @else
                            <li class="nav-item active">
                                <a class="nav-link btn btn-primary rounded-pill px-4 text-white ml-4" href="/login">Login</span></a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
              </nav>
        </header>
        <main class="bg-light">
            @yield('content')
        </main>
        <div class="push"></div>
    </div>
        <footer class="footer">
            <div class="w-100 bg-primary">
                <div class="container py-4 d-flex justify-content-between">
                    <h6 class="text-white m-0">Copyright - {{ date('Y')}} </h6>
                    <p class="text-light m-0">Created by <b>Ngobar RPL</b></p>
                </div>
            </div>
        </footer>
 


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('/assets/js/sb-admin-2.min.js')}}"></script>

</body>

</html>