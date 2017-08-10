@extends('website.index')
@section('title',$name)
@section('content')
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            
			@if($id==1)
				@include('website.page.gioithieu')
			@elseif($id==2)
				@include('website.page.sanpham')
			@elseif($id==3)
				@include('website.page.duan')
			@elseif($id==4)
				@include('website.page.daily')
			@elseif($id==5)
				@include('website.page.lienhe')
			@else
				@include('website.page.mpage')
			@endif
        </div>
    </div> <!-- end row -->
</div> <!-- end container -->
@endsection