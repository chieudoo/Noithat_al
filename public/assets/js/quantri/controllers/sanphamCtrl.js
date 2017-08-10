app.controller('sanphamCtrl', ['$scope','apiService', function($scope,apiService){

$scope.active=function(name,id){
	switch(name){
		case "add" :
			$scope.mes="Add new Product";
			break;
		case "edit" :
			$scope.mes="Edit a Product";
			var nd=$('table tr:eq(4) td').html();
			CKEDITOR.instances['content'].setData(nd);
		default :
			break;
	}
}
	
}]);