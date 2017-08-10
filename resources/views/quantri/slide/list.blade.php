@extends('quantri.index')
@section('title','Manager ! Quản Lý Slide')
@section('tit','Quản Lý Slide')
@section('content')
<div class="show_flash">
	@include('flash.flash')
</div>
<div class="col-md-10 col-md-push-1" ng-controller="slideCtrl">
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form role="form" name="mForm" action="" method="POST" enctype="multipart/form-data">
				<div class="modal-header" ng-style="
					mes=='Add new Slide'?{'background-color':'#b161fb'}:{'background-color':'#e9a247'}">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"> @ mes @ </h4>
				</div>
				<div class="modal-body">
				<!-- noi dung form -->
					{{ csrf_field() }}
					<div class="form-group">
						<label>Ảnh Minh Họa</label>
						<input type="file" name="image" required accept="image/*">
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
							<input type="text" name="name" class="form-control"  placeholder="Input field" >
						</div>
						<div class="form-group">
							<label>Chi Tiết</label>
							<textarea name="content" id="content"></textarea>
						</div>
					</div>  
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
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>STT</th>
					<th>Hình Ảnh</th>
					<th>Trạng Thái</th>
					<th style="text-align: right">
						<a class="btn btn-default" ng-click="active('add')" data-toggle="modal" href='#modal-id'>
							<i class="fa fa-plus"> Plus</i>
						</a>
					</th>
						
				</tr>
			</thead>
			<tbody>
				<?php list_slide($data) ?>
			</tbody>
		</table>
	</div>

</div>

@endsection