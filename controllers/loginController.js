// JavaScript Document

app.controller("loginController",function($scope, $http, $state){
	console.log("controller has been called");
	//variables
	$scope.signUpInfo = {
        fname: undefined,
        lname: undefined,
		username:undefined,
		email: undefined,
		phone: undefined,
		password: undefined
    }
	$scope.loginInfo = {
		username:undefined,
		password: undefined
    }
	
	$scope.productInfo = {
			cid: undefined,
			c: undefined,
			tcid:undefined,
			tc:undefined
		} 
		$scope.searchInfo = {
			product: undefined
			
		} 
		
		
		
		//functions
		// menu link function
		$scope.home=function(){
			$state.go("home");
			
			
		}
		$scope.aboutUs=function(){
            console.log("about");
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
	$scope.signUp=function(){
		console.log("function has been called");
		var data={
			fname:$scope.signUpInfo.Fname,
			lname:$scope.signUpInfo.Lname,
			username:$scope.signUpInfo.Username,
			email: $scope.signUpInfo.Email,
			phone: $scope.signUpInfo.Phone,
			password: $scope.signUpInfo.Password
			
		}
		console.log(data);
		$http.post("endpoints/create.php", data).success(function(response){
			//localStorage.setItem("email",JSON.stringify({email:response}));
			console.log(response);
			$(".user_response").html(JSON.parse(response));
			//$state.go("application");
			
		}).error(function(error){
			console.log(error);
			}) 
		
		};
	$scope.loginUser=function(){
		//console.log("login has been called");
		var data={
			username:$scope.loginInfo.username,
			password: $scope.loginInfo.password			
		}
		
		 $http.post("endpoints/login_script.php", data).success(function(response){
			//localStorage.setItem("email",JSON.stringify({email:response}));
			//console.log(response);
             
             for(var key in response){
                 if(response.hasOwnProperty(key))
                     if(key==="username"){
                        localStorage.setItem("username",response[key]);               
                     }
                    else if(key==="token"){
                        localStorage.setItem("token",response[key]);
                    }
                    else{
                        console.log(response);
                        $(".user_response").html(response);
                        break;
                    }
                 
             }
             if(localStorage.getItem("username")!=null && localStorage.getItem("username")!=undefined && localStorage.getItem("token")!=null && localStorage.getItem("token")!=undefined){
                $(".user_account").html(localStorage.getItem("username"));
                $(".usercart").html(localStorage.getItem("username")+"'s cart");
                $(".log_state").html('<a ng-click="logout()" style="cursor:pointer">Logout</a>');
                $state.go("home");
                location.reload();
               
            }
			//$(".user_response").html(JSON.stringify(response));
			//$state.go("application");
			
		}).error(function(error){
			console.log(error);
			}) 
		
		}
    
	//init
	
	
	
	
	})