
<!DOCTYPE html>
<html>
<head>
<title>Weather VietNam</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Simple Metro Weather Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- js -->
<script src="<?= base_url()?>assets/js/jquery-2.2.3.min.js"></script> 
<!-- //js --> 
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?= base_url()?>assets/css/font-awesome.min.css" />
<!-- //font-awesome icons -->
<link href="<?= base_url()?>assets/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
<link href="<?= base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />

<link href="//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
</head>
<body>
	<div class="main">
		<h1>Thời tiết du lịch Việt Nam</h1>
		<div class="w3layouts_main_grids">
			<div class="w3layouts_main_grid_left">
				<div class="w3_search">
					<form action="/search" method="get">
						<!-- <input id="search" type="text" name="q" placeholder="Search..." required=""> -->
						<select class="form-control" id="exampleFormControlSelect1" name="q">
                        <?php foreach ($allTP as $key => $value) { ?>
                            <option value="<?= $value['name']?>"><?= $value['name']?></option>
                       <?php } ?>
                        </select>
						<input type="submit" value=" ">
					</form>
					<div id="tinh"></div>
				</div>
				<div class="w3l_search_bottom">
					<ul class="w3ls_weather">
						<li><i><?php $time = substr( $Hanoi['observation'][0]['utcTime'] , 11 , 8 ); echo $time;?></i>Hà Nội<span><?= $Hanoi['observation'][0]['temperature']?>°</span></li>
						<li><i><?php $time = substr( $Hue['observation'][0]['utcTime'] , 11 , 8 ); echo $time;?></i>Huế<span><?= $Hue['observation'][0]['temperature']?>°</span></li>
						<li><i><?php $time = substr( $Danang['observation'][0]['utcTime'] , 11 , 8 ); echo $time;?></i>Đà Nẵng<span><?= $Danang['observation'][0]['temperature']?>°</span></li>
						<li><i><?php $time = substr( $Gialai['observation'][0]['utcTime'] , 11 , 8 ); echo $time;?></i>Gia Lai<span><?= $Gialai['observation'][0]['temperature']?>°</span></li>
						<li><i><?php $time = substr( $Hochiminh['observation'][0]['utcTime'] , 11 , 8 ); echo $time;?></i>Hồ Chí Minh<span><?= $Hochiminh['observation'][0]['temperature']?>°</span></li>
						<li><i><?php $time = substr( $Camau['observation'][0]['utcTime'] , 11 , 8 ); echo $time;?></i>Cà Mau<span><?= $Camau['observation'][0]['temperature']?>°</span></li>
					</ul>
					<ul class="agileits_social_icons">
						<li><a href="#" class="agileinfo_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="wthree_instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agileits_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agile_google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="w3layouts_main_grid_right">
				<div class="agileits_w3layouts_main_grid_right">
					<div class="w3_agile_main_grid_left">
						<h2><?= $content['dailyForecasts']['forecastLocation']['state']?><small></small></h2>
						<p><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $content['dailyForecasts']['forecastLocation']['forecast'][0]['weekday']?>
						<span style="color:blue;"><?php $time = substr( $content['dailyForecasts']['forecastLocation']['forecast'][0]['utcTime'] , 0 , 10 ); echo date("d-m-Y", strtotime($time));?></span></p>

					</div>
					<div class="w3_agile_main_grid_right">
						<ul class="w3layouts_weather_updates">
							<?php for ($i=1; $i < 5 ; $i++) { ?>
								
								<li>
									<img class="clear-day" width="25" height="25" src="<?= $content['dailyForecasts']['forecastLocation']['forecast'][$i]['iconLink']?>" >
									<?= $content['dailyForecasts']['forecastLocation']['forecast'][$i]['highTemperature']?>&deg;<span><?= $content['dailyForecasts']['forecastLocation']['forecast'][$i]['weekday']?><i><label class="fa fa-calendar-day" aria-hidden="true"><?php $time = substr( $content['dailyForecasts']['forecastLocation']['forecast'][$i]['utcTime'] , 0 , 10 ); echo date("d-m-Y", strtotime($time));?></label></i></span>
								</li>
						<?php } ?>
						</ul>
					</div>
					<div class="clear"> </div>
				</div>
				<div class="w3_agile_main_grid_right1">
					<div id="owl-demo" class="owl-carousel"> 
						<?php for ($i=0; $i < 24; $i++) { ?>
							
							<div class="item">
								<div class="w3_weather_scroll">
									<h4><?php $time = substr( $hourly[$i]['utcTime'] , 11 , 8 ); echo $time;?></h4>
									<h5><?= $hourly[$i]['temperature']?>°</h5>
									<img id="clear-night" width="30" height="30" src="<?= $hourly[$i]['iconLink']?>">
								</div>
							</div>
						<?php }?>

					</div>
				</div>
			</div>
			<div class="clear"> </div>
		</div>
			<!-- Submitted March 7 @ 11:05pm  -->
			<div class="agileits_copyright">	
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<img src="https://cdn1.iconfinder.com/data/icons/softwaredemo/PNG/256x256/Pencil3.png"
								class="img-responsive center-block" alt="">
						</div>
						<div class="col-md-8">
							<?php if (!empty($detail)){echo $detail;}?>
						</div>
					</div>
				</div>
			</div>
		<div class="agileits_copyright">		 	
			<p>© 2019 Thời tiết Việt Nam. All Rights Reserved | Design by <a href="http://youtube.com/" target="_blank">Châu Đức Giang</a> </p>		 	
		</div>
		<script src="<?= base_url()?>assets/js/owl.carousel.js"></script>  
		<script>
			$(document).ready(function() { 
				$("#owl-demo").owlCarousel({
			 
				  autoPlay: 3000, //Set AutoPlay to 3 seconds
			 
				  items :5,
				  itemsDesktop : [640,5],
				  itemsDesktopSmall : [414,2],
				  navigation : true
			 
				});
				
			}); 
		</script>
		<script>
			$(document).ready(function() { 
				$("#search").keyup(function(){
					
					var query =  $("#search").val();
					if(query != ''){
						$.ajax({
							type: "post",
							url: "/autocomplete",
							data: {query:query},
							success: function (data) {
								// $('#tinh').fadeIn();
								// $('#tinh').html(data);
								$('#search').autocomplete({

								})
							}
						});
					}
				});
				$(document).on('click','li',function (e) { 
					// e.preventDefault();
					$('#search').val($this.text());
					$('#tinh').fadeOut();
				});
			}); 
		</script>
		<!--skycons-icons-->
		<script src="<?= base_url()?>assets/js/skycons.js"></script>
		<!--//skycons-icons-->
		<script>
			 var icons = new Skycons({"color": "#fff"}),
				  list  = [
					"clear-night","wind","rain","cloudy", "snow","fog"
				  ],
				  i;

			  for(i = list.length; i--; )
				icons.set(list[i], list[i]);

			  icons.play();
		</script>
		<script>
			 var icons = new Skycons({"color": "#FFD700"}),
				  list  = [
					"partly-cloudy-day",
					"partly-cloudy-night","clear-day","sleet"
				  ],
				  i;

			  for(i = list.length; i--; )
				icons.set(list[i], list[i]);

			  icons.play();
		</script>
	</div>
</body>
</html>