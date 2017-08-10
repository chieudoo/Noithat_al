@extends('quantri.index')
@section('title','Manager ! Quản Lý Danh Mục')
@section('tit','Quản Lý Danh Mục')
@section('content')
<div class="show_flash">
	@include('flash.flash')
</div>
<div class="col-md-8 col-md-offset-2" ng-controller="danhmucCtrl">
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<form role="form" name="mForm" action="" method="POST">
				<div class="modal-header" ng-style="
					mes=='Add a Category'?{'background-color':'#b161fb'}:{'background-color':'#e9a247'}">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"> @ mes @ </h4>
				</div>
				<div class="modal-body">
				<!-- noi dung form -->
					{{ csrf_field() }}
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" minlength="6" class="form-control" ng-model="cate.name" required
                        ng-keyup="checkUnique(cate.name)" placeholder="Input field" >
						<div class="danger" ng-show="mForm.name.$dirty && mForm.name.$invalid">
							<span ng-show="mForm.name.$error.required">
								<strong>Oopps ! </strong>... field required
							</span>
							<span ng-show="mForm.name.$error.minlength">
								<strong>Oopps ! </strong>... min 6 length
							</span>
						</div>
                        <div class="danger" ng-show="e">
                            <span>
                                <strong>Oopps ! </strong>... item had exists
                            </span>
                        </div>

					</div>
					<div class="form-group">
						<label>Parent</label>
						<select name="parent" class="form-control">
							<option value="0">--ROOT--</option>
							<?php select_category($data,0,"--") ?>
						</select>
					</div>  
					<div class="form-group">
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
					<button type="submit" class="btn btn-primary" ng-if="mes=='Add a Category'"
                    ng-disabled="mForm.name.$dirty && mForm.name.$invalid || mForm.name.$pristine && mForm.name.$invalid || e" >
                        Save Changes
                    </button>

					<i class="fa fa-spinner fa-spin fa-2x" style="color: blue" ng-if="notice"></i>
                    <a href="" class="btn btn-primary" ng-if="mes=='Edit a Category'"
                    ng-disabled="mForm.name.$dirty && mForm.name.$invalid || mForm.name.$pristine && mForm.name.$invalid || e"  ng-click="edit(cate.id)">
                         Save Edit 
                    </a>

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
					<th width="10%">STT</th>
					<th width="40%">Tên Danh Mục</th>
					<th width="30%">Trạng Thái</th>
					<th width="20%" style="text-align: right">
						<a class="btn btn-default" ng-click="active('add',0)" data-toggle="modal" href='#modal-id'>
							<i class="fa fa-plus"> Plus</i>
						</a>
					</th>
						
				</tr>
			</thead>
			<tbody>
				<?php list_cate($data,0,"--") ?>
			</tbody>
		</table>
	</div>

</div>

@endsection