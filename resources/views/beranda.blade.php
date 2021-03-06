<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Coding Test</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/dark-mode.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sisi-kiri.css') }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body class="bg-white text-center d-flex h-100">
  <div class="container-fluid d-flex p-3 mx-auto flex-column">
    <header class="mb-auto">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-2">
            <div class="container-fluid">
                <a class="nav-link" href="{{ route('landing') }}">
                <h5 class="text-dark mr-5 mt-1">Coding Test</h5>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
               
                <ul class="navbar-nav ml-auto">
                @guest
                            <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('all-program.beranda') }}">Home</a>
                            </li>
                            @if (Route::has('register'))
                            
                            @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('all-program.beranda') }}">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('detail-user.index') }}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="{{ route('program.index') }}">Gallery</a>
                            </li>
                            @endguest
                </ul>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                           
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                            
                            
                       
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-pink mr-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('detail-user.index') }}" role="button">
                                        profile <span class="caret"></span>
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="darkSwitch">
                        <label class="custom-control-label text-primary" for="darkSwitch"></label>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    @foreach ($programs as $program)
    <div class="container-fluid mt-3 mb-3 shadow p-5 fixed">
        <div class="row">
            <div class="col-7">
                <div class="gambar">
                <img src="{{ asset('storage/'. $program->photo) }}" class="img" alt="..." height="200" width="200" style="background-size: cover;">
                </div>

                
            </div>

            <div class="col-5 text-left">
                <div class="judul mb-3">
                    <h5 class="font-weight-bold pink">{{ $program->title}}</h5>
                </div>

                <div class="deskripsi mb-4">
                    <p>
                    {{ Str::limit($program->description, 210) }}
                        <a class="ml-3" href="{{ route('detail-post', $program->id)}}">
                            Show detail
                        </a>
                    </p>
                </div>

                <div class="sosmed">
                <a class="text-dark" href="{{ $program->user->instagram}}"> <i class="fa fa-instagram" style="font-size:24px; aria-hidden="true"></i> </a>
                
                <a class="ml-3 text-dark" href="{{ $program->user->facebook}}"><i class="fa fa-facebook" style="font-size:24px; aria-hidden="true"></i></a>
                <a class="ml-3 text-dark" href="{{ $program->user->twitter}}"><i class="fa fa-twitter" style="font-size:24px; aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    <div class="container-fluid mt-3 d-flex justify-content-center mb-3">
        <div class="row">

            <div class="col">            
                @foreach ($progs as $pro)
                <div class="card shadow mb-4 p-2 float-left mr-3" style="width: 500px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 text-left">
                                    <img src="{{ asset('storage/'. $pro->photo) }}" class="img" alt="..." height="155" width="155" style="background-size: cover;">
                                </div>

                                <div class="col text-left ml-3">
                                    <h5 class="mb-3 font-weight-bold pink">{{$pro->title}}</h5>
                                    <p class="text-justify">
                                    {{ Str::limit($pro->description, 90) }}
                                    <a class="" href="{{ route('detail-post', $pro->id)}}">
                                        Show detail
                                    </a>
                                    </p>
                                </div>
                            </div>
                            <hr class="bg-dark">

                            <div class="row">
                                <div class="col text-left">
                                <h6 class="font-weight-bold"><i class="fa fa-play-circle mr-2 text-danger" aria-hidden="true"></i> Categories</h6>
                                <p> {{$pro->hastag}}  {{$pro->subhastag}}</p>
                                </div>
                            </div>
                            
                        </div>
                </div>
                @endforeach

            </div>
            

        </div>
        
    </div>
    
    <div class="container-fluid d-flex justify-content-center">
    <div class="row">
        <div class="col-12">
            {{ $progs->links() }}
        </div>
    </div>
    </div>
    <div class="container-fluid mt-3 bg-light">
        <div class="row">
            <div class="col">
                <footer class="">
                     <p class="text mt-3"> Created &copy; 2020 by Saiful Bahri Irfanto</p>
                </footer>
            </div>
        </div>
    </div>
   
    <!-- You must load 'dark-mode-switch.js' at the foot of the page -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ asset('js/dark-mode-switch.min.js') }}"></script>
  </div>
</body>

</html>