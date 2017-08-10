@extends('quantri.index')
@section('title','Manager ! Thông Tin Liên Hệ')
@section('tit','Thông Tin Liên Hệ')
@section('content')
<div class="show_flash">
	@include('flash.flash')
</div>
<div class="col-md-8 col-md-push-2" ng-controller="lienheCtrl">
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form role="form" name="mForm" action="" method="POST">
				<div class="modal-header"  style="background-color':'#e9a247'">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"> Update Thông Tin Liên Hệ </h4>
				</div>
				<div class="modal-body">
				<!-- noi dung form -->
					{{ csrf_field() }}
					<div class="form-group">
						<label>Chi Tiết</label>
						<textarea name="content" id="content"></textarea>
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
			<tr>
				<th width="100%">Nội Dung</th>
				<th style="text-align: right">
					<a class="btn btn-default" data-toggle="modal" href='#modal-id'>
						<i class="fa fa-edit"> Edit</i>
					</a>
				</th>
			</tr>
			@foreach($data as $item)
			<tr>
				<td>{!! $item['content'] !!}</td>
			</tr>
			@endforeach
		</table>
	</div>
	<script type="text/javascript">
		
	</script>
</div>
@endsection