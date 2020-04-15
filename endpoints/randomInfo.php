<?php
	require '../connection.php';
	$data = json_decode(file_get_contents("php://input"));
    $cid = $data->cid;
   // $c = $data->c;
	$tcid = $data->tcid;
	$output='';

	$selectcount=$connection->prepare("SELECT COUNT(name) FROM item");
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
					$newarraay=array_slice($numbers, 0,4);
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
						
						
							
							$output=$output.'<div class="col-md-3 w3ls_w3l_banner_left">
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
							}*/
						}
					
					}
					
					$output=$output.'<script>';
				
				$handle=fopen("cart.txt", "r");
        if($handle){
            while(($line=fgets($handle))!==false){
                //$lines=addslashes($line);
                $output=$output.$line;
            }
        }
        fclose($handle);
		$output=$output.'</script>';
		echo $output;
?>