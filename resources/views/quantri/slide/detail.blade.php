@extends('quantri.home.main')
@section('title','Manager ! Chi Tiết Slide')
@section('tit','Chi Tiết Slide')
@section('content')
<div class="show_flash">
	@include('flash.flash')
</div>
<div class="col-md-10 col-md-push-1" ng-controller="slideCtrl">
@foreach($data as $item)
	<a class="btn btn-info" data-toggle="modal" href='#modal-id' ng-click="active('edit')">
		<i class="fa fa-edit"> Edit</i>
	</a>
@endforeach
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
			    <form role="form" name="mForm" action="" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">@ mes @</h4>
				</div>
				<div class="modal-body">
					<!-- noi dung form -->
					{{ csrf_field() }}
					@foreach($data as $item)
					<div class="form-group">
						<label>Ảnh Minh Họa</label>
						<input type="file" name="image" accept="image/*">
						<input type="hidden" name="anhcu" value="{{ $item['image'] }}">
					</div> 
					<div class="form-group" >
						<label>Status </label> 
						<div class="radio">
							<label>
								<input type="radio" name="status" value="0" checked="checked">
								Show
							</label>
							<label>
								<input type="radio" name="status"  value="1">
								Hide
							</label>
						</div>
					</div>
					<p class="tog">Thêm</p>
					<div class="anhien">
						<div class="form-group">
							<label>Tên Slide</label>
							<input type="text" name="name" class="form-control"  placeholder="Input field" value="{{ $item['name'] }}">
						</div>
						<div class="form-group">
							<label>Chi Tiết</label>
							<textarea name="content" id="content"></textarea>
						</div>
					</div>  
					@endforeach
				<!-- end noi dung form -->
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">
                        Save Changes
                    </button>

					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<hr>
		<table class="table table-bordered table-hover">
			@foreach($data as $item)
				<ul>
					<li>
						<i class="fa fa-calendar" style="color: blue"> Ngày Tạo : </i> {{ $item['created_at'] }}
					</li>
					<li>
						<i class="fa fa-user" style="color: green"> Bởi : </i> {{ Auth::user()->name }}
					</li>
				</ul>
				@if($item['status']==0)
					<span style="color: green" class="waning">Xuất</span>
				@else
					<span style="color: red" class="waning">Ẩn</span>
				@endif
				<tr>
					<th width="20%">Ảnh Minh Họa</th>
					<td>
						<img src="{{ url('assets/image/upload/'.$item['image']) }}" 
						style="width: 80%;float: right;" class="img-responsive" alt="Image">
					</td>
				</tr>
				@if($item['name'] != null)
				<tr>
					<th width="20%">Tên Slide</th>
					<td>{{ $item['name'] }}</td>
				</tr>
				@endif
				@if($item['content'] !=null)
				<tr>
					<th width="20%">Chi Tiết</th>
					<td>{!! $item['content'] !!}</td>
				</tr>
				@endif
			@endforeach
		</table>
</div>
@endsection