<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> @yield('title')</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta  author="Do van chieu">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/bootstrap/css/bootstrap-theme.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/css/app.css') }}">

</head>
<body ng-app="myapp">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">TIT</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="#">HOME</a></li>
					<li><a href="{{ url('wine-danh-muc') }}">Danh Mục</a></li>
					<li><a href="{{ url('wine-san-pham') }}">Sản Phẩm</a></li>
					<li><a href="{{ url('wine-du-an') }}">Dự Án Thi Công</a></li>
					<li><a href="{{ url('wine-about') }}">Giới Thiệu</a></li>
					<li><a href="{{ url('wine-video') }}">Video</a></li>
					<li><a href="{{ url('wine-users') }}">Thành Viên</a></li>
					<li class="more">
						<a href="">More <b class="caret"></b></a>
						<ul>
							<li>
								<a href="{{ url('wine-slide') }}">Slide <b class="fa fa-caret-right" style="float: right;padding: 4px"></b></a>
							</li>
							<li>
								<a href="{{ url('wine-dai-ly') }}">Đại Lý <b class="fa fa-caret-right" style="float: right;padding: 4px"></b></a>
							</li>
							<li>
								<a href="{{ url('wine-lien-he') }}">Liên Hệ <b class="fa fa-caret-right" style="float: right;padding: 4px"></b></a>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}  <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{ url('lar-logout') }}"><i class="fa fa-sign-out"></i> Đăng Xuất</a></li>
							<li><a href="/" target="_blank"><i class="fa fa-eye"></i> View Website</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="clearfix"></div>
	<content>
		<div class="container-fluid">
			<div class="cleartop"></div>
			<h3 style="color: green;font-family: Trebuchet MS,Tahoma,Verdana,Arial,sans-serif">
				<i class="fa fa-list" style="color: #1fea1f"></i> 
				@yield('tit')
			</h3>
			@yield('content')
		</div>
	</content>

	<script type="text/javascript" src="{{ url('assets/jquery-3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/quantri/1.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/angular.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/angular-route.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/angular-resource.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/quantri/app.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/quantri/service.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/quantri/controllers/danhmucCtrl.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/quantri/controllers/sanphamCtrl.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/quantri/controllers/duanCtrl.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/quantri/controllers/slideCtrl.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/quantri/controllers/aboutCtrl.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/quantri/controllers/dailyCtrl.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/quantri/controllers/lienheCtrl.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/quantri/controllers/youCtrl.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/quantri/controllers/userCtrl.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="//cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
	<script type="text/javascript">
        	CKEDITOR.replace( 'content', {
        	language : 'vi',
            filebrowserImageBrowseUrl: "{{ url('assets/ckfinder/ckfinder.html?Type=Images') }}",
            filebrowserImageUploadUrl: "{{ url('assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
            filebrowserBrowseUrl: "{{ url('assets/ckfinder/ckfinder.html?Type=Files') }}",
            filebrowserUploadUrl: "{{ url('assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}"
        });
	</script>
</body>
</html>