// JavaScript Document
/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
//Author:BEY A. ABAASA
//warning: This site code is held together by the grace of God, fairy dust and the 
//hopes and dreams of little children. Should any of these run out this site will
//break the internet
/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

var app = angular.module("AmaniDispatch",["ui.router"]);

   
app.config(function($stateProvider, 
					//$locationProvider,
					$urlRouterProvider){
    $urlRouterProvider.otherwise('/home');
	/*$locationProvider.html5Mode({
		enabled:true,
		requireBase:false
		
		});*/
	//$locationProvider.html5Mode(true);
	$stateProvider
        .state("home", {
        url:"/home",
        controller: "homeController",
        templateUrl: "views/home.php"
        })
		.state("aboutUs", {
        url:"/about",
        controller: "aboutUsController",
        templateUrl: "views/about.php"
        })
		.state("login", {
        url:"/login",
        controller: "loginController",
        templateUrl: "views/login.php"
        })
        .state("logins", {
        url:"/logins/{reguser}/{$regtoken}",
        controller: "loginController",
        templateUrl: "views/login.php"
        })
		.state("contact", {
        url:"/contact",		
        controller: "contactController",
        templateUrl: "views/mail.php"
        })
		.state("productsPage", {
        url:"/products/{cid}/{tcid}",
        controller: "productsPageController",
        templateUrl: "views/products.php"
        })
		.state("searchPage", {
        url:"/search/{produtcz}",
        controller: "searchPageController",
        templateUrl: "views/search.php"
		
        })
		
		

	
	})