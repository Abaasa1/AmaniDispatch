<?php
if (session_status() == PHP_SESSION_NONE || session_id() == '') {
    session_start();
}
require '../connection.php';

?>

<script type="text/javascript">




	$prodOutput="<br><?php";
	$prodOutput+="echo";
	$prodOutput+=localStorage.getItem("p");
	
	$prodOutput+="; ?>";
	/*var p=localStorage.getItem("p");
	if (p === null || p === undefined){
		localStorage.setItem("p",JSON.stringify("This catalogue is currently empty"));
	}
	$(".productDiv").html(JSON.parse(localStorage.getItem("p")));*/


</script>
		<div class="w3l_banner_nav_right">
			<div class="w3l_banner_nav_right_banner7">
				<!--<h3>Best Deals For New Products<span class="blink_me"></span></h3>-->
			</div>
			<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub productDiv">
				<h3><?php// echo $tcname.' '.$productname;?></h3>
                <?php
				//$sqla = 'SELECT id,name FROM type_of_item WHERE category_id='.$cid.'';
				//$resulta = $connection->query($sqla);
				//$resulta=$connection->prepare("SELECT id,name FROM type_of_item WHERE category_id= ?");
				//$resulta->bind_param("d",$cid);
				//$resulta->execute();
				//$resulta->bind_result($id,$name);
				//$resulta->store_result();
				
				//if ($resulta->num_rows > 0) {
					// output data of each row
					//while($resulta->fetch()) {
						//echo 'id: ' . $rowa["id"]. ' - Name: ' . $rowa["name"]. '<br>';
						//$currpid=$id;
						//$sqld = 'SELECT id,name,description,price,image_name FROM item WHERE type_id='.$currpid;
						//$resultd = $connection->query($sqld);
						//if ($resultd->num_rows > 0) {
					// output data of each row
					//echo'<div class="w3ls_w3l_banner_nav_right_grid1">
					//<h6>' . $name. '</h6>
					
					//';
					// while($rowd = $resultd->fetch_assoc()) {
						// $replaced=str_replace('"',"&quot;",$rowd["name"]);
						// $replaced=str_replace("'","&#39;",$replaced);
						// $nodoublequotes=str_replace('"',"",$rowd["name"]);
						// $nosinglequotes=str_replace("'","",$nodoublequotes);
						// $noamp=str_replace("&","",$nosinglequotes);
						// $nospace=str_replace(" ","",$noamp);
						// $noleftbrackets=str_replace("(","",$nospace);
						// $norightbracket=str_replace(")","",$noleftbrackets);
						// echo'<div class="col-md-3 w3ls_w3l_banner_left">
						// <div class="hover14 column">
						// <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							// <div class="agile_top_brand_left_grid_pos">
								// <img src="images/offer.png" alt=" " class="img-responsive" />
							// </div>
							// <div class="agile_top_brand_left_grid1">
								// <figure>
									// <div class="snipcart-item block">
										// <div class="snipcart-thumb">
											// <a><img src="dash/uploads/'.$rowd["image_name"].'" alt=" " class="img-responsive" /></a>
											// <p>'. $rowd["name"].'</p>
											// <h4>UGX '.$rowd["price"].' </h4>
										// </div>
										// <br>
										// <div class="cart-add" style="text-align: center; margin: 1.5em auto 1em; width:77%">
										// <div id="'.$norightbracket.'"></div>
										// <a class="add-to-cart button" 
											// style="font-size: 14px;
    										// color: #fff;
											// background: #FA1818;
											// text-decoration: none;
											// display:block
											// position: relative;
											// border: none;
											// border-radius: 0;
											// width: 100%;
											// text-transform: uppercase;
											// padding: .9em .9em;
											// outline: none;" href="a" data-name="'.$replaced.'" data-price="'.$rowd["price"].'">Add to cart</a>
										// </div>
										
									// </div>
								// </figure>
							// </div>
						// </div>
						// </div>
					// </div>';
					
						//echo 'itemid: ' . $rowd["id"]. ' - Name: ' . $rowd["name"]. '<br>';
						
						
					// }mysqli_free_result($resultd);echo'<div class="clearfix"> </div>
				// </div>';
				// } else {
					//echo '0 results<br>';
				// }												

					// }$resulta->close();
				// } else {
					// echo 'The catalogue for this is being updated <br>';
				// }

				?>
                
                
				<div class="clearfix"> </div>
                <br>
<!-- //banner -->
</div>
<!--</div>
<div class="clearfix"> </div>
</div>
</div>--><!-- footer --></div>
	<div class="clearfix"> </div><div class="footer">
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



