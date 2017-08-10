app.controller('aboutCtrl', ['$scope','apiService', function($scope,apiService){
	$scope.active=function(){
		$scope.mes = "Edit a Content";
		var nd=$('table tr:eq(1) td').html();
		CKEDITOR.instances['content'].setData(nd);
		$scope.notice=false;
		$scope.edit=function(){
			$scope.notice=true;
			var data={
				content:CKEDITOR.instances['content'].getData(),
				status:$('.form-group:eq(0) input[type="radio"]:checked').val()
			}
			console.log(data);
			apiService.subEdit("wine-about",1,data);
			return false;
		}
	}
}]);