<?php
//include 'connection.php';
include 'login_script.php';
if(isset($_SESSION['email'])){
		header('Location:dash.php');
	}

?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dashboard</title>
		
		<meta name="author" content="chemWiz developers" />
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- remove this if you use Modernizr -->
		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
	</head>
<body>
		<div class="container" >
			<header class="codrops-header">
				
				<h2 style="text-align:center">Please login....</h2>
				
			</header>
			<div class="content"  style="background:#000000; margin:0 auto; width:50%; padding:10%; align-content:center; text-align:center;">

			 <form method="post" >
				<div class="box">
                
					<input type="text" placeholder="Email" name="username" style="width:200px;
    display: inline-block;border: 1px solid transparent;
  border-radius: 4px;padding: 0.625rem 1.25rem;">		
                    		<br><br>

                
					<input type="password" class="pass" placeholder="Password" name="password" style="width:200px;
    display: inline-block;border: 1px solid transparent;
  border-radius: 4px;padding: 0.625rem 1.25rem;">
							<br><br>

           
					 <input type="submit" value="login" name="login"  style=" width: 200px;
     font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 0.625rem 1.25rem;
    color: #f1e5e6;
    background-color: #d3394c;
    display: inline-block;border: 1px solid transparent;
  border-radius: 4px;">
  <p style="color:#d3394c; text-transform:uppercase"><?php echo $error; ?></p><p><a href="#">forgot password?</a></p>
  </div>
  </form></div>
		</div><!-- /container -->

		<script src="js/custom-file-input.js"></script>

		<!-- // If you'd like to use jQuery, check out js/jquery.custom-file-input.js
		<script src="js/jquery-v1.min.js"></script>
		<script src="js/jquery.custom-file-input.js"></script>
		-->

</body>
</html>
