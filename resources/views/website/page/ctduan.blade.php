@extends('website.index')
@section('title',$name)
@section('content')
	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			@foreach($duan as $item)
			<div class="tit_top">
				<ul>
					<li><span><i class="fa fa-home"></i></span></li>
					<li><a href="/">Trang Chủ</a></li> <label>/</label>
					<li><a href="{{ url('danh-muc/'.$item['danhmuc']['id'].'-'.$item['danhmuc']['slug'].'') }}.html">{{ $item['danhmuc']['name'] }}</a></li> <label>/</label>
					<li><a href="">{{ $name }}</a></li>
				</ul>
				<hr>
				<p><span>Ngày Đăng : </span>{{ $item['created_at'] }}</p>
			</div>
			<div class="noidung">
				<h1>{{ $item['name'] }}</h1>
				<p>{!! $item['content'] !!}</p>
				<hr>
				<div class="fb-comments" 
				data-href="{{ url('chi-tiet-du-an/'.$item['id'].'-'.$item['slug'].'') }}.html" 
				data-width="100%" data-numposts="5"></div>
			</div>
			@endforeach
		</div>
    </div> <!-- end row -->
</div> <!-- end container -->
@endsection