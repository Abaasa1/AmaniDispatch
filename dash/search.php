<?php
include 'connection.php';
if(!isset($_SESSION['email'])){
	header('Location: index.php');
	}


$product='';
if(isset($_POST['Product'])){
	$product=$_POST['Product'];
	$unstripped=$product;
	$product=stripslashes($product);
	$product=mysqli_real_escape_string($connection,$product);
	}




?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>

        <!-- Vendor CSS -->
        <link href="css/fullcalendar.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link href="css/sweetalert2.min.css" rel="stylesheet">
        <link href="css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        <link href="../css/sty.css" rel="stylesheet">

        <!-- CSS -->
        <link href="css/app_1.min.css" rel="stylesheet">
        <link href="css/app_2.min.css" rel="stylesheet">

    </head>
    <body>
        <header id="header" class="clearfix" data-ma-theme="blue">
            <ul class="h-inner">
                <li class="hi-trigger ma-trigger" data-ma-action="sidebar-open" data-ma-target="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>

                <li class="hi-logo hidden-xs">
                    <a href="dash.php">Dashboard</a>
                </li>
                <li class="pull-right">
                    <ul class="hi-menu">

                        <li data-ma-action="search-open">
                            <a href=""><i class="him-icon zmdi zmdi-search"></i></a>
                        </li>
                     </ul>
				</li>
               
            </ul>

            <!-- Top Search Content -->
            <div class="h-search-wrap">
                <div class="hsw-inner">
                    <i class="hsw-close zmdi zmdi-arrow-left" data-ma-action="search-close"></i>
                    <form action="search.php" method="post" >
                    <input type="text" name="Product">
                    </form>
                </div>
            </div>
        </header>

        <section id="main">
            <aside id="sidebar" class="sidebar c-overflow">
            
                <div class="s-profile">
                    <a href="" data-ma-action="profile-menu-toggle">
                        <div class="sp-pic">
                            <img src="images/1.jpg" alt="">
                        </div>

                        <div class="sp-info">
                            <?php echo $_SESSION['FNAME']; ?>

                            <i class="zmdi zmdi-caret-down"></i>
                        </div>
                    </a>

                    <ul class="main-menu">
                        
                        <li>
                            <a href="logout.php"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                        </li>
                    </ul>
                </div>

                
            </aside>

            <aside id="chat" class="sidebar">

                <div class="chat-search">
                    <div class="fg-line">
                        <input type="text" class="form-control" placeholder="Search People">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                </div>

                <div class="lg-body c-overflow">
                    <div class="list-group">
                        <a class="list-group-item media" href="">
                            <div class="pull-left p-relative">
                                <img class="lgi-img" src="images/2.jpg" alt="">
                                <i class="chat-status-busy"></i>
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Jonathan Morris</div>
                                <small class="lgi-text">Available</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="">
                            <div class="pull-left">
                                <img class="lgi-img" src="images/1.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">David Belle</div>
                                <small class="lgi-text">Last seen 3 hours ago</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="">
                            <div class="pull-left p-relative">
                                <img class="lgi-img" src="images/3.jpg" alt="">
                                <i class="chat-status-online"></i>
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Fredric Mitchell Jr.</div>
                                <small class="lgi-text">Availble</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="">
                            <div class="pull-left p-relative">
                                <img class="lgi-img" src="images/4.jpg" alt="">
                                <i class="chat-status-online"></i>
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Glenn Jecobs</div>
                                <small class="lgi-text">Availble</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="">
                            <div class="pull-left">
                                <img class="lgi-img" src="images/5.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Bill Phillips</div>
                                <small class="lgi-text">Last seen 3 days ago</small>
                            </div>
                        </a>

                        <a class="list-group-item media" href="">
                            <div class="pull-left">
                                <img class="lgi-img" src="images/6.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lgi-heading">Wendy Mitchell</div>
                                <small class="lgi-text">Last seen 2 minutes ago</small>
                            </div>
                        </a>
                    </div>
                </div>
            </aside>

            <section id="content">
                

                    <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
				<h3><?php echo 'search results for '.$unstripped;?></h3>
                <?php
				
						
						//echo 'id: ' . $rowa["id"]. ' - Name: ' . $rowa["name"]. '<br>';
						
						//$sqld = 'SELECT * FROM item WHERE name LIKE "%'.$product.'%"';
						$resultd = $connection->prepare("SELECT id,name, image_name, price FROM item WHERE name LIKE ?");
						$resultd->bind_param("s",$productz);
						$productz="%".$product."%";
						//$resultd->fetch();
						/* bind result variables */
						$resultd->execute();
    					$resultd->bind_result($searchid,$searchname, $searchimage, $searchprice);
						//$resultd->fetch();
						$resultd->store_result();
						if($resultd->num_rows>0){
							
							/* fetch values */
					
    					while ($resultd->fetch()) {
							//echo $resultd->num_rows;
							$nodoublequotes=str_replace('"',"",$searchname);
							$nosinglequotes=str_replace("'","",$nodoublequotes);
							$noamp=str_replace("&","",$nosinglequotes);
							$nospace=str_replace(" ","",$noamp);
							$noleftbrackets=str_replace("(","",$nospace);
							$norightbracket=str_replace(")","",$noleftbrackets);
							echo'<div class="col-md-3 w3ls_w3l_banner_left" style="margin-top:20px">
							<div class="hover14 column">
							<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid_pos">
									<img src="../images/offer.png" alt=" " class="img-responsive" />
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a><img src="uploads/'.$searchimage.'" alt=" " class="img-responsive" /></a>
												<p>'. $searchname.'</p>
												<h4>UGX '.$searchprice.' </h4>
											</div>
											<br>
											<a data-toggle="collapse" data-target="#edit'.$searchid.'">Edit item</a>
											<div id="edit'.$searchid.'" class="collapse">
												<form method="post" action="edititem.php" enctype="multipart/form-data">
                                                <input name="editid" type="hidden" value="'.$searchid.'">
												<input name="editname" placeholder="'.$searchname.'" type="text" style="
												border: 1px solid black;
    											border-radius: 4px;
												width: 100%;
												margin-bottom:10px;
												padding: .9em .9em;"><br>
												<input name="editprice" placeholder="'.$searchprice.'"type="text" style="
												border: 1px solid black;
    											border-radius: 4px;
                                                margin-bottom:10px;
												width: 100%;
												padding: .9em .9em;"><br>
                                                <select name="edittype" style="
												border: 1px solid black;
    											border-radius: 4px;
												width: 100%;
												margin-bottom:10px;
												padding: .9em .9em;">
                                                    <option></option>
                                                ';
                                                for($i=0;$i<$typesize;$i++){
                                                    echo'<option value="'.$typeId[$i].'">'.$typeName[$i].'</option>';
                                                    }
                                                echo'
                                                </select>
												<label for="exampleInputFile">File input</label>
                      							<input type="file" name="file" id="exampleInputFile" ><br>
                                                <input type="submit" name="edit" value="Edit item" class="btn btn-danger" style="color: #fff;
												background: #FA1818;">
												</form>
											</div><br>
											
											<div class="cart-add" style="text-align: center; margin: 1.5em auto 1em; width:77%">
											<form method="post" action="removeitem.php">
												<input type="hidden" name="itemId" value="'.$searchid.'">
												<input type="hidden" name="Product" value="'.$searchname.'">
												<button class="button" type="submit" name="remove" 
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
												outline: none;">Remove</button>
											</form>
											
											</div>
											
										</div>
									</figure>
								</div>
							</div>
							</div>
						</div>';
								
								
								}
								echo'<div class="clearfix"> </div>
					</div>';
							}
							
							else{
								echo '<br> This product is currently unavailable';
								}
								$resultd->close();

    					
												
					
				?>
                
				
<!-- //banner -->
</div></div><div class="clearfix"> </div>

                    
                        
                        
             </section>            
                                
        </section>

        <footer id="footer">
            Copyright &copy; 2015 Material Admin

            <ul class="f-menu">
                <li><a href="">Home</a></li>
                <li><a href="">Dashboard</a></li>
                <li><a href="">Reports</a></li>
                <li><a href="">Support</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </footer>

        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>

        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->

        <!-- Javascript Libraries -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script src="js/jquery.flot.js"></script>
        <script src="js/jquery.flot.resize.js"></script>
        <script src="js/curvedLines.js"></script>
        <script src="js/jquery.sparkline.min.js"></script>
        <script src="js/jquery.easypiechart.min.js"></script>

        <script src="js/moment.min.js"></script>
        <script src="js/fullcalendar.min.js "></script>
        <script src="js/jquery.simpleWeather.min.js"></script>
        <script src="js/waves.min.js"></script>
        <script src="js/bootstrap-growl.min.js"></script>
        <script src="js/sweetalert2.min.js"></script>
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <script>
        	$(document).ready(function(){$("body").on("click","[data-ma-action]",function(e){function launchIntoFullscreen(element){element.requestFullscreen?element.requestFullscreen():element.mozRequestFullScreen?element.mozRequestFullScreen():element.webkitRequestFullscreen?element.webkitRequestFullscreen():element.msRequestFullscreen&&element.msRequestFullscreen()}e.preventDefault();var $this=$(this),action=$(this).data("ma-action");switch(action){case"sidebar-open":var target=$this.data("ma-target"),backdrop='<div data-ma-action="sidebar-close" class="ma-backdrop" />';$("body").addClass("sidebar-toggled"),$("#header, #header-alt, #main").append(backdrop),$this.addClass("toggled"),$(target).addClass("toggled");break;case"sidebar-close":$("body").removeClass("sidebar-toggled"),$(".ma-backdrop").remove(),$(".sidebar, .ma-trigger").removeClass("toggled");break;case"profile-menu-toggle":$this.parent().toggleClass("toggled"),$this.next().slideToggle(200);break;case"submenu-toggle":$this.next().slideToggle(200),$this.parent().toggleClass("toggled");break;case"search-open":$("#header").addClass("search-toggled"),$("#top-search-wrap input").focus();break;case"search-close":$("#header").removeClass("search-toggled");break;case"clear-notification":var x=$this.closest(".list-group"),y=x.find(".list-group-item"),z=y.size();$this.parent().fadeOut(),x.find(".list-group").prepend('<i class="grid-loading hide-it"></i>'),x.find(".grid-loading").fadeIn(1500);var w=0;y.each(function(){var z=$(this);setTimeout(function(){z.addClass("animated fadeOutRightBig").delay(1e3).queue(function(){z.remove()})},w+=150)}),setTimeout(function(){$(".him-notification").addClass("empty")},150*z+200);break;case"fullscreen":launchIntoFullscreen(document.documentElement);break;case"clear-localstorage":swal({title:"Are you sure?",text:"All your saved localStorage values will be removed",type:"warning",showCancelButton:!0,confirmButtonText:"Yes, delete it!"}).then(function(){localStorage.clear(),swal("Done!","localStorage is cleared","success")});break;case"print":window.print();break;case"login-switch":var loginblock=$this.data("ma-block"),loginParent=$this.closest(".lc-block");loginParent.removeClass("toggled"),setTimeout(function(){$(loginblock).addClass("toggled")});break;case"profile-edit":$this.closest(".pmb-block").toggleClass("toggled");break;case"profile-edit-cancel":$(this).closest(".pmb-block").removeClass("toggled");break;case"action-header-open":ahParent=$this.closest(".action-header").find(".ah-search"),ahParent.fadeIn(300),ahParent.find(".ahs-input").focus();break;case"action-header-close":ahParent.fadeOut(300),setTimeout(function(){ahParent.find(".ahs-input").val("")},350);break;case"wall-comment-open":$this.closest(".wic-form").hasClass("toggled")||$this.closest(".wic-form").addClass("toggled");break;case"wall-comment-close":$this.closest(".wic-form").find("textarea").val(""),$this.closest(".wic-form").removeClass("toggled");break;case"todo-form-open":$this.closest(".t-add").addClass("toggled");break;case"todo-form-close":$this.closest(".t-add").removeClass("toggled"),$this.closest(".t-add").find("textarea").val("");break;case"change-skin":var skin=$this.data("ma-skin");$("[data-ma-theme]").attr("data-ma-theme",skin)}})}),$(document).ready(function(){function sparklineBar(id,values,height,barWidth,barColor,barSpacing){$("."+id).sparkline(values,{type:"bar",height:height,barWidth:barWidth,barColor:barColor,barSpacing:barSpacing})}function sparklineLine(id,values,width,height,lineColor,fillColor,lineWidth,maxSpotColor,minSpotColor,spotColor,spotRadius,hSpotColor,hLineColor){$("."+id).sparkline(values,{type:"line",width:width,height:height,lineColor:lineColor,fillColor:fillColor,lineWidth:lineWidth,maxSpotColor:maxSpotColor,minSpotColor:minSpotColor,spotColor:spotColor,spotRadius:spotRadius,highlightSpotColor:hSpotColor,highlightLineColor:hLineColor})}function sparklinePie(id,values,width,height,sliceColors){$("."+id).sparkline(values,{type:"pie",width:width,height:height,sliceColors:sliceColors,offset:0,borderWidth:0})}function easyPieChart(id,trackColor,scaleColor,barColor,lineWidth,lineCap,size){$("."+id).easyPieChart({trackColor:trackColor,scaleColor:scaleColor,barColor:barColor,lineWidth:lineWidth,lineCap:lineCap,size:size})}$(".stats-bar")[0]&&sparklineBar("stats-bar",[6,4,8,6,5,6,7,8,3,5,9,5,8,4],"35px",3,"#fff",2),$(".stats-bar-2")[0]&&sparklineBar("stats-bar-2",[4,7,6,2,5,3,8,6,6,4,8,6,5,8],"35px",3,"#fff",2),$(".stats-line")[0]&&sparklineLine("stats-line",[9,4,6,5,6,4,5,7,9,3,6,5],68,35,"#fff","rgba(0,0,0,0)",1.25,"rgba(255,255,255,0.4)","rgba(255,255,255,0.4)","rgba(255,255,255,0.4)",3,"#fff","rgba(255,255,255,0.4)"),$(".stats-line-2")[0]&&sparklineLine("stats-line-2",[5,6,3,9,7,5,4,6,5,6,4,9],68,35,"#fff","rgba(0,0,0,0)",1.25,"rgba(255,255,255,0.4)","rgba(255,255,255,0.4)","rgba(255,255,255,0.4)",3,"#fff","rgba(255,255,255,0.4)"),$(".stats-pie")[0]&&sparklinePie("stats-pie",[20,35,30,5],45,45,["#fff","rgba(255,255,255,0.7)","rgba(255,255,255,0.4)","rgba(255,255,255,0.2)"]),$(".dash-widget-visits")[0]&&sparklineLine("dash-widget-visits",[9,4,6,5,6,4,5,7,9,3,6,5],"100%","70px","rgba(255,255,255,0.7)","rgba(0,0,0,0)",2,"#fff","#fff","#fff",5,"rgba(255,255,255,0.4)","rgba(255,255,255,0.1)"),$(".main-pie")[0]&&easyPieChart("main-pie","rgba(255,255,255,0.2)","rgba(255,255,255,0)","rgba(255,255,255,0.7)",2,"butt",148),$(".sub-pie-1")[0]&&easyPieChart("sub-pie-1","rgba(255,255,255,0.2)","rgba(255,255,255,0)","rgba(255,255,255,0.7)",2,"butt",90),$(".sub-pie-2")[0]&&easyPieChart("sub-pie-2","rgba(255,255,255,0.2)","rgba(255,255,255,0)","rgba(255,255,255,0.7)",2,"butt",90)}),$(window).load(function(){function notify(message,type){$.growl({message:message},{type:type,allow_dismiss:!1,label:"Cancel",className:"btn-xs btn-inverse",placement:{from:"bottom",align:"left"},delay:2500,animate:{enter:"animated fadeInUp",exit:"animated fadeOutDown"},offset:{x:30,y:30}})}setTimeout(function(){$(".login-content")[0]||notify("Welcome back <?php echo $_SESSION['FNAME']; ?>","inverse")},1e3)}),$(document).ready(function(){var data1=[[1,60],[2,30],[3,50],[4,100],[5,10],[6,90],[7,85]],data2=[[1,20],[2,90],[3,60],[4,40],[5,100],[6,25],[7,65]],data3=[[1,100],[2,20],[3,60],[4,90],[5,80],[6,10],[7,5]],barData=[{label:"Tokyo",data:data1,color:"#8BC34A"},{label:"Seoul",data:data2,color:"#00BCD4"},{label:"Beijing",data:data3,color:"#FF9800"}];$("#bar-chart")[0]&&$.plot($("#bar-chart"),barData,{series:{bars:{show:!0,barWidth:.05,order:1,fill:1}},grid:{borderWidth:1,borderColor:"#eee",show:!0,hoverable:!0,clickable:!0},yaxis:{tickColor:"#eee",tickDecimals:0,font:{lineHeight:13,style:"normal",color:"#9f9f9f"},shadowSize:0},xaxis:{tickColor:"#fff",tickDecimals:0,font:{lineHeight:13,style:"normal",color:"#9f9f9f"},shadowSize:0},legend:{container:".flc-bar",backgroundOpacity:.5,noColumns:0,backgroundColor:"white",lineWidth:0}}),$(".flot-chart")[0]&&($(".flot-chart").bind("plothover",function(event,pos,item){if(item){var x=item.datapoint[0].toFixed(2),y=item.datapoint[1].toFixed(2);$(".flot-tooltip").html(item.series.label+" of "+x+" = "+y).css({top:item.pageY+5,left:item.pageX+5}).show()}else $(".flot-tooltip").hide()}),$("<div class='flot-tooltip' class='chart-tooltip'></div>").appendTo("body"))}),$(document).ready(function(){for(var d1=[],i=0;10>=i;i+=1)d1.push([i,parseInt(30*Math.random())]);for(var d2=[],i=0;20>=i;i+=1)d2.push([i,parseInt(30*Math.random())]);for(var d3=[],i=0;10>=i;i+=1)d3.push([i,parseInt(30*Math.random())]);var options={series:{shadowSize:0,curvedLines:{apply:!0,active:!0,monotonicFit:!0},lines:{show:!1,lineWidth:0,fill:1}},grid:{borderWidth:0,labelMargin:10,hoverable:!0,clickable:!0,mouseActiveRadius:6},xaxis:{tickDecimals:0,ticks:!1},yaxis:{tickDecimals:0,ticks:!1},legend:{show:!1}};$("#curved-line-chart")[0]&&$.plot($("#curved-line-chart"),[{data:d1,lines:{show:!0,fill:.98},label:"Product 1",stack:!0,color:"#e3e3e3"},{data:d3,lines:{show:!0,fill:.98},label:"Product 2",stack:!0,color:"#f1dd2c"}],options),$(".flot-chart")[0]&&($(".flot-chart").bind("plothover",function(event,pos,item){if(item){var x=item.datapoint[0].toFixed(2),y=item.datapoint[1].toFixed(2);$(".flot-tooltip").html(item.series.label+" of "+x+" = "+y).css({top:item.pageY+5,left:item.pageX+5}).show()}else $(".flot-tooltip").hide()}),$("<div class='flot-tooltip' class='chart-tooltip'></div>").appendTo("body"))}),$(document).ready(function(){function gd(year,month,day){return new Date(year,month-1,day).getTime()}var data1=[[gd(2016,1,2),1800],[gd(2016,1,3),1790],[gd(2016,1,4),1810],[gd(2016,1,7),1750],[gd(2016,1,8),1805],[gd(2016,1,9),1800],[gd(2016,1,10),1794],[gd(2016,1,11),1794],[gd(2016,1,14),1807],[gd(2016,1,15),1788],[gd(2016,1,16),1799],[gd(2016,1,17),1804],[gd(2016,1,18),1811],[gd(2016,1,21),1801],[gd(2016,1,22),1805],[gd(2016,1,23),1770],[gd(2016,1,24),1799],[gd(2016,1,25),1804],[gd(2016,1,28),1810],[gd(2016,1,29),1788],[gd(2016,1,30),1804],[gd(2016,1,31),1775]],data2=[[gd(2016,1,2),1674],[gd(2016,1,3),1680],[gd(2016,1,4),1643],[gd(2016,1,7),1652],[gd(2016,1,8),1640],[gd(2016,1,9),1652],[gd(2016,1,10),1652],[gd(2016,1,11),1664],[gd(2016,1,14),1660],[gd(2016,1,15),1664],[gd(2016,1,16),1673],[gd(2016,1,17),1671],[gd(2016,1,18),1682],[gd(2016,1,21),1680],[gd(2016,1,22),1685],[gd(2016,1,23),1684],[gd(2016,1,24),1670],[gd(2016,1,25),1664],[gd(2016,1,28),1652],[gd(2016,1,29),1655],[gd(2016,1,30),1659],[gd(2016,1,31),1668]],dataset=[{label:"Students",data:data1,color:"#26A69A",points:{fillColor:"#26A69A",show:!0,radius:0},lines:{show:!0,lineWidth:2}},{label:"Teachers",data:data2,xaxis:2,color:"#FFC107",points:{fillColor:"#FFC107",show:!0,radius:0},lines:{show:!0,lineWidth:2}}],dayOfWeek=["Sun","Mon","Tue","Wed","Thr","Fri","Sat"],options={series:{shadowSize:0,curvedLines:{apply:!0,active:!0,monotonicFit:!0}},grid:{borderWidth:1,borderColor:"#f3f3f3",show:!0,clickable:!0,hoverable:!0,mouseActiveRadius:20,labelMargin:10},xaxes:[{color:"#f3f3f3",mode:"time",tickFormatter:function(val,axis){return dayOfWeek[new Date(val).getDay()]},position:"top",font:{lineHeight:13,style:"normal",color:"#9f9f9f"}},{color:"#f3f3f3",mode:"time",timeformat:"%m/%d",font:{lineHeight:13,style:"normal",color:"#9f9f9f"}}],yaxis:{ticks:2,color:"#f3f3f3",tickDecimals:0,font:{lineHeight:13,style:"normal",color:"#9f9f9f"}},legend:{container:".flc-visits",backgroundOpacity:.5,noColumns:0,font:{lineHeight:13,style:"normal",color:"#9f9f9f"}}};$("#attendance")[0]&&$.plot($("#attendance"),dataset,options)}),$(document).ready(function(){var data1=[[2010,60],[2011,50],[2012,80],[2013,30],[2014,70],[2015,40],[2016,55]],dataset=[{label:"Index Value",data:data1,color:"#00BCD4",points:{fillColor:"#00BCD4",show:!0,radius:0},lines:{show:!0,lineWidth:1,fill:1,fillColor:{colors:["rgba(255,255,255,0.0)","#00BCD4"]}}}],options={series:{shadowSize:0,curvedLines:{apply:!0,active:!0,monotonicFit:!0}},grid:{borderWidth:1,borderColor:"#eee",show:!0,hoverable:!0,clickable:!0},yaxis:{tickColor:"#eee",tickDecimals:0,font:{lineHeight:13,style:"normal",color:"#9f9f9f"},shadowSize:0},xaxis:{tickColor:"#fff",tickDecimals:0,font:{lineHeight:13,style:"normal",color:"#9f9f9f"},shadowSize:0},legend:{container:".flc-sei",backgroundOpacity:.5,noColumns:0,backgroundColor:"white",lineWidth:0}};$("#effective-index")[0]&&$.plot($("#effective-index"),dataset,options)}),$(document).ready(function(){var feeData=[{data:5,color:"#03A9F4",label:"Collected"},{data:2,color:"#F44336",label:"Not Collected"},{data:1,color:"#8BC34A",label:"Pending"}];$("#fee-collected")[0]&&$.plot("#fee-collected",feeData,{series:{pie:{show:!0,stroke:{width:2}}},legend:{container:".flc-pie",backgroundOpacity:.5,noColumns:0,backgroundColor:"white",lineWidth:0},grid:{hoverable:!0,clickable:!0},tooltip:!1,tooltipOpts:{content:"%p.0%, %s",defaultTheme:!1,cssClass:"flot-tooltip"}})}),$(document).ready(function(){var data=[[1,60],[2,30],[3,50],[4,100],[5,10],[6,90],[7,85],[8,10],[9,25],[10,65],[11,69],[12,104],[13,94],[14,32],[15,10],[16,45],[17,34],[18,22],[19,100],[20,43],[21,98],[22,60],[23,51],[24,30]],dataset=[{data:data,label:"Visits",bars:{show:!0,barWidth:.4,order:1,lineWidth:0,fillColor:"#ff766c"}}],options={grid:{borderWidth:1,borderColor:"#f3f3f3",show:!0,hoverable:!0,clickable:!0,labelMargin:10},yaxis:{tickColor:"#f3f3f3",tickDecimals:0,font:{lineHeight:13,style:"normal",color:"#9f9f9f"},shadowSize:0},xaxis:{tickFormatter:function(value,axis){return value+"h"},tickColor:"#fff",tickDecimals:0,font:{lineHeight:13,style:"normal",color:"#9f9f9f"},shadowSize:0},legend:{show:!1}};$("#visit-server-time")[0]&&$.plot($("#visit-server-time"),dataset,options)}),$(document).ready(function(){function gd(year,month,day){return new Date(year,month-1,day).getTime()}var data1=[[gd(2013,1,2),1690.25],[gd(2013,1,3),1696.3],[gd(2013,1,4),1659.65],[gd(2013,1,7),1668.15],[gd(2013,1,8),1656.1],[gd(2013,1,9),1668.65],[gd(2013,1,10),1668.15],[gd(2013,1,11),1680.2],[gd(2013,1,14),1676.7],[gd(2013,1,15),1680.7],[gd(2013,1,16),1689.75],[gd(2013,1,17),1687.25],[gd(2013,1,18),1698.3],[gd(2013,1,21),1696.8],[gd(2013,1,22),1701.3],[gd(2013,1,23),1700.8],[gd(2013,1,24),1686.75],[gd(2013,1,25),1680],[gd(2013,1,28),1668.65],[gd(2013,1,29),1671.2],[gd(2013,1,30),1675.7],[gd(2013,1,31),1684.25]],data2=[[gd(2013,1,2),1674.15],[gd(2013,1,3),1680.15],[gd(2013,1,4),1643.8],[gd(2013,1,7),1652.25],[gd(2013,1,8),1640.3],[gd(2013,1,9),1652.75],[gd(2013,1,10),1652.25],[gd(2013,1,11),1664.2],[gd(2013,1,14),1660.7],[gd(2013,1,15),1664.7],[gd(2013,1,16),1673.65],[gd(2013,1,17),1671.15],[gd(2013,1,18),1682.1],[gd(2013,1,21),1680.65],[gd(2013,1,22),1685.1],[gd(2013,1,23),1684.6],[gd(2013,1,24),1670.65],[gd(2013,1,25),1664],[gd(2013,1,28),1652.75],[gd(2013,1,29),1655.25],[gd(2013,1,30),1659.7],[gd(2013,1,31),1668.2]],dataset=[{label:"Visits",data:data1,color:"#ff766c",points:{fillColor:"#ff766c",show:!0,radius:2},lines:{show:!0,lineWidth:1}},{label:"Unique Visitors",data:data2,xaxis:2,color:"#03A9F4",points:{fillColor:"#03A9F4",show:!0,radius:2},lines:{show:!0,lineWidth:1}}],dayOfWeek=["Sun","Mon","Tue","Wed","Thr","Fri","Sat"],options={series:{shadowSize:0},grid:{borderWidth:1,borderColor:"#f3f3f3",show:!0,clickable:!0,hoverable:!0,mouseActiveRadius:20,labelMargin:10},xaxes:[{color:"#f3f3f3",mode:"time",tickFormatter:function(val,axis){return dayOfWeek[new Date(val).getDay()]},position:"top",font:{lineHeight:13,style:"normal",color:"#9f9f9f"}},{color:"#f3f3f3",mode:"time",timeformat:"%m/%d",font:{lineHeight:13,style:"normal",color:"#9f9f9f"}}],yaxis:{ticks:2,color:"#f3f3f3",tickDecimals:0,font:{lineHeight:13,style:"normal",color:"#9f9f9f"}},legend:{container:".flc-visits",backgroundOpacity:.5,noColumns:0,font:{lineHeight:13,style:"normal",color:"#9f9f9f"}}};$("#visit-over-time")[0]&&$.plot($("#visit-over-time"),dataset,options)}),$(document).ready(function(){function getRandomData(){for(data.length>0&&(data=data.slice(1));data.length<totalPoints;){var prev=data.length>0?data[data.length-1]:50,y=prev+10*Math.random()-5;0>y?y=0:y>90&&(y=90),data.push(y)}for(var res=[],i=0;i<data.length;++i)res.push([i,data[i]]);return res}function update(){plot.setData([getRandomData()]),plot.draw(),setTimeout(update,updateInterval)}var data=[],totalPoints=300,updateInterval=30;if($("#dynamic-chart")[0]){var plot=$.plot("#dynamic-chart",[getRandomData()],{series:{label:"Server Process Data",lines:{show:!0,lineWidth:.2,fill:.6},color:"#00BCD4",shadowSize:0},yaxis:{min:0,max:100,tickColor:"#eee",font:{lineHeight:13,style:"normal",color:"#9f9f9f"},shadowSize:0},xaxis:{tickColor:"#eee",show:!0,font:{lineHeight:13,style:"normal",color:"#9f9f9f"},shadowSize:0,min:0,max:250},grid:{borderWidth:1,borderColor:"#eee",labelMargin:10,hoverable:!0,clickable:!0,mouseActiveRadius:6},legend:{show:!1}});update()}}),$(document).ready(function(){function getRandomData(){for(data.length>0&&(data=data.slice(1));data.length<totalPoints;){var prev=data.length>0?data[data.length-1]:50,y=prev+10*Math.random()-5;0>y?y=0:y>90&&(y=90),data.push(y)}for(var res=[],i=0;i<data.length;++i)res.push([i,data[i]]);return res}for(var data=[],totalPoints=100,d1=[],i=0;10>=i;i+=1)d1.push([i,parseInt(30*Math.random())]);for(var d2=[],i=0;20>=i;i+=1)d2.push([i,parseInt(30*Math.random())]);for(var d3=[],i=0;10>=i;i+=1)d3.push([i,parseInt(30*Math.random())]);var options={series:{shadowSize:0,lines:{show:!1,lineWidth:0}},grid:{borderWidth:0,labelMargin:10,hoverable:!0,clickable:!0,mouseActiveRadius:6},xaxis:{tickDecimals:0,ticks:!1},yaxis:{tickDecimals:0,ticks:!1},legend:{show:!1}};$("#line-chart")[0]&&$.plot($("#line-chart"),[{data:d1,lines:{show:!0,fill:.98},label:"Product 1",stack:!0,color:"#e3e3e3"},{data:d3,lines:{show:!0,fill:.98},label:"Product 2",stack:!0,color:"#FFC107"}],options),$("#recent-items-chart")[0]&&$.plot($("#recent-items-chart"),[{data:getRandomData(),lines:{show:!0,fill:.8},label:"Items",stack:!0,color:"#00BCD4"}],options),$(".flot-chart")[0]&&($(".flot-chart").bind("plothover",function(event,pos,item){if(item){var x=item.datapoint[0].toFixed(2),y=item.datapoint[1].toFixed(2);$(".flot-tooltip").html(item.series.label+" of "+x+" = "+y).css({top:item.pageY+5,left:item.pageX+5}).show()}else $(".flot-tooltip").hide()}),$("<div class='flot-tooltip' class='chart-tooltip'></div>").appendTo("body"))}),$(document).ready(function(){var pieData=[{data:1,color:"#F44336",label:"Toyota"},{data:2,color:"#03A9F4",label:"Nissan"},{data:3,color:"#8BC34A",label:"Hyundai"},{data:4,color:"#FFEB3B",label:"Scion"},{data:4,color:"#009688",label:"Daihatsu"}];$("#pie-chart")[0]&&$.plot("#pie-chart",pieData,{series:{pie:{show:!0,stroke:{width:2}}},legend:{container:".flc-pie",backgroundOpacity:.5,noColumns:0,backgroundColor:"white",lineWidth:0},grid:{hoverable:!0,clickable:!0},tooltip:!0,tooltipOpts:{content:"%p.0%, %s",shifts:{x:20,y:0},defaultTheme:!1,cssClass:"flot-tooltip"}}),$("#donut-chart")[0]&&$.plot("#donut-chart",pieData,{series:{pie:{innerRadius:.5,show:!0,stroke:{width:2}}},legend:{container:".flc-donut",backgroundOpacity:.5,noColumns:0,backgroundColor:"white",lineWidth:0},grid:{hoverable:!0,clickable:!0},tooltip:!0,tooltipOpts:{content:"%p.0%, %s",shifts:{x:20,y:0},defaultTheme:!1,cssClass:"flot-tooltip"}})}),/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)&&$("html").addClass("ismobile"),$(window).load(function(){$("html").hasClass("ismobile")||$(".page-loader")[0]&&setTimeout(function(){$(".page-loader").fadeOut()},500)}),$(document).ready(function(){function scrollBar(selector,theme,mousewheelaxis){$(selector).mCustomScrollbar({theme:theme,scrollInertia:100,axis:"yx",mouseWheel:{enable:!0,axis:mousewheelaxis,preventDefault:!0}})}if($("html").hasClass("ismobile")||$(".c-overflow")[0]&&scrollBar(".c-overflow","minimal-dark","y"),$(".dropdown")[0]&&($("body").on("click",".dropdown.open .dropdown-menu",function(e){e.stopPropagation()}),$(".dropdown").on("shown.bs.dropdown",function(e){$(this).attr("data-animation")&&($animArray=[],$animation=$(this).data("animation"),$animArray=$animation.split(","),$animationIn="animated "+$animArray[0],$animationOut="animated "+$animArray[1],$animationDuration="",$animArray[2]?$animationDuration=$animArray[2]:$animationDuration=500,$(this).find(".dropdown-menu").removeClass($animationOut),$(this).find(".dropdown-menu").addClass($animationIn))}),$(".dropdown").on("hide.bs.dropdown",function(e){$(this).attr("data-animation")&&(e.preventDefault(),$this=$(this),$dropdownMenu=$this.find(".dropdown-menu"),$dropdownMenu.addClass($animationOut),setTimeout(function(){$this.removeClass("open")},$animationDuration))})),$("#calendar-widget")[0]){!function(){$("#cw-body").fullCalendar({contentHeight:"auto",theme:!1,buttonIcons:{prev:" zmdi zmdi-chevron-left",next:" zmdi zmdi-chevron-right"},header:{right:"next",center:"title, ",left:"prev"},defaultDate:"2016-08-12",editable:!0,events:[{title:"Dolor Pellentesque",start:"2016-08-01",className:"bgm-cyan"},{title:"Purus Nibh",start:"2016-08-07",className:"bgm-amber"},{title:"Amet Condimentum",start:"2016-08-09",className:"bgm-green"},{title:"Tellus",start:"2016-08-12",className:"bgm-blue"},{title:"Vestibulum",start:"2016-08-18",className:"bgm-cyan"},{title:"Ipsum",start:"2016-08-24",className:"bgm-teal"},{title:"Fringilla Sit",start:"2016-08-27",className:"bgm-blue"},{title:"Amet Pharetra",url:"http://google.com/",start:"2016-08-30",className:"bgm-amber"}]})}();var mYear=moment().format("YYYY"),mDay=moment().format("dddd, MMM D");$("#calendar-widget .cwh-year").html(mYear),$("#calendar-widget .cwh-day").html(mDay)}if($("#weather-widget")[0]&&$.simpleWeather({location:"Austin, TX",woeid:"",unit:"f",success:function(weather){html='<div class="weather-status">'+weather.temp+"&deg;"+weather.units.temp+"</div>",html+='<ul class="weather-info"><li>'+weather.city+", "+weather.region+"</li>",html+='<li class="currently">'+weather.currently+"</li></ul>",html+='<div class="weather-icon wi-'+weather.code+'"></div>',html+='<div class="dw-footer"><div class="weather-list tomorrow">',html+='<span class="weather-list-icon wi-'+weather.forecast[2].code+'"></span><span>'+weather.forecast[1].high+"/"+weather.forecast[1].low+"</span><span>"+weather.forecast[1].text+"</span>",html+="</div>",html+='<div class="weather-list after-tomorrow">',html+='<span class="weather-list-icon wi-'+weather.forecast[2].code+'"></span><span>'+weather.forecast[2].high+"/"+weather.forecast[2].low+"</span><span>"+weather.forecast[2].text+"</span>",html+="</div></div>",$("#weather-widget").html(html)},error:function(error){$("#weather-widget").html("<p>"+error+"</p>")}}),$(".auto-size")[0]&&autosize($(".auto-size")),$(".fg-line")[0]&&($("body").on("focus",".fg-line .form-control",function(){$(this).closest(".fg-line").addClass("fg-toggled")}),$("body").on("blur",".form-control",function(){var p=$(this).closest(".form-group, .input-group"),i=p.find(".form-control").val();p.hasClass("fg-float")?0==i.length&&$(this).closest(".fg-line").removeClass("fg-toggled"):$(this).closest(".fg-line").removeClass("fg-toggled")})),$(".fg-float")[0]&&$(".fg-float .form-control").each(function(){var i=$(this).val();0==!i.length&&$(this).closest(".fg-line").addClass("fg-toggled")}),$("audio, video")[0]&&$("video,audio").mediaelementplayer(),$(".chosen")[0]&&$(".chosen").chosen({width:"100%",allow_single_deselect:!0}),$("#input-slider")[0]){var slider=document.getElementById("input-slider");noUiSlider.create(slider,{start:[20],connect:"lower",range:{min:0,max:100}})}if($("#input-slider-range")[0]){var sliderRange=document.getElementById("input-slider-range");noUiSlider.create(sliderRange,{start:[40,70],connect:!0,range:{min:0,max:100}})}if($("#input-slider-value")[0]){var sliderRangeValue=document.getElementById("input-slider-value");noUiSlider.create(sliderRangeValue,{start:[10,50],connect:!0,range:{min:0,max:100}}),sliderRangeValue.noUiSlider.on("update",function(values,handle){document.getElementById("input-slider-value-output").innerHTML=values[handle]})}if($(".color-picker")[0]&&$(".color-picker").each(function(){var colorOutput=$(this).closest(".cp-container").find(".cp-value");$(this).farbtastic(colorOutput)}),$(".html-editor")[0]&&$(".html-editor").summernote({height:150}),$(".html-editor-click")[0]&&($("body").on("click",".hec-button",function(){$(".html-editor-click").summernote({focus:!0}),$(".hec-save").show()}),$("body").on("click",".hec-save",function(){$(".html-editor-click").code(),$(".html-editor-click").destroy(),$(".hec-save").hide(),notify("Content Saved Successfully!","success")})),$(".html-editor-airmod")[0]&&$(".html-editor-airmod").summernote({airMode:!0}),$(".date-time-picker")[0]&&$(".date-time-picker").datetimepicker(),$(".time-picker")[0]&&$(".time-picker").datetimepicker({format:"LT"}),$(".date-picker")[0]&&$(".date-picker").datetimepicker({format:"DD/MM/YYYY"}),$(".date-picker").on("dp.hide",function(){$(this).closest(".dtp-container").removeClass("fg-toggled"),$(this).blur()}),$(".form-wizard-basic")[0]&&$(".form-wizard-basic").bootstrapWizard({tabClass:"fw-nav",nextSelector:".next",previousSelector:".previous"}),function(){Waves.attach(".btn:not(.btn-icon):not(.btn-float)"),Waves.attach(".btn-icon, .btn-float",["waves-circle","waves-float"]),Waves.init()}(),$(".lightbox")[0]&&$(".lightbox").lightGallery({enableTouch:!0}),$("body").on("click",".a-prevent",function(e){e.preventDefault()}),$(".collapse")[0]&&($(".collapse").on("show.bs.collapse",function(e){$(this).closest(".panel").find(".panel-heading").addClass("active")}),$(".collapse").on("hide.bs.collapse",function(e){$(this).closest(".panel").find(".panel-heading").removeClass("active")}),$(".collapse.in").each(function(){$(this).closest(".panel").find(".panel-heading").addClass("active")})),$('[data-toggle="tooltip"]')[0]&&$('[data-toggle="tooltip"]').tooltip(),$('[data-toggle="popover"]')[0]&&$('[data-toggle="popover"]').popover(),$("html").hasClass("ie9")&&$("input, textarea").placeholder({customClass:"ie9-placeholder"}),$(".typeahead")[0]){var statesArray=["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Carolina","North Dakota","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"],states=new Bloodhound({datumTokenizer:Bloodhound.tokenizers.whitespace,queryTokenizer:Bloodhound.tokenizers.whitespace,local:statesArray});$(".typeahead").typeahead({hint:!0,highlight:!0,minLength:1},{name:"states",source:states})}$(".dropzone")[0]&&(Dropzone.autoDiscover=!1,$("#dropzone-upload").dropzone({url:"/file/post",addRemoveLinks:!0}))}),$(document).ready(function(){$("#map-world")[0]&&$("#map-world").vectorMap({map:"world_en",backgroundColor:null,color:"#eee",borderColor:"#eee",hoverOpacity:1,selectedColor:"#00BCD4",enableZoom:!0,showTooltip:!0,normalizeFunction:"polynomial",selectedRegions:["US","EN","NZ","CN","JP","SL","BR","AU"],onRegionClick:function(event){event.preventDefault()}})});
        </script>
    </body>
  </html>
