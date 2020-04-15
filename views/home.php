<?php
require '../connection.php';
$numbers;
//function U
?>

		<div class="w3l_banner_nav_right">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_nav_right_banner">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
<!--									<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
-->								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner1">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<!--<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>-->
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner2">
								<h3>upto <i>50%</i> off.</h3>
								<div class="more">
									<!--<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
-->								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				//console.log("only runs on page load");
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
				function loadOutsideRefresh(){
				//console.log("only runs on page not load");
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				};
				loadOutsideRefresh();
			
			  </script>
			<!-- //flexSlider -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- banner -->
	<div class="banner_bottom">
			<div class="wthree_banner_bottom_left_grid_sub">
			</div>
			<div class="wthree_banner_bottom_left_grid_sub1">
				<div class="col-md-4 wthree_banner_bottom_left">
					<div class="wthree_banner_bottom_left_grid">
						<img src="images/4.jpg" alt=" " class="img-responsive" />
						<div class="wthree_banner_bottom_left_grid_pos">
							<h4>Discount Offer <span>25%</span></h4>
						</div>
					</div>
				</div>
				<div class="col-md-4 wthree_banner_bottom_left">
					<div class="wthree_banner_bottom_left_grid">
						<img src="images/5.jpg" alt=" " class="img-responsive" />
						<div class="wthree_banner_btm_pos">
							<h3>introducing <span>best store</span> for <i>groceries</i></h3>
						</div>
					</div>
				</div>
				<div class="col-md-4 wthree_banner_bottom_left">
					<div class="wthree_banner_bottom_left_grid">
						<img src="images/6.jpg" alt=" " class="img-responsive" />
						<div class="wthree_banner_btm_pos1">
							<h3>Save <span>Upto</span> UGX10,000</h3>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
	</div>
<!-- top-brands -->
	<div class="top-brands" ng-controller="homeController">
		<div class="container">
			<h3>Hot Offers</h3>
			<div class="agile_top_brands_grids">
            <?php
				/*$selectcount=$connection->prepare("SELECT COUNT(name) FROM item");
				//$selectcount->bind_param("d",$rownum);
				if($selectcount->execute()){
					$selectcount->bind_result($rownum);
					$selectcount->store_result();
					while($selectcount->fetch()) {
						//echo $rownum;
						$numbers=range(1,$rownum-1);
						shuffle($numbers);
						
					}
					//print_r($numbers);
					$newarraay=array_slice($numbers, 2);
					foreach($newarraay as $values){
						$randomNo=$values;
						$selectrandom = 'SELECT id,name,description,price,image_name FROM item LIMIT '.$randomNo.', 1' ;
						$resultrandom = $connection->query($selectrandom);
						if ($resultrandom->num_rows > 0) {
							while($rowd = $resultrandom->fetch_assoc()) {
						$replaced=str_replace('"',"&quot;",$rowd["name"]);
						$replaced=str_replace("'","&#39;",$replaced);
						$nodoublequotes=str_replace('"',"",$rowd["name"]);
						$nosinglequotes=str_replace("'","",$nodoublequotes);
						$noamp=str_replace("&","",$nosinglequotes);
						$nospace=str_replace(" ","",$noamp);
						$noleftbrackets=str_replace("(","",$nospace);
						$norightbracket=str_replace(")","",$noleftbrackets);
						
						
							
							echo '<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a><img src="dash/uploads/'.$rowd["image_name"].'" alt=" " class="img-responsive" /></a>
											<p>'. $rowd["name"].'<br><span style="font-size:12px"><i>'. $rowd["description"].'</i></span><br><b>UGX '.number_format($rowd["price"]).'</b> </p>
										</div>
										<div class="cart-add" style="text-align: center; margin: 1.5em auto 1em; width:77%">
										<div id="'.$norightbracket.'"></div>
										<button class="add-to-cart button" 
											style="font-size: 14px;
    										color: #fff;
											background: #FA1818;
											text-decoration: none;
											display:block
											position: relative;
											border: none;
											border-radius: 0;
											width: 100%;
											text-transform: uppercase;
											padding: .9em .9em;
											outline: none;  href="a" data-name="'.$replaced.'" data-price="'.$rowd["price"].'" cursor:pointer"  >Add to cart</button>
										</div>
										
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>';
					
							
						
					//$prodOurput=$prodOurput.$itemOutput;
					}
							}
						
						/*$selectrandom=$connection->prepare("id,name,description,price,image_name FROM item LIMIT 1 OFFEST ?");
						$selectrandom->bind_param("d",$randomNo);
						if($selectrandom->execute()){
							$selectrandom->bind_result($values);
							$selectrandom->store_result();
							if($selectrandom->num_rows>0){
								while($selectrandom->fetch()) {
									//echo $rownum;
									//$numbers=range(1,$rownums);
									//shuffle($rownums);
									echo'yey';
									
								}
							}
						}
					
					}
					
					
				}
				$handle=fopen("cart.txt", "r");
        if($handle){
            while(($line=fgets($handle))!==false){
                //$lines=addslashes($line);
                echo '<script>'.$line.'</script>';
            }
        }
        fclose($handle);*/
			?>
            <div class="productDiv"></div>
            
				<!--<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="tag"><img src="images/tag.png" alt=" " class="img-responsive" /></div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb">
											<a href="single.html"><img title=" " alt=" " src="images/1.png" /></a>		
											<p>fortune sunflower oil</p>
											<h4>UGX17,000 <span>UGX20,000</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
													<input type="hidden" name="amount" value="7.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb">
											<a href="single.html"><img title=" " alt=" " src="images/3.png" /></a>		
											<p>basmati rise (5 Kg)</p>
											<h4>UGX12,000 <span>UGX15,000</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="basmati rise" />
													<input type="hidden" name="amount" value="11.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="images/2.png" alt=" " class="img-responsive" /></a>
											<p>Pepsi soft drink (2 Ltr)</p>
											<h4>UGX8,000 <span>UGX10,000</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Pepsi soft drink" />
													<input type="hidden" name="amount" value="8.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>-->
				<!--<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="images/4.png" alt=" " class="img-responsive" /></a>
											<p>dogs food (4 Kg)</p>
											<h4>UGX9,000 <span>UGX11,000</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="dogs food" />
													<input type="hidden" name="amount" value="9.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>-->
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //top-brands -->


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
	