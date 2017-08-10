app.service('apiService', ['$http','api', function($http,api){

	this.get = function(path){
		var list = $http({
					method:"GET",
					url : api.url + path,
				}).then(function(response){
					return response.data;
				}, function(response){
					console.log("api " + response.status);
				});
		return list;
	};
	this.edit=function(path,id){
		var edit = $http({
			method: "GET",
			url : api.url + path + "/" + id,
		}).then(function(response){
			return response.data;
		},function(response){
			console.log("api " + response.status);
		});
		return edit;
	}
	this.subAdd=function(path,data){
		$http({
			method : "POST",
			url : api.url + path,
			data : data
		}).then(function(response){
			console.log(response.statusText);
			setTimeout(function(){
				location.reload();
			},3000);
		},function(response){
			console.log(response.statusText);
		});
	}
	this.subEdit=function(path,id,data){
		$http({
			method: "POST",
			url : api.url + path + "/" + id,
			data : data,
		}).then(function(response){
			console.log(response.statusText);
			setTimeout(function(){
				location.reload();
			},3000);
		}, function(response){
			console.log(response.statusText);
		});
	}
	this.subDel=function(path,id,data){
		$http({
			method : "POST",
			url : api.url + path + "/" + id,
			data : data,
		}).then(function(response){
			console.log(response.statusText);
			setTimeout(function(){
				location.reload();
			},2000);
		},function(response){
			console.log(response.statusText);
		});
	}
}]);