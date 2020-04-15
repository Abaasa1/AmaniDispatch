// JavaScript Document

app.controller("contactController",function($scope, $http, $state){
	//variables
	
	
	//functions
	$scope.home=function(){
		$state.go("home");
		
		
	}
	$scope.aboutUs=function(){
		$state.go("aboutUs");
		
		
	}
	$scope.contact=function(){
		$state.go("contact");
		
		
	}
	$scope.login=function(){
		$state.go("login");
		
		
	}
	
	
	//init
	
	
	
	
	})