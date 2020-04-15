<?php
require 'connection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" ng-app="AmaniDispatch">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Amani Dispatch, Online Shopping, Online Uganda Shop, Delivery in Uganda" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/sty.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>


<title>AmaniDispatch</title>
</head>

<body>
	
	<!-- header -->
	<div class="agileits_header">
		
		<div class="w3l_search">
			<form ng-controller="menuController">
				<input type="text" name="Product" ng-model="searchInfo.product" placeholder="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required>
				<input type="submit" value=" " ng-click="search()">
			</form>
		</div>
		<div class="product_list_header">  
			<!--<form action="#" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" value="View your cart" class="button" />
                </fieldset>
                
            </form>-->
            <button data-toggle="modal" data-target="#myModal" style="color: #fff;font-size: 14px;outline: none;text-transform: capitalize;padding: .5em 2.5em .5em 1em;border: 1px solid rgba(255,0,0,1);margin: .35em 0 0;background: url(images/cart.png) no-repeat 116px 9px;">View your cart</button>
            <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align:center">
				<div class='usercart'>Guest's cart</div>
        </h4>
      </div>
      <div  class="modal-body">
        <div class="cart-body">
             <ul id="show-cart">
                    
              </ul>
         </div>
         <div>
              Total is <span style="color:rgba(0,0,0,1)" id="total-cart">0</span>
          </div>
      </div>
      <div class="modal-footer" ng-controller="menuController">
      	<button id="checkoutbutton"class="check-cart btn btn-default" style="float:left" ng-click="checkout()">Check out</button>
        <button class="clear-cart btn btn-cart">Clear Cart</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
		</div>
       
		<div class="w3l_header_right">
			<ul>
            
				<li class="dropdown profile_details_drop">
                
					<!--<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								
								
							</ul>
						</div>                  
					</div>	-->
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1" ng-controller="menuController">
			<h2><a ng-click="contact()" style="cursor:pointer">Contact Us</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
	<div class="logo_products" ng-controller="menuController">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a ng-click="home()" style="cursor:pointer"><img src="images/Amani_concept2.png" class="img-responsive"></a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a ng-click="home()" style="cursor:pointer">Home</a><i>/</i></li>
					<li><a ng-click="aboutUs()" style="cursor:pointer">About Us</a><i>/</i></li>
					<li><a ng-click="contact()" style="cursor:pointer">Contact Us</a><i>/</i></li>
					<li class="log_state"><a ng-click="login()" style="cursor:pointer">Login</a></li>
							
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
					<li class="user_account">
								Guest Account
								
							
						
                        </li>
                    
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
                    <?php
                    for($i=0;$i<$typecategorysize;$i++){
						$typecategoryIds=$typecategoryId[$i];
						echo'
						
						<li class="dropdown">
							<a style="cursor:pointer" class="dropdown-toggle" data-toggle="dropdown">'.$typecategoryName[$i].'<span class="caret"></span></a>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
										';
										//$sql = 'SELECT id,name FROM category WHERE category_type_id='.$typecategoryId[$i].'';
										//$result = $connection->query($sql);
										$result=$connection->prepare("SELECT id,name FROM category WHERE category_type_id= ?");
										$result->bind_param("d",$typecategoryIds);
										$result->execute();
										$result->bind_result($currId,$currName);
										$result->store_result();
										if ($result->num_rows > 0) {
										// output data of each row
											while($result->fetch()) {
												//$currId=$row["id"];
												//$currName=$row["name"];
												//$currName=str_replace(' ','&nbsp', $currName);
												$currNameNoSpace=str_replace(' ','', $currName);
												$tcn=$typecategoryName[$i];
												$tcn=str_replace(' ','&nbsp', $tcn);
												//echo'<li><a href="products.php?cid='.$currId.'&c='.$currName.'&tcid='.$typecategoryId[$i].'&tc='.$typecategoryName[$i].'">'.$currName.'</a></li>';
												echo'<li>
															<div>
																<a ui-sref="productsPage({cid:'.$currId.',tcid:'.$typecategoryId[$i].'})"style="cursor:pointer">'.$currName.'</a>
												            </div>
													</li>';
												
											}
													
										
										
										}
										
										
										/*for($j=0;$j<$categorysize;$j++){
											echo'<li><a href="products.php?cid='.$categoryId[$j].'&tcid='.$typecategoryId[$i].'">'.$categoryName[$j].'</a></li>';
											}*/
									echo'
										
		
									</ul>
								</div>                  
							</div>	
						</li>
						';
						}
					echo'';
					
					?>					
									
						
						<!--<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Beverages<span class="caret"></span></a>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
										<li><a href="drinks.html">Soft Drinks</a></li>
										<li><a href="drinks.html">Juices</a></li>
									</ul>
								</div>                  
							</div>	
						</li>-->
						
						<!--<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Frozen Foods<span class="caret"></span></a>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
										<li><a href="frozen.html">Frozen Snacks</a></li>
										<li><a href="frozen.html">Frozen Nonveg</a></li>
									</ul>
								</div>                  
							</div>	
						</li>-->
						
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
	<div ui-view>

	</div>
	<script type="text/javascript">
   
        if(localStorage.getItem("username")!=null && localStorage.getItem("username")!=undefined && localStorage.getItem("token")!=null && localStorage.getItem("token")!=undefined){
            $(".user_account").html(localStorage.getItem("username"));
            $(".usercart").html(localStorage.getItem("username")+"'s cart");
            $(".log_state").html('<a ng-click="logout()" style="cursor:pointer">Logout</a>');

        }
        function mylogout(){
            //console.log("yo");
            localStorage.clear();
            location.reload();
        }

    </script>
	<script src="js/angular.min.js"></script>
	<script src="js/angular-ui-router.js"></script>
	<script src="app.js"></script>
    <script src="services/authService.js"></script>
	<?php
	echo'<script type="text/javascript">
		app.controller("menuController",function($scope, $http, $state, AuthenticationService){
        AuthenticationService.checkToken(localStorage.getItem("token"), localStorage.getItem("username"));
		//variables
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
		
		 divObj = document.getElementById("total-cart");
		$scope.checkout=function(){
			//$state.go("login");
            var data={
			username:localStorage.getItem("username"),
			cart:localStorage.getItem("shoppingCart"),
			total:divObj.innerText
			
			
		}
		console.log(data);
		$http.post("endpoints/checkout.php", data).success(function(response){
            	localStorage.setItem("shoppingCart",null);

			$("#show-cart").html(response);
            //console.log("logout");
            //location.reload();
           console.log(response);
        }).error(function(error){
            console.log(error);
        })
			
			
		}
		$scope.login=function(){
			$state.go("login");
			
			
		}
        $scope.logout=function(){
			//$state.go("login");
            var data={
			username:localStorage.getItem("username"),
			token:localStorage.getItem("token"),
			
			
		}
		console.log(data);
		$http.post("endpoints/logout.php", data).success(function(response){
            localStorage.clear();
			id="show-cart"
            //console.log("logout");
            location.reload();
           // console.log(response);
        }).error(function(error){
            console.log(error);
        })
			
			
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
			}
			
		$scope.search=function(){
			var data={
				product: $scope.searchInfo.product
				
				}
				//console.log(data);
				$state.go("searchPage", {"produtcz":$scope.searchInfo.product});
			 
			}
		//init
		
		
		
		
		})
	
	</script>';
	
	echo'<script type="text/javascript">
		app.controller("checkoutPageController",function($scope, $http, $state){
		//variables
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
		$scope.checkout=function(){
			//$state.go("login");
			console.log("here");
			
			
		}
        $scope.logout=function(){
			//$state.go("login");
            var data={
			username:localStorage.getItem("username"),
			token:localStorage.getItem("token"),
			
			
		}
		console.log(data);
		$http.post("endpoints/logout.php", data).success(function(response){
            localStorage.clear();
            //console.log("logout");
            location.reload();
           // console.log(response);
        }).error(function(error){
            console.log(error);
        })
			
			
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
			}
			
		$scope.search=function(){
			var data={
				product: $scope.searchInfo.product
				
				}
				//console.log(data);
				$state.go("searchPage", {"produtcz":$scope.searchInfo.product});
			 
			}
		//init
		
		
		
		
		})
	
	</script>';
	
	
	
	
	?>
	
	<script src="controllers/homeController.js"></script>
	<script src="controllers/aboutUsController.js"></script>
	<script src="controllers/loginController.js"></script>
	<script src="controllers/productsPageController.js"></script>
    <script src="controllers/searchPageController.js"></script>
	<script src="controllers/contactController.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<script>
    $(document).ready(function(){
        $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                $(this).toggleClass('open');        
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                $(this).toggleClass('open');       
            }
        );
    });
    </script>
    <!-- here stars scrolling icon -->
        <script type="text/javascript">
            $(document).ready(function() {
                /*
                    var defaults = {
                    containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear' 
                    };
                */
                                    
                $().UItoTop({ easingType: 'easeOutQuart' });
                                    
                });
        </script>
    <!-- //here ends scrolling icon -->
   <script src="js/cart.js"></script>
</body>
</html>
