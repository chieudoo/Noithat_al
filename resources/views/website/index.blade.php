<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/bootstrap/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/awesome/css/font-awesome.min.css') }}">
    <script type="text/javascript" src="{{ url('assets/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/js/1.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/1.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,hebrew,latin-ext,vietnamese" rel="stylesheet">
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div class="banner">
        <div class="container-fluid">
            <div class="row">
                
            </div>
        </div>
    </div> <!-- end banner -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Website</a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav  navbar-right">
                    <li><a href="/">Trang Chủ</a></li>
                    <?php menu($cate,0) ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>


    </nav> <!-- end navbar -->
    
    @yield('slide')
    
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="menu-left">
                        <h1>Danh Mục Sản Phẩm</h1>
                        <hr>
                        <ul>
                            <?php menu_left($cate,2) ?>
                        </ul>
                        <hr>
                        <div class="video">
                        <h1>Video</h1>
                            <ul>
                            @foreach($you as $item)
                                @if($item['status']==0)
                                <li><iframe width="100%" src="{{ $item['link'] }}" frameborder="0" allowfullscreen></iframe></li>
                                @endif
                            @endforeach
                            </ul>
                        </div>
                    </div> <!-- end menu-left -->
                </div> 
        @yield('content')
    </div><!--  end main -->
    <div class="lienhe">
        <div class="container">
            <div class="row text-center lienhe1">
                <div class="col-md-10 col-md-push-1">
                    <h1>Về Chúng Tôi</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="lienhe2">
                        <form action="" method="POST" role="form" name="lienhe">
                            <legend>Contact Us</legend>
                        
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea name="" class="form-control" rows="5" placeholder="Your Message"></textarea>
                            </div>
                            
                        
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form><!--  end form lienhe -->
                    </div> <!-- end lienhe2 -->
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="lienhe3">
                        <ul>
                            <li><i class="fa fa-rocket"></i>
                                <div>
                                    <h4>Địa Chỉ Của Chúng Tôi</h4> 
                                    <p>3481 Melrose Place, Beverly Hills CA 90210</p>   
                                </div>
                            </li>
                            <li><i class="fa fa-phone"></i>
                                <div>
                                    <h4>Liên Lạc Với Chúng Tôi</h4> 
                                    <p>3481 Melrose Place, Beverly Hills CA 90210</p>   
                                </div>
                            </li>
                            <li><i class="fa fa-envelope"></i>
                                <div>
                                    <h4>Liên Lạc Email</h4> 
                                    <p>3481 Melrose Place, Beverly Hills CA 90210</p>   
                                </div>
                            </li>
                            <li><i class="fa fa-clock-o"></i>
                                <div>
                                    <h4>Thời Gian Làm Việc</h4> 
                                    <p>3481 Melrose Place, Beverly Hills CA 90210</p>   
                                </div>
                            </li>
                        </ul>
                    </div><!--  end lienhe3 -->
                </div>
            </div><!--  end row -->
        </div> <!-- end container -->
    </div> <!-- end lienhe -->
    <div class="footer">
        <div class="container text-center">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d953726.8930815643!2d105.0921671144516!3d20.972758776789675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135008e13800a29%3A0x2987e416210b90d!2sHanoi%2C+Vietnam!5e0!3m2!1sen!2sin!4v1501126026579" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <h4>© 2017 Raleway All Rights Reserved.</h4>
                    <ul>
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-youtube-play"></i></a></li>
                        <li><a href=""><i class="fa fa-skype"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>