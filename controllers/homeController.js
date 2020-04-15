// JavaScript Document

app.controller("homeController",function($scope, $http, $state){
	//variables
	//console.log("hi");
	/*if(localStorage.getItem("username")===undefined ||localStorage.getItem("username")===null ||localStorage.getItem("username").length==0 ){
		document.getElementById("checkoutbutton").style.visibility = "hidden";
		console.log("hidden");
		}
	if( localStorage.getItem("shoppingCart")===undefined ||localStorage.getItem("shoppingCart")===null || localStorage.getItem("shoppingCart").length==0){
		document.getElementById("checkoutbutton").style.visibility = "hidden";
		console.log("hidden2");
		}
	else{
		document.getElementById("checkoutbutton").style.visibility = "visible";
		console.log("visible");
		}*/
		if(localStorage.getItem("username")===null){
		document.getElementById("checkoutbutton").style.visibility = "hidden";
		//console.log("clearly not logged in");
		}
		else{
			document.getElementById("checkoutbutton").style.visibility = "visible";
			//console.log("logged in");
			}
		
	
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
    $scope.logout=function(){
			//$state.go("login");
			localStorage.clear();
            console.log("logout");
            location.reload();
			
		}
	//product link functions
	$scope.products=function(){
		var data={
			cid: $scope.productInfo.cid,
			c:   $scope.productInfo.c,
			tcid:$scope.productInfo.tcid,
			tc:  $scope.productInfo.tc
			
			}
			console.log(data);
		        /* $http.post("endpoints/productInfo.php", data).success(function(response){
					localStorage.setItem("p",JSON.stringify(response));
					console.log(response);
					
					
					}).error(function(error){
						console.log(error);
						})
		 */
		};
	//init
	
	//product link functions
	productrandoms=function(){
		var data={
			cid: 4,
			
			tcid:1
		
			
			}
			//console.log(data);
		         $http.post("endpoints/randomInfo.php", data).success(function(response){
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
                     //console.log(response);
					 //console.log("hi");
					
					
					}).error(function(error){
						console.log(error);
				
				})
		 
	};
    productrandoms();
	
	
	
	})