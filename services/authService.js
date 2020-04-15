app.service("AuthenticationService",["$http","$state",function($http, $state){
    var self = this;
    self.checkToken=function(token,username){
        var data={
            token:token,
            username:username,
        };
        
        $http.post("endpoints/checkToken.php",data).success(function(response){
            console.log(response);
            if(response == "unauthorised"){
                $http.post("endpoints/logout.php", data).success(function(responses){
                    localStorage.clear();
                    //console.log("logout");
                    console.log(responses);
                    location.reload();
                   // console.log(response);
                }).error(function(errors){
                    console.log(errors);
                });
 
               
            }
            else{
                return response;    
            }
             
        }).error(function(error){
            console.log(error);
        });
        
    }
    
}]);