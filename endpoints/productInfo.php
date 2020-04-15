<?php
	require '../connection.php';
	$data = json_decode(file_get_contents("php://input"));
    $cid = $data->cid;
   // $c = $data->c;
	$tcid = $data->tcid;
   // $tc = $data->tc;
	//$prodarray=array('cid'=>$cid, 'c'=>$c, 'tcid'=>$tcid, 'tc'=>$tc);
	$prodOurput="";
	$itemOutput="";
	$resulttc=$connection->prepare("SELECT image FROM type_of_category WHERE id= ?");
	$resulttc->bind_param("d",$tcid);
	if($resulttc->execute()){
		$resulttc->bind_result($tcimage);
		$resulttc->store_result();
		$tcrows=$resulttc->num_rows;
		if($resulttc->num_rows>0){
			while($resulttc->fetch()) {
				$prodOurput="
				<style>
					.w3l_banner_nav_right_banner7{
					background:url(dash/uploads/".$tcimage.") no-repeat 0px 0px;
					background-size:cover;
					-webkit-background-size:cover;
					-moz-background-size:cover;
					-o-background-size:cover;
					-ms-background-size:cover;
					}
				</style>
				";
				}
			}
		}
	$resulta=$connection->prepare("SELECT id,name FROM type_of_item WHERE category_id= ?");
	$resulta->bind_param("d",$cid);
	if($resulta->execute()){
		$resulta->bind_result($id,$name);
		$resulta->store_result();
		$prodrows=$resulta->num_rows;
		if($resulta->num_rows>0){
			//echo json_encode("<br>it executed: $prodrows");
			$prodOurput=$prodOurput."";
			// output data of each row
			while($resulta->fetch()) {
				//echo 'id: ' . $rowa["id"]. ' - Name: ' . $rowa["name"]. '<br>';
				$currpid=$id;
				$sqld = 'SELECT id,name,description,price,image_name FROM item WHERE type_id='.$currpid;
				$resultd = $connection->query($sqld);
				if ($resultd->num_rows > 0) {
					$itemOutput=$itemOutput."<div class='w3ls_w3l_banner_nav_right_grid1'>
					<h6>" . $name. "</h6>";
					while($rowd = $resultd->fetch_assoc()) {
						$replaced=str_replace('"',"&quot;",$rowd["name"]);
						$replaced=str_replace("'","&#39;",$replaced);
						$nodoublequotes=str_replace('"',"",$rowd["name"]);
						$nosinglequotes=str_replace("'","",$nodoublequotes);
						$noamp=str_replace("&","",$nosinglequotes);
						$nospace=str_replace(" ","",$noamp);
						$noleftbrackets=str_replace("(","",$nospace);
						$norightbracket=str_replace(")","",$noleftbrackets);
						
						$itemOutput=$itemOutput.'<div class="col-md-3 w3ls_w3l_banner_left">
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
					$itemOutput=$itemOutput.'<div class="clearfix"> </div>
				</div>
                ';
					
				}
				
			}
			
		}
		else{
			$prodOurput=$prodOurput."This catalogue is currently empty";
		}
	}
	$prodOurput=$prodOurput.$itemOutput.'</div><div class="clearfix"> </div>
				</div>
                <script>
               ';
//$handle='';
        $handle=fopen("cart.txt", "r");
        if($handle){
            while(($line=fgets($handle))!==false){
                //$lines=addslashes($line);
                $prodOurput=$prodOurput.$line;
            }
        }
        fclose($handle);
	echo $prodOurput;
	
	// else(
		// echo json_encode("it executed");
	// )
	
	//$resulta->bind_result($id,$name);
	//$resulta->store_result();

	
	// <h3><?php echo $tcname.' '.$productname</h3>
                // 
				//$sqla = 'SELECT id,name FROM type_of_item WHERE category_id='.$cid.'';
				//$resulta = $connection->query($sqla);
				// $resulta=$connection->prepare("SELECT id,name FROM type_of_item WHERE category_id= ?");
				// $resulta->bind_param("d",$cid);
				// $resulta->execute();
				// $resulta->bind_result($id,$name);
				// $resulta->store_result();
				
				// if ($resulta->num_rows > 0) {
					//output data of each row
					// while($resulta->fetch()) {
					//	echo 'id: ' . $rowa["id"]. ' - Name: ' . $rowa["name"]. '<br>';
						// $currpid=$id;
						// $sqld = 'SELECT id,name,description,price,image_name FROM item WHERE type_id='.$currpid;
						// $resultd = $connection->query($sqld);
						// if ($resultd->num_rows > 0) {
					//output data of each row
					// echo'<div class="w3ls_w3l_banner_nav_right_grid1">
					// <h6>' . $name. '</h6>
					
					// ';
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

				// 
                
				// <div class="clearfix"> </div>
                // <br>
	//echo json_encode($prodarray);

?>