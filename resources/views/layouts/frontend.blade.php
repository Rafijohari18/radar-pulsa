<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>@yield('title')</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<meta name="description" content="Agen Pulsa All Operator Bandung">
    <meta name="keywords" content="radar,Agen Pulsa All Operator,PPOB Murah,Voucher Game Online, Token PlN">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://radar.com/">
    <meta property="og:title" content="Radar : Situs Agen Pulsa Murah">
    <meta property="og:description" content="">
    <meta property="og:image" content="{{ asset('asset/temp_frontend/images/favicon.png') }}">


	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/temp_frontend/images/favicon.png') }}">

	<!-- CSS
	================================================== -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ asset('asset/temp_frontend/css/bootstrap.min.css')}}">
	<!-- Template styles-->
	<link rel="stylesheet" href="{{ asset('asset/temp_frontend/css/style.css')}}">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="{{ asset('asset/temp_frontend/css/responsive.css')}}">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="{{ asset('asset/temp_frontend/css/animate.css')}}">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{ asset('asset/temp_frontend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{ asset('asset/temp_frontend/css/owl.theme.default.min.css')}}">
	<!-- Colorbox -->
	<link rel="stylesheet" href="{{ asset('asset/temp_frontend/css/colorbox.css')}}">

	<style>
		.scrollwa {
			background-color: green;
			border-radius: 100%;
			bottom: 120px;
			color: #ffffff;
			font-size: 24px;
			height: 40px;
			line-height: 40px;
			position: fixed;
			right: 40px;
			text-align: center;
			width: 40px;
			z-index: 99;
		}
		.scrolltele{
			background-color: #33ABDF;
			border-radius: 100%;
			bottom: 70px;
			color: #ffffff;
			font-size: 24px;
			height: 40px;
			line-height: 40px;
			position: fixed;
			right: 40px;
			text-align: center;
			width: 40px;
			z-index: 99;

		}
	</style>

  @yield('css')

</head>

<body>

	<div class="body-inner">

		<div id="top-bar" class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
						<ul class="top-info">
							<li><i class="fa fa-map-marker">&nbsp;</i>
								<p class="info-text">{{ $alamat->value }}</p>
							</li>
						</ul>
					</div>
					<!--/ Top info end -->

					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top-social text-right">
						<ul class="unstyled">
							<li>
								<a title="Facebook" href="{{ $fb->value }}">
									<span class="social-icon"><i class="fa fa-facebook"></i></span>
								</a>
								<a title="Twitter" href="{{ $tw->value }}">
									<span class="social-icon"><i class="fa fa-twitter"></i></span>
								</a>
								<a title="Instagram" href="{{ $ig->value }}">
									<span class="social-icon"><i class="fa fa-instagram"></i></span>
								</a>
								
							</li>
						</ul>
					</div>
					<!--/ Top social end -->
				</div>
				<!--/ Content row end -->
			</div>
			<!--/ Container end -->
		</div>
		<!--/ Topbar end -->

		<!-- Header start -->
		<header id="header" class="header-two">
			<div class="container">
				<div class="row">
					<div class="navbar-header">
						<div class="logo">
							<a href="{{ url('/') }}">
								<img src="{{ asset($logo['value']) }}" alt="" style="width:170px;height:auto;">
							</a>
						</div><!-- logo end -->
					</div><!-- Navbar header end -->

					<nav class="site-navigation navigation pull-right">
						<div class="site-nav-inner">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<div class="collapse navbar-collapse navbar-responsive-collapse">
								<ul class="nav navbar-nav">
									<li><a href="{{ url('/') }}">Home</a></li>

									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaksi <i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="{{ route('format.transaksi') }}">Format Transaksi</a></li>
										</ul>
									</li>
									<li><a href="{{ route('cara.pendaftaran') }}">Cara Pendaftaran</a></li>
									<li><a href="{{ route('produk') }}">Produk</a></li>
									<li><a href="{{ route('kontak') }}">Kontak</a></li>


									
								
								</ul>
								<!--/ Nav ul end -->
							</div>
							<!--/ Collapse end -->

						</div><!-- Site Navbar inner end -->

					</nav>
					<!--/ Navigation end -->

				</div><!-- Row end -->
			</div><!-- Container end -->
		</header>
		<!--/ Header end -->

    @php
    $segment1 = Request::segment(1);
    $segment2 = Request::segment(2);
    $segment3 = Request::segment(3);
    $segment4 = Request::segment(4);
  @endphp



  @yield('content')	


	<footer id="footer" class="footer bg-overlay">
			<div class="footer-main">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-12 footer-widget footer-about">
							<h3 class="widget-title">Tentang Kami</h3>
							<img class="footer-logo" src="{{ asset($logo['value']) }}" style="width:170px;heigth:auto;" />
							<p>{{ $alamat->value }} </p>
							<!-- <div class="footer-social">
								<ul>
									<li><a href="https://facebook.com/themefisher"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://twitter.com/themefisher"><i class="fa fa-twitter"></i></a></li>
									<li><a href="https://instagram.com/themefisher"><i class="fa fa-instagram"></i></a></li>
									<li><a href="https://github.com/themefisher"><i class="fa fa-github"></i></a></li>
								</ul>
							</div> -->
							<p><b>Phone :</b>{{ $no_hp->value }}</p>
							<p><b>Email : </b>{{ $email->value }}</p>
						</div><!-- Col end -->

						<div class="col-md-4 col-sm-12 footer-widget">
							<h3 class="widget-title">{{ $title_rekening->name }}</h3>
							<div class="working-hours">
								 @foreach($rekening as $rek)
								 <ul class="list-unstyled">
								 	<li><img class="footer-logo" src="{{ asset($rek['cover']) }}" style="width:80px;heigth:auto;" /></li>
								 	<li><span>{{ strip_tags($rek['content']) }} </span></li>
								 	<li><span>{{ $rek['title']}}</span> </span></li>
								 </ul>
								
								@endforeach
							</div>
						</div><!-- Col end -->

						<div class="col-md-4 col-sm-12 footer-widget">
							<h3 class="widget-title">{{ $title_no_center['title'] }}</h3>
							
							@foreach($tipe_no_center as $tipe) 

							<h5 style="color:white">{{ $tipe->pageLang[0]->title  }}</h5>

							<ul class="list-arrow">
								 @foreach($tipe->parentNo($tipe['id']) as $parent_hp)
								<li><a href="">{{ $parent_hp->pageLang[0]->title }}</a></li>
								 @endforeach
							</ul>

							@endforeach
						
							
						</div><!-- Col end -->


					</div><!-- Row end -->
				</div><!-- Container end -->
			</div><!-- Footer main end -->

			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="copyright-info">
								<span>© 2020 - Situs Server Pulsa Murah Bandung - Radar Pulsa</span>
							</div>
						</div>

						<!-- <div class="col-xs-12 col-sm-6">
							<div class="footer-menu">
								<ul class="nav unstyled">
									<li><a href="about.html">About</a></li>
									<li><a href="team.html">Our people</a></li>
									<li><a href="faq.html">Faq</a></li>
									<li><a href="news-left-sidebar.html">Blog</a></li>
									<li><a href="pricing.html">Pricing</a></li>
								</ul>
							</div>
						</div> -->
					</div><!-- Row end -->

					<div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix">
						<button class="btn btn-primary" title="Back to Top">
							<i class="fa fa-angle-double-up"></i>
						</button>
					</div>

				</div><!-- Container end -->
			</div><!-- Copyright end -->

		</footer><!-- Footer end -->

		<a href="https://api.whatsapp.com/send?phone=6282232019067&text=Hallo!%20Saya%20ingin%20mengetahui%20informasi%20lebih%20lanjut" class="scrollwa"><i class="fa fa-whatsapp"></i></a>
		<a href="https://t.me/RadarPulsa" class="scrolltele"><i class="fa fa-telegram"></i></a>


		<!-- Javascript Files
	================================================== -->

		<!-- initialize jQuery Library -->
		<script type="text/javascript" src="{{ asset('asset/temp_frontend/js/jquery.js')}}"></script>
		<!-- Bootstrap jQuery -->
		<script type="text/javascript" src="{{ asset('asset/temp_frontend/js/bootstrap.min.js')}}"></script>
		<!-- Owl Carousel -->
		<script type="text/javascript" src="{{ asset('asset/temp_frontend/js/owl.carousel.min.js')}}"></script>
		<!-- Color box -->
		<script type="text/javascript" src="{{ asset('asset/temp_frontend/js/jquery.colorbox.js')}}"></script>
		<!-- Isotope -->
		<script type="text/javascript" src="{{ asset('asset/temp_frontend/js/isotope.js')}}"></script>
		<script type="text/javascript" src="{{ asset('asset/temp_frontend/js/ini.isotope.js')}}"></script>


    <!-- Google Map API Key-->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&amp;libraries=places"></script>
		<!-- Google Map Plugin-->
		<script type="text/javascript" src="{{ asset('asset/temp_frontend/js/gmap3.js')}}"></script>
 
	 <!-- Template custom -->
	 <script type="text/javascript" src="{{ asset('asset/temp_frontend/js/custom.js')}}"></script>
   @yield('js')
	</div><!-- Body inner end -->
</body>

</html>