@extends('quantri.home.main')
@section('title','Manager ! Quản Lý Dự Án')
@section('tit','Quản Lý Danh Sách Dự Án')
@section('content')
<div class="show_flash">
	@include('flash.flash')
</div>
<div class="col-md-10 col-md-push-1" ng-controller="duanCtrl">
	<hr>
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form role="form" name="mForm" action="" method="POST" enctype="multipart/form-data">
				<div class="modal-header" ng-style="
					mes=='Add new Project'?{'background-color':'#b161fb'}:{'background-color':'#e9a247'}">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"> @ mes @ </h4>
				</div>
				<div class="modal-body">
				<!-- noi dung form -->
					{{ csrf_field() }}
					<div class="form-group">
						<label>Tên Sản Phẩm</label>
						<input type="text" name="name" minlength="6" class="form-control" ng-model="name" required placeholder="Input field" >
						<div class="danger" ng-show="mForm.name.$dirty && mForm.name.$invalid">
							<span ng-show="mForm.name.$error.required">
								<strong>Oopps ! </strong>... field required
							</span>
							<span ng-show="mForm.name.$error.minlength">
								<strong>Oopps ! </strong>... min 6 length
							</span>
						</div>
					</div>
					<div class="form-group">
						<label>Ảnh Minh Họa</label>
						<input type="file" name="image" required accept="image/*">
					</div> 
					<div class="form-group">
						<label>Chi Tiết</label>
						<textarea name="content" id="content" required ></textarea>
					</div>  
					<div class="form-group" ng-if="mes=='Edit a Project'">
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
				<!-- end noi dung form -->
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary"
                    ng-disabled="(mForm.name.$dirty && mForm.name.$invalid || mForm.name.$pristine && mForm.name.$invalid) ">
                        Save Changes
                    </button>

					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên Dự Án</th>
					<th>Ảnh Minh Họa</th>
					<th>Trạng Thái</th>
					<th style="text-align: right">
						<a class="btn btn-default" ng-click="active('add')" data-toggle="modal" href='#modal-id'>
							<i class="fa fa-plus"> Plus</i>
						</a>
					</th>
						
				</tr>
			</thead>
			<tbody>
				<?php list_duan($data) ?>
			</tbody>
		</table>
	</div>

</div>
@endsection