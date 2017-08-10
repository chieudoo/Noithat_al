app.controller('slideCtrl', ['$scope','apiService', function($scope,apiService){
	
	$('.tog').click(function(){
		var n=$(this).html();
		if(n==="Thêm"){
			$('.anhien').slideDown(500);
			$(this).html("Gọn");
		}else{
			$('.anhien').slideUp(500);
			$(this).html("Thêm");
		}
		
	});
	$scope.active=function(name){
		switch (name){
			case "add" :
				$scope.mes="Add new Slide";
				break;
			case "edit" :
				$scope.mes="Edit a Slide";
				var nd=$('table tr:eq(2) td').html();
				CKEDITOR.instances['content'].setData(nd);
				break;
		}
	}

}]);