<!doctype html>
<html lang="en">

<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--  Font Awesome for Bootstrap fonts and icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <!-- Material Design for Bootstrap CSS -->
        <link rel="stylesheet"
                href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
                integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX"
                crossorigin="anonymous">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        <link rel="stylesheet" href="{{ url('/css/style.css') }}">
        <title>MM-Coder</title>
</head>

<body>
        <!-- Start Nav -->
        <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand text-warning" href="{{url('/')}}">Blogging!</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="#">Articles</a>
                                </li>
                                <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                User
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Login</a>
                                                <a class="dropdown-item" href="#">Register</a>

                                                <a class="dropdown-item" href="#">Welcome User</a>
                                        </div>
                                </li>
                                @if (Auth::check())
                                <li class="nav-item ml-5">
                                    <a class="nav-link btn btn-sm  btn-warning" href="{{route('article.get.create')}}">
                                            <i class="fas fa-plus"></i>
                                            Create Article</a>
                                </li>
                                @endif
                        </ul>
                        <form class="form-inline my-2 my-lg-0" method="get" action={{url('/')}}>
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                        aria-label="Search" name="search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                </div>
        </nav>

        <!-- Start Header -->

        <div class="jumbotron jumbotron-fluid header">
                <div class="container">
                        <h1 class="text-white">MM-Coder Online Course</h1>
                        <h1 class="display-4 text-white">Welcome Com From Advance PHP Online Class</h1>
                        <p class="lead text-white">Hello Now We publish this course free.</p>
                        <br>
                        @if (Auth::check())
                        <h1 class="text-danger">Welcome {{auth()->user()->name}}</h1>
                        <a href="{{route('logout')}}" class="btn btn-lg btn-outline-danger">Logout</a>
                        @else
                        <a href="{{route('register')}}" class="btn btn-warning">Create Account</a>
                        <a href="{{route('login')}}" class="btn btn-outline-success">Login</a>
                        @endif
                </div>
        </div>

        <!-- Content -->
        <div class="container-fluid">
                <div class="row">
                        <div class="col-md-4 pr-3 pl-3">
                                <!-- Category List -->
                                <div class="card card-dark">
                                        <div class="card-header">
                                                <h4>All Category</h4>
                                        </div>

                                        <div class="card-body">
                                                <ul class="list-group">
                                                    @foreach ($category as $c)
                                                    <a href="{{url('category/'.$c->slug)}}" class="">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            {{$c->name}}
                                                        <span class="badge badge-primary badge-pill">{{$c->article_count}}</span>
                                                        </li>
                                                    </a>
                                                    @endforeach
                                                </ul>
                                        </div>

                                </div>
                                <hr>
                                <!-- Language List -->
                                <div class="card card-dark">
                                        <div class="card-header">
                                                <h4>All Languages</h4>
                                        </div>

                                        <div class="card-body">
                                                <ul class="list-group">
                                                    @foreach ($language as $l)
                                                        <a href="{{url('language/'.$l->slug)}}">
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                {{$l->name}}
                                                                <span class="badge badge-primary badge-pill">{{$c->article_count}}</span>
                                                        </li>
                                                        </a>
                                                    @endforeach
                                                </ul>
                                        </div>

                                </div>
                        </div>
                            @yield('content')
                           <!-- Optional JavaScript -->
                           <!-- jQuery first, then Popper.js, then Bootstrap JS -->

                           <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                           integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                           crossorigin="anonymous"></script>
                   <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
                           integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
                           crossorigin="anonymous"></script>
                           <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
                           <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
                           <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
                    @include('layout.inc.error')
                    @yield('script')
</body>

</html>
