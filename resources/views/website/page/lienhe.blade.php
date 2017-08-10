<div class="gioithieu">
	<h1><i class="fa fa-list"></i>Thông Tin Liên Hệ</h1>
	<hr>
	@foreach($lh as $item)
	<div class="text-center">
		 {!! $item['content'] !!}
	</div>
	@endforeach
</div>