<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vandor Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="{{asset('/css/fontawesome.min.css')}}">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{asset('/css/templatemo-style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="{{route ('vendor.dashboard') }}">
                    <h1 class="tm-site-title mb-0">Vendor Admin</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route ('vendor.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>
                                Orders
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('vendor.products')}}">
                                <i class="fas fa-shopping-cart"></i>
                                Products
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('vendor.profile')}}">
                                <i class="far fa-user"></i>
                                Profile
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <li class="menu-item"><a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();"><button class="btn" style="background-color: #f5a613; color:#fff">Logout</button></a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>