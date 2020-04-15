// JavaScript Document

app.controller("aboutUsController", function ($scope, $http, $state){
	//variables
	
	cnsole.log("hi abut");
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