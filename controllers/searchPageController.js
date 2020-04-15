app.controller("searchPageController", function ($scope, $http, $state, $stateParams){
	//variables
    var produtcz=$stateParams.produtcz;
    //console.log("the query is for: "+produtcz);
	
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
	
	search=function(){
		var data={
			produtcz: produtcz
		
			
			}
			//console.log(data);
		         $http.post("endpoints/searchInfo.php", data).success(function(response){
					//localStorage.setItem("p",JSON.stringify(response));
					//$(".productDiv").html(JSON.parse(response);
                     /*var p=localStorage.getItem("p");
                        if (p === null || p === undefined){
                            localStorage.setItem("p",JSON.stringify("This catalogue is currently empty"));
                        }
                     else{
                          localStorage.setItem("p", response);
                     }*/
                     //$state.go("productsPage",{cid:cid})
                    $(".searchDiv").html(response);
				        //localStorage.setItem("p",response);
                     //$(".productDiv").html(JSON.parse(localStorage.getItem("p")));
                    // console.log(response);
					
					
					}).error(function(error){
						console.log(error);
				
				})
		 
	};
    search();
	//init
	
	
	
	
	})