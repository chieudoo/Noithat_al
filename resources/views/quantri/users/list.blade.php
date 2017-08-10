@extends('quantri.index')
@section('title','Manager ! Quản Lý Thành Viên')
@section('tit','Quản Lý Thành Viên')
@section('content')
<div class="show_flash">
	@include('flash.flash')
</div>
<div class="col-md-10 col-md-push-1" ng-controller="userCtrl">
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<form role="form" name="mForm" action="" method="POST">

					{{ csrf_field() }}
				<div class="modal-header" ng-style="
					mes=='Thêm Thành Viên'?{'background-color':'#b161fb'}:{'background-color':'#e9a247'}">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"> @ mes @ </h4>
				</div>

				<div class="modal-body">
				<!-- noi dung form -->

							<div class="form-group" >
								<label>Trạng Thái Quản Trị</label> 
								<div class="radio" ng-if="radio">
									<label>
										<input type="radio" name="status" value="0" checked="checked">
										NO
									</label>
									<label>
										<input type="radio" name="status"  value="1">
										YES
									</label>
								</div>
							</div>
						<div ng-if="show">
							<div class="form-group">
								<input type="text" required placeholder="Nhập Username" ng-model="user.name" name="name" class="form-control">
							</div>
								<div class="danger" ng-show="mForm.name.$dirty && mForm.name.$invalid">
									<span ng-show="mForm.name.$error.required">
										<strong>Oopps ! </strong>... field required
									</span>
								</div>
							<div class="form-group">
								<input type="email" placeholder="Nhập Email" required ng-model="user.email" name="email" class="form-control">
							</div>
								<div class="danger" ng-show="mForm.email.$dirty && mForm.email.$invalid">
									<span ng-show="mForm.email.$error.required">
										<strong>Oopps ! </strong>... field required
									</span>
									<span ng-show="mForm.email.$error.email">
										<strong>Oopps ! </strong>... vui lòng nhập đúng 1 email 
									</span>
								</div>
						</div>
							<div class="form-group">
								<input type="password" ng-model="user.password" required minlength="8" placeholder="Nhập Mật Khẩu" name="password" class="form-control">
							
							</div>
								<div class="danger" ng-show="mForm.password.$dirty && mForm.password.$invalid">
									<span ng-show="mForm.password.$error.required">
										<strong>Oopps ! </strong>... field required
									</span>
									<span ng-show="mForm.password.$error.minlength">
										<strong>Oopps ! </strong>... min 8 length
									</span>
								</div>
							<div class="form-group">
								<input type="password" placeholder="Nhập Lại Mật Khẩu" ng-model="cpass" name="cpass" required class="form-control" ng-keyup="check(cpass)">
							</div>
								<div class="danger" ng-show="mForm.cpass.$dirty && mForm.cpass.$invalid">
									<span ng-show="mForm.cpass.$error.required">
										<strong>Oopps ! </strong>... field required
									</span>
								</div>
								<div class="danger" ng-show="cek">
									<span>
										<strong>Oopps ! </strong>... Password not Confirm
									</span>
								</div>
				
					
					
				<!-- end noi dung form -->
				</div>
				<div class="modal-footer">
					<i class="fa fa-spinner fa-spin fa-2x" style="color: blue" ng-if="notice"></i>
					<a href="" class="btn btn-primary" ng-click="action()"
					ng-disabled="mForm.$invalid" ng-if="add">
                        Save Changes
                    </a>
                    <a href="" class="btn btn-primary" ng-click="action()" ng-if="edit">
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
				<th>STT</th>
				<th>Username</th>
				<th>Email</th>
				<th>Trạng Thái</th>
				<th style="text-align: right">
				@if(Auth::user()->id == 1)
					<a class="btn btn-default" ng-click="active('add')" data-toggle="modal" href='#modal-id'>
						<i class="fa fa-plus"> Plus</i>
					</a>
				@endif
				</th>
			</tr>
			<?php list_user($data) ?>
		</table>
	</div>

</div>
@endsection