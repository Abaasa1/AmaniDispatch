<?php
if (session_status() == PHP_SESSION_NONE || session_id() == '') {
    session_start();
}
include '../connection.php';

/* if(isset($_SESSION['username'])){
	header('Location: index.php');
	}
 */






?>

		
		<div class="w3_login">
		<div class="user_response"	style="color:#ff0000; position:relative;  margin-left:37%; font-size:30px">
			<font color="#000" size="40px" style=" margin-left:0;">Sign In & Sign Up</font>
		
		</div>
		<h3 style="text-align:center"></h3>
			<!--<h2 class="myh2" style="text-align:center; line-height:2">Sign In & Sign Up</h2>
			<h3 style="text-align:center"></h3>-->
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i  style="line-height:2" class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
					<h2>Login to your account</h2>
					<form >
					  <input type="text" name="username" placeholder="Username" ng-model="loginInfo.username" required>
					  <input type="password" name="password" placeholder="Password" ng-model="loginInfo.password" required>
					  <input type="submit" value="Login" ng-click="loginUser()">
					</form>
				  </div>
				  <div class="form">
					<h2>Create an account</h2>
					<form>
                      <input type="text" ng-model="signUpInfo.Fname" name="Fname" placeholder="First name" >
                      <input type="text" ng-model="signUpInfo.Lname" name="Lname" placeholder="Last name" >
                      <input type="text" ng-model="signUpInfo.Username" name="Username" placeholder="User name" >				  
					  <input type="email" ng-model="signUpInfo.Email" name="Email" placeholder="Email Address" >
					  <input type="password" ng-model="signUpInfo.Password" name="Password" placeholder="Password" >
					  <input type="text" ng-model="signUpInfo.Phone" name="Phone" placeholder="Phone Number" >
					  <input type="submit" value="Register" ng-click="signUp()">
					</form>
				  </div>
				  <div class="cta"><a href="#">Forgot your password?</a></div>
				</div>
			</div>
			
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>
<!-- //login -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- newsletter-top-serv-btm -->
	<div class="newsletter-top-serv-btm">
		<div class="container">
			<div class="col-md-4 wthree_news_top_serv_btm_grid">
				<div class="wthree_news_top_serv_btm_grid_icon">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
				</div>
				<h3>Nam libero tempore</h3>
				<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus 
					saepe eveniet ut et voluptates repudiandae sint et.</p>
			</div>
			<div class="col-md-4 wthree_news_top_serv_btm_grid">
				<div class="wthree_news_top_serv_btm_grid_icon">
					<i class="fa fa-bar-chart" aria-hidden="true"></i>
				</div>
				<h3>officiis debitis aut rerum</h3>
				<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus 
					saepe eveniet ut et voluptates repudiandae sint et.</p>
			</div>
			<div class="col-md-4 wthree_news_top_serv_btm_grid">
				<div class="wthree_news_top_serv_btm_grid_icon">
					<i class="fa fa-truck" aria-hidden="true"></i>
				</div>
				<h3>eveniet ut et voluptates</h3>
				<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus 
					saepe eveniet ut et voluptates repudiandae sint et.</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //newsletter-top-serv-btm -->

<!-- footer -->
	<div class="footer">
		<div class="container">
						<div class="clearfix"> </div>
			
				<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
					<div class="w3_footer_grid_bottom">
						<h5>connect with us</h5>
						<ul class="agileits_social_icons">
							<li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			
		</div>
	</div>
    <script type="text/javascript">
   
        /*if(localStorage.getItem("username")!=null && localStorage.getItem("username")!=undefined && localStorage.getItem("token")!=null && localStorage.getItem("token")!=undefined){
            $(".user_account").html(localStorage.getItem("username"));
            $(".usercart").html(localStorage.getItem("username")+"'s cart");
            $(".log_state").html('<a ng-click="logout()" style="cursor:pointer">Logout</a>');
           // location.reload();
        }*/
        function mylogout(){
            localStorage.clear();
            location.reload();
        }
    </script>
<!-- //footer -->
