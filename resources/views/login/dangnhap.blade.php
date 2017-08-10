<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Wine - Đăng Nhập Quản Trị Viên</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta  author="Do van chieu">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/bootstrap/css/bootstrap-theme.min.css') }}">

	<script type="text/javascript" src="{{ url('assets/jquery-3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
		}

		body {
			margin: 0;
			padding: 0;
			font-family: Sans-serif;
			background-image: url('assets/image/1.jpg');
			/*background: #2c3e50*/
		}

		#wrap {
			margin: 0 auto 30px;
		}

		#regbar {
			height: 67px;
			background: #34495e;
		}

		#navthing {
			margin-left: 500px;
		}

		h2 {
			padding: 20px;
			color: #ecf0f1;
		}

		fieldset {
			border: none;
		}

		.login {
			position: relative;
			width: 350px;
			display: none;
		}

		.arrow-up {
			width: 0px;
			height: 0;
			border-left: 20px solid transparent;
			border-right: 20px solid transparent;
			border-bottom: 15px solid #ECF0F1;
			left: 10%;
			position: absolute;
			top: -10px;
		}

		.formholder {
			background: #ecf0f1;
			width: 350px;
			border-radius: 8px;
			padding-top: 5px;
		}
		.formholder input[type="email"], .formholder input[type="password"] {
			padding: 10px 10px;
			margin: 10px 0;
			width: 96%;
			display: block;
			font-size: 18px;
			border-radius: 5px;
			border: none;
			-webkit-transition: 0.3s linear;
			-moz-transition: 0.3s linear;
			-o-transition: 0.3s linear;
			transition: 0.3s linear;
		}
		.formholder input[type="email"]:focus, .formholder input[type="password"]:focus {
			outline: none;
			box-shadow: 0 0 1px 1px #1abc9c;
		}
		.formholder input[type="submit"] {
			background: #1abc9c;
			padding: 10px;
			font-size: 20px;
			display: block;
			width: 100%;
			border: none;
			color: #fff;
			border-radius: 5px;
		}
		.formholder input[type="submit"]:hover {
			background: #1bc6a4;
		}

		.randompad {
			padding: 10px;
		}

		.green {
			color: #1abc9c;
		}

		a {
			color: #ecf0f1;
			text-decoration: none;
		}
		a:hover {
			color: #1abc9c;
		}

	</style>
</head>
<body>
	<div id="wrap">
		<div id="regbar">
			<div id="navthing">
				<h2 style=" margin: 100px 0px 10px 0px"><a href="#" id="loginform">Đăng Nhập Trang Quản Trị </a></h2>
				<div class="login">
					<div class="arrow-up"></div>
					<div class="formholder">
						<div class="randompad">
							<form method="POST" role="form">
								<fieldset>
								@include('flash.errors')
								{{ csrf_field() }}
									<label>Email</label>
									<input type="email"  name="email"/>
									<label>Password</label>
									<input type="password"  name="password"/>
									<input type="submit" value="Login" />
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('input[type="submit"]').mousedown(function(){
			$(this).css('background', '#2ecc71');
		});
		$('input[type="submit"]').mouseup(function(){
			$(this).css('background', '#1abc9c');
		});

		$('#loginform').click(function(){
			$('.login').fadeToggle('slow');
			$(this).toggleClass('green');
		});



		$(document).mouseup(function (e)
		{
			var container = $(".login");

		    if (!container.is(e.target) // if the target of the click isn't the container...
		        && container.has(e.target).length === 0) // ... nor a descendant of the container
		    {
		    	container.hide();
		    	$('#loginform').removeClass('green');
		    }
		});
	</script>
</body>
</html>