var app=angular.module('myapp', ['ngRoute','ngResource']);

app.constant('api', {
	url:'http://banhang.example.com:88/'
});

app.config(function($interpolateProvider) {
	$interpolateProvider.startSymbol('@');
	$interpolateProvider.endSymbol('@');
});
$('.show_flash').delay(5000).fadeOut(500);
