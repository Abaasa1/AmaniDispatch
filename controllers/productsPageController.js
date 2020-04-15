// JavaScript Document

app.controller("productsPageController",function($scope, $http, $state, $stateParams){
	//variables
   // $(".productDiv").html(JSON.parse(localStorage.getItem("p")));
    var cid=$stateParams.cid;
    var tcid=$stateParams.tcid;
   // console.log("the category id is: "+cid);
    //console.log("the tcategory id is: "+tcid);
	 $scope.productInfo = {
        cid: undefined,
        c: undefined,
		tcid:undefined,
		tc:undefined
    } 
	
	
	
	//functions
	// menu link function
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
	//product link functions
	products=function(){
		var data={
			cid: cid,
			
			tcid:tcid
		
			
			}
			//console.log(data);
		         $http.post("endpoints/productInfo.php", data).success(function(response){
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
                    $(".productDiv").html(response);
				        //localStorage.setItem("p",response);
                     //$(".productDiv").html(JSON.parse(localStorage.getItem("p")));
                    // console.log(response);
					
					
					}).error(function(error){
						console.log(error);
				
				})
		 
	};
    products();
	/* $scope.$on('$viewContentLoaded', function(){
		console.log(localStorage.getItem("product"));
	}); */
	
	//init
	
	
	
	
	
	});
	

