app.controller('userCtrl', ['$scope','apiService', function($scope,apiService){
	
				$scope.check=function(name){
					var p1=$scope.user.password;
					if(name != p1){
						return $scope.cek=true;
					}else{
						return $scope.cek=false;
					}
				}

	$scope.active=function(name,id){
		switch (name) {
			case "add" :
				$scope.mes = "Thêm Thành Viên";
				$scope.notice=false;
				$scope.radio=true;
				$scope.show=true;
				$scope.add=true;
				$scope.edit=false;
				$scope.show2=false;
				$scope.user ="";
				$scope.action=function(){
					$scope.notice=true;
					var data={
						name:$scope.user.name,
						email:$scope.user.email,
						password:$scope.user.password,
						status:$('.form-group:eq(0) input[type="radio"]:checked').val()
					}
					console.log(data);
					apiService.subAdd("wine-users",data);
					return false;
				}
				break;
			case "edit" :
				$scope.mes = "Sửa Thành Viên";
				if(id===1){
					$scope.radio=false;
				}else{
					$scope.radio=true;
				}
				$scope.show=false;
				$scope.notice=false;
				$scope.add=false;
				$scope.edit=true;
				$scope.show2=true;
				apiService.edit("wine-sua-user",id).then(function(response){
					for (var i=0;i<response.length;i++) {
						$scope.user=response[i];
					}
				});
				$scope.action=function(){
					$scope.notice=true;
					var data={
						name:$scope.user.name,
						email:$scope.user.email,
						status:$('.form-group:eq(0) input[type="radio"]:checked').val(),
						password:$scope.user.password
					}
					console.log(data);
					apiService.subEdit("wine-sua-user",id,data);
					return false;
				}
				break;
			default:
				// statements_def
				break;
		}
	}
}]);