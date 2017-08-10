<div class="gioithieu">
	<h1><i class="fa fa-list"></i> Danh Sách Đại Lý</h1>
	<hr>
	@foreach($dl as $item)
	@if($item['status']==0)
	<ul>
		<li> {!! $item['content'] !!}</li>
	</ul>
	@endif
	@endforeach
</div>