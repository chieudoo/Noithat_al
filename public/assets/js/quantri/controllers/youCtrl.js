app.controller('youCtrl', ['$scope','apiService', function($scope,apiService){
	$scope.active=function(name,id){
		switch (name) {
			case "add":
				$scope.mes="Thêm Video";
				$scope.notice=false;
				$scope.action=function(){
					$scope.notice=true;
					var link=$scope.you.link;
					var str=link.replace("watch?v=", "embed/");
					var data={
						link:str,
						status:$('.form-group:eq(0) input[type="radio"]:checked').val()
					}
					apiService.subAdd("wine-video",data);
					return false;
				}
				break;
			default:
				// statements_def
				break;
		}
	}
}]);