app.controller('danhmucCtrl', ['$scope','$http','apiService', function($scope,$http,apiService){

	apiService.get("data-danh-muc").then(function(response){
		$scope.data=response;
		$scope.checkUnique=function (x) {
			$scope.e=false
			for(item in response){
				if(response[item].name === x) {
                    $scope.e = true;
                }
			}
        }

	});

	$scope.active=function(name,id){
		switch(name){
			case "add" :
				$scope.mes="Add a Category";
				$scope.cate="";
				$scope.notice=false;
				break;
			case "edit" :
				$scope.mes="Edit a Category";
				apiService.edit("data-cate-one",id).then(function(result){
					console.log(result);
					for(i in result){
						$scope.cate=result[i];
					}
				}, function(){
					console.log('not return value ! error');
				});	
				$scope.edit=function(id){

					$scope.notice=true;
					var data={
						name:$scope.cate.name,
						parent:$('.form-group:eq(1) select').val(),
						status:$('.form-group:eq(2) input[type="radio"]:checked').val(),
					};
					console.log(data);
					apiService.subEdit("sua-danh-muc",id,data);
					return false;
				}
				break;
			case "delete" :
				if(cek == true){
					apiService.subDel("xoa-danh-muc",id,id);
					return false;
				}else{
					console.log('not delete');
				}
				break;
			default :
				break;
		}
	}
	


}]);