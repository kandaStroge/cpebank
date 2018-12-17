<!DOCTYPE html>
<html lang="en">
<head>
<title>{{$title}}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="HostSpace template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/animate.css">
<link href="/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/styles/about.css">
<link rel="stylesheet" type="text/css" href="/styles/about_responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header trans_400">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<div class="logo"><a href="#">CPE<span>Bank</span></a></div>
						<nav class="main_nav ml-auto mr-auto">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li><a href="index.html"></a></li>
								<li class="active"><a href="showbalance.html">show balance</a></li>
								<li><a href="/customer/promotion">โปรโมชั่น/แนะนำบริการ</a></li>
								<li><a href="showค้างจ่าย.html">show ค้างจ่าย</a></li>
								<li><a href="/customer/sendIssue">ส่งปัญหา/คำร้องขอ</a></li>
							</ul>
						</nav>
						<div class="log_reg">
								<div class="log_reg_content d-flex flex-row align-items-center justify-content-start">
									<div class="login log_reg_text"><a href="index.html">Logout</a></div>
									
								</div>
							</div>
						
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->
	
	<div class="menu_overlay trans_400"></div>
	<div class="menu trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		
		<nav class="menu_nav">
			<ul>
				<li><a href="index.html">home</a></li>
				<li><a href="showbalance.html">show balance</a></li>
				<li><a href="/customer/promotion">โปรโมชั่น/แนะนำบริการ</a></li>
				<li><a href="showค้างจ่าย.html">show ค้างจ่าย</a></li>
				<li><a href="/customer/sendIssue">ส่งปัญหา/คำร้องขอ</a></li>
			</ul></a></li>
			</ul>
		</nav>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_background"></div>
		<div class="background_image background_city" style="background-image:url(images/city_2.png)"></div>
		<div class="cloud cloud_1"><img src="images/cloud.png" alt=""></div>
		<div class="cloud cloud_2"><img src="images/cloud.png" alt=""></div>
		<div class="cloud cloud_3"><img src="images/cloud_full_2.png" alt=""></div>
		<div class="cloud cloud_4"><img src="images/cloud.png" alt=""></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title">{{$title}}</div>
							<div class="breadcrumbs">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<li><a href="index.html">Home</a></li>
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
			

		

	@yield("content");

	

	

	



	
</div>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/styles/bootstrap-4.1.2/popper.js"></script>
<script src="/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="/plugins/greensock/TweenMax.min.js"></script>
<script src="/plugins/greensock/TimelineMax.min.js"></script>
<script src="/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="/plugins/greensock/animation.gsap.min.js"></script>
<script src="/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/plugins/easing/easing.js"></script>
<script src="/plugins/progressbar/progressbar.min.js"></script>
<script src="/plugins/parallax-js-master/parallax.min.js"></script>
<script src="/plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="/js/about.js"></script>
</body>
</html>