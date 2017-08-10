<div class="gioithieu">
	<h1><i class="fa fa-list"></i> Giới Thiệu Về Chúng Tôi</h1>
	<hr>
	@foreach($ab as $item)
	@if($item['status']==0)
	<div class="text-center">
		 {!! $item['content'] !!}
	</div>
	@endif
	@endforeach
</div>