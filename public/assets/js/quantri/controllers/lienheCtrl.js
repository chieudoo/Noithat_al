
app.controller('lienheCtrl', ['$scope', function($scope){
	var nd=$('table tr:eq(1) td').html();
	CKEDITOR.instances['content'].setData(nd);;
}]);