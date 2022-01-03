<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flexslider.css') }}">

	<script src="{{asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
</head>

<body class="inner-page about-us ">
	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
								<li class="menu-item">
									<a title="Hotline: (+123) 456 789" href="#"><span class="icon label-before fa fa-mobile"></span>Hotline: 0123456789</a>
								</li>
							</ul>
						</div>
						<div class="topbar-menu right-menu">
							<ul>


								@if (Route::has('login'))
								@auth
								<li class="menu-item menu-item-has-children parent">
									<a title="My Account" href="/">My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu curency">
										<li class="menu-item"><a href="{{route ('myOrder') }}">Orders</a></li>
										<li class="menu-item"><a href="#">Address</a></li>
										<li class="menu-item"><a href="{{url('Account')}}">Account Details</a></li>
										<li class="menu-item"><a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                           				 document.getElementById('logout-form').submit();">Logout</a></li>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</ul>
								</li>
								@else
								<li class="menu-item"><a title="Register or Login" href="login">Login</a></li>
								@if (Route::has('register'))
								<li class="menu-item"><a title="Register or Login" href="register">Register</a></li>
								@endif
								@endauth
								@endif
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="{{route ('home') }}" class="link-to-home"><img src="https://mybazar.online/mybazar_online.png" alt="mercado"></a>
						</div>

						<div class="wrap-search center-section">
							<div class="wrap-search-form">
								<form action="{{route ('search') }}" id="form-search-top" name="form-search-top">
									<input type="text" name="search" value="" placeholder="Search here...">
									<button form="form-search-top" type="submit"><i class="fa fa-search"></i></button>
									<div class="wrap-list-cate">
										<input type="hidden" name="product-cate" value="0" id="product-cate">
										<a href="#" class="link-control">All Category</a>
										<ul class="list-cate">
											<li class="level-0">All Category</li>
											<li class="level-1">-Electronics</li>
											<li class="level-2">Batteries & Chargens</li>
											<li class="level-2">Headphone & Headsets</li>
											<li class="level-2">Mp3 Player & Acessories</li>
											<li class="level-1">-Smartphone & Table</li>
											<li class="level-2">Batteries & Chargens</li>
											<li class="level-2">Mp3 Player & Headphones</li>
											<li class="level-2">Table & Accessories</li>
											<li class="level-1">-Electronics</li>
											<li class="level-2">Batteries & Chargens</li>
											<li class="level-2">Headphone & Headsets</li>
											<li class="level-2">Mp3 Player & Acessories</li>
											<li class="level-1">-Smartphone & Table</li>
											<li class="level-2">Batteries & Chargens</li>
											<li class="level-2">Mp3 Player & Headphones</li>
											<li class="level-2">Table & Accessories</li>
										</ul>
									</div>
								</form>
							</div>
						</div>

						<div class="wrap-icon right-section">
							<div class="wrap-icon-section wishlist">
								<a href="#" class="link-direction">
									<i class="fa fa-heart" aria-hidden="true"></i>
									<div class="left-info">
										<span class="index">0 item</span>
										<span class="title">Wishlist</span>
									</div>
								</a>
							</div>
							<div class="wrap-icon-section minicart">
								<a href="#" class="link-direction">
									<i class="fa fa-shopping-basket" aria-hidden="true"></i>
									<div class="left-info">
										<span class="index">4 items</span>
										<span class="title">CART</span>
									</div>
								</a>
							</div>
							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>

					</div>
				</div>

				<div class="nav-section header-sticky">

					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
								<li class="menu-item home-icon">
									<a href="{{route ('home') }}" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								<li class="menu-item">
									<a href="{{route ('about') }}" class="link-term mercado-item-title">About Us</a>
								</li>
								<li class="menu-item">
									<a href="{{route ('shop') }}" class="link-term mercado-item-title">Shop</a>
								</li>
								<li class="menu-item">
									<a href="cart" class="link-term mercado-item-title">Cart</a>
								</li>
								<li class="menu-item">
									<a href="{{route ('contact') }}" class="link-term mercado-item-title">Contact Us</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>