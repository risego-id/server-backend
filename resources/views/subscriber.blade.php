<!DOCTYPE html>
<html>
<head>
	<title>Coming Soon - Under Construction HTML Template</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="assets/icomoon.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<style type="text/css">

body {
	font-family: "Roboto", sans-seriff;
    color: #949393;
    margin: 0;
}
a, button {
transition: 0.3s all ease-out;
}
a {
	color: #111;
	text-decoration: none;
}
a:hover {
	color: #0043ee;
}
.row {
    display: flex;
}
.container {
    width: 530px;
    margin: 170px auto;
}
#body-wrap .col-8 {
    width: 70%;
}
#body-wrap .col-4 {
    width: 30%;
    height: 950px;
    overflow: hidden;
}
header#header {
    margin-bottom: 70px;
	color: black;
}
.main-content {
    color: #fff;
}
.main-content h1 {
    font-size: 3em;
    font-weight: 700;
    color: #000;       
    margin-bottom: 0; 
}
#countdown-clock {
	font-size: 30px;
	display: flex;
	flex-wrap: wrap;
	margin: 50px 0;
}
#countdown-clock .time{
	background-color: #f5f5f5;
	color: #000;
	border-radius: 10px;
	padding: 20px;
	margin-right: 10px;
    margin-bottom: 10px;
	text-align: center;
}
#countdown-clock .time > span{
	font-weight: 700;
}
#countdown-clock .time small{
	padding-top: 5px;
	font-size: 12px;
	text-transform: uppercase;
    display: block;
}
.main-content p {
	font-size: 1.2em;
	color: #666;
	width: 70%;
}
#form .form-group {
    display: flex;
    margin: 20px 0;
}
input::placeholder{
   color: #949393;
}
.form-group input.form-control {
    width: 250px;
    height: 50px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    padding-left: 20px;
    border: none;
    background: #f5f5f5;
}
.form-group button.submit-button {
    padding: 18px 30px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    background-color: #0043ee;
    border: none;
	cursor: pointer;
    color: #fff;
}

.text-danger{
    color: red
}

.form-group button.submit-button:hover {
    background-color: #222630;
}
.form-group button.submit-button span {
    font-weight: 700;
    padding-left: 5px;
}
#footer .social-links {
    padding-top: 20px;
}
#footer .social-links ul {
	display: flex;
	list-style: none;
	padding: 0;
}
#footer .social-links li {
    padding-right: 20px;
}
#footer .social-links ul a {
    font-size: 1.6em;
    color: #626262;
    text-decoration: none;
}
#footer .social-links ul a:hover {
    color: #111;
}
.copyright p {
    color: #626262;
}


@media (max-width: 999px) {
	.container {
	    padding-left: 70px;
	}
	#body-wrap .col-4 {
	    width: 40%;
	    margin-left: -48px;
	    z-index: -1;
	}	
 }

@media (max-width: 599px) {
	#body-wrap .col-8 {
	    width: 100%;
	}
	.container {
		width: 100%;
	}
	#body-wrap .page-title {
	    width: 98%;
	}
	#body-wrap .col-4 {
	    width: 100%;
	    margin-left: -438px;
	    opacity: 0.1;
	}
 }

@media (max-width: 540px) {
	.container {
    	padding-right: 30px;
	    padding-left: 30px;
	}
	.main-content h1 {
	    font-size: 2.4em;
	}
	#form .form-group {
	    flex-wrap: wrap;
	}
	.form-group input.form-control {
	    width: 100%;
	    margin-bottom: 10px;
        background: #e4edf7;
	}
	.form-group button.submit-button {
	    width: 100%;
	}
	#body-wrap .col-4 {
	    margin-left: -108px;
	}
 }

</style>

<body>
	
	<div id="body-wrap">
		<div class="row">
			<div class="col-8">
				<div class="container">

					<header id="header">
						<h1 style="margin-bottom:0px">RISE GO</h1>
						<h3 style="margin-top:0px">Level up your life</h3>
					</header>

					<div class="main-content">

						<div class="page-title">

							<h1>We are launching soon!</h1>

							<div id="countdown-clock">
								<div class="time">
									<span class="days"></span>
									<small>Days</small>
								</div>
								<div class="time">
									<span class="hours"></span>
									<small>Hours</small>
								</div>
								<div class="time">
									<span class="minutes"></span>
									<small>Minutes</small>
								</div>
								<div class="time">
									<span class="seconds"></span>
									<small>Seconds</small>
								</div>
							</div>

						</div><!--page-title-->

						<form id="form" action="/subscribe" method="post">
							@csrf
							<p>Get notified when we launched our website</p>

							@if (session('success'))
                                <div style="background: #67cd67;padding: 10px;border-radius: 5px;">
                                    {{ session('success') }}
                                </div>
                            @endif
							@if ($errors->has('email'))
                            <span class="error text-danger">Your email is in list we will inform you asap</span>
                            @endif
							<div class="form-group">
								<input type="email" name="email" class="form-control" placeholder="Your email address" required value="{{ old('email') }}">
								<button type="submit" class="submit-button"><i class="icon icon-envelope"></i><span>NOTIFY ME</span></button>
							</div>

						</form>

					</div><!--main-content-->

					<footer id="footer">

						<div class="social-links">
							<ul>
								<li><a href="#"><i class="icon icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon icon-github"></i></a></li>
								<li><a href="#"><i class="icon icon-google-plus"></i></a></li>
								<li><a href="#"><i class="icon icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon icon-twitter"></i></a></li>
							</ul>
						</div><!--social-links-->

						<div class="copyright">
							<p>Copyright &copy; Rise Go 2023.</p>
						</div>

					</footer>

				</div>
			</div><!--col-8-->

			<div class="col-4">
				<img src="img/sideimg.jpg" alt="wallpaper" class="sideimg">
			</div>		
		</div><!--row-->

	</div><!--body-wrap-->


<script type="text/javascript">
	function getTimeRemaining(endtime) {
		const total = Date.parse(endtime) - Date.parse(new Date());
		const seconds = Math.floor((total / 1000) % 60);
		const minutes = Math.floor((total / 1000 / 60) % 60);
		const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
		const days = Math.floor(total / (1000 * 60 * 60 * 24));

	return {
	total,
	days,
	hours,
	minutes,
	seconds
	};
	}

	function initializeClock(id, endtime) {
		const clock = document.getElementById(id);
		const daysSpan = clock.querySelector('.days');
		const hoursSpan = clock.querySelector('.hours');
		const minutesSpan = clock.querySelector('.minutes');
		const secondsSpan = clock.querySelector('.seconds');

	function updateClock() {
	const t = getTimeRemaining(endtime);

	daysSpan.innerHTML = t.days;
	hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
	minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
	secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

	if (t.total <= 0) {
	  clearInterval(timeinterval);
	}
	}

	updateClock();
	const timeinterval = setInterval(updateClock, 1000);
	}

	const deadline = new Date("September 1, 2023")
	initializeClock('countdown-clock', deadline);
</script>


</body>
</html>