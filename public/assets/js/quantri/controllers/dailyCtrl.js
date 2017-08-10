app.controller('dailyCtrl', ['$scope','apiService', function($scope,apiService){
	$scope.active=function(name,id){
		$scope.notice=false;
		switch (name) {
			case "add":
				$scope.mes="Thêm Đại Lý";
				$scope.action=function(){
					$scope.notice=true;
					var data={
						content:CKEDITOR.instances['content'].getData(),
						status:$('.form-group:eq(0) input[type="radio"]:checked').val(),
					}
					apiService.subAdd("wine-dai-ly",data);
					return false;
				}
				break;
			case "edit":
			    $scope.mes="Sửa Đại Lý";
			    var nd=$('table tr:eq(1) td').html();
			    CKEDITOR.instances['content'].setData(nd);
			    $scope.action=function(){
			    	$scope.notice=true;
			    	var data={
			    		content:CKEDITOR.instances['content'].getData(),
			    		status:$('.form-group:eq(0) input[type="radio"]:checked').val()
			    	}
			    	apiService.subEdit("wine-sua-dai-ly",id,data);
			    	return false;
			    }
			    break;
			default:
				// statements_def
				break;
		}
	}
}])