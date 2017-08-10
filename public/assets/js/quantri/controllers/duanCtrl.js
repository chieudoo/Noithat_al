app.controller('duanCtrl', ['$scope','apiService', function($scope,apiService){
	$scope.active=function(name){
		switch(name){
			case "add" :
				$scope.mes="Thêm Mới Một Dự Án";
			    break;
			case "edit" :
				$scope.mes="Sửa Một Dự Án";
				var nd=$('table tr:eq(3) td').html();
				CKEDITOR.instances['content'].setData(nd);
				break;
		}
	}
}])