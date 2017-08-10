@extends('quantri.index')
@section('title','Manager ! Video Giới Thiệu')
@section('tit','Quản Lý Video')
@section('content')
<div class="show_flash">
	@include('flash.flash')
</div>
<div class="col-md-8 col-md-push-2" ng-controller="youCtrl">
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<form role="form" name="mForm" action="" method="POST">
				<div class="modal-header"  ng-style="
					mes=='Thêm Video'?{'background-color':'#b161fb'}:{'background-color':'#e9a247'}">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"> @ mes @ </h4>
				</div>
				<div class="modal-body">
				<!-- noi dung form -->
					{{ csrf_field() }}
					<div class="form-group" >
						<label>Trạng Thái </label> 
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
					<div class="form-group">
						<label>Chi Tiết</label>
						<input type="url" name="link" ng-model="you.link" required  class="form-control" placeholder="Nhập Link Youtube">

						<div class="danger" ng-show="mForm.link.$dirty && mForm.link.$invalid">
							<span ng-show="mForm.link.$error.required">
								<strong>Oopps ! </strong>... field required
							</span>
							<span ng-show="mForm.link.$error.url">
								<strong>Oopps ! </strong>... please enter link
							</span>
						</div>

					</div>

				<!-- end noi dung form -->
				</div>
				<div class="modal-footer">
					<i class="fa fa-spinner fa-spin fa-2x" style="color: blue" ng-if="notice"></i>
					<a href="" class="btn btn-primary" ng-click="action()" ng-disabled="(mForm.link.$dirty && mForm.link.$invalid ) || (mForm.link.$pristine && mForm.link.$invalid)">
                        Save Changes
                    </a>

					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<tr>
				<th>Video</th>
				<th>Trạng Thái</th>
				<th style="text-align: right">
					<a class="btn btn-default" ng-click="active('add')" data-toggle="modal" href='#modal-id'>
						<i class="fa fa-plus"> Plus</i>
					</a>
				</th>
			</tr>
	@foreach($data as $item)
			<tr>
				<td><a target="_blank" href="{{$item['link']}}">Link</a></td>
				@if($item['status']==0)
					<td><span style='color:green'>Xuất</span></td>
				@else
					<td><span style='color:red'>Ẩn</span></td>
				@endif
				<td>
					<a class='btn btn-danger delete' href="{{ url('wine-xoa-video/'.$item['id']) }}"" onclick='return confirm(" Are you sure ?")'>
						<i class='fa fa-trash'></i>
					</a>
				</td>
			</tr>
	@endforeach
		</table>
	</div>

</div>
@endsection