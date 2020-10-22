<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Travel Mate - Find your travel mate</title>
	<link rel="shortcut icon" type="png" href="images/logo-cut.png">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">	
	<link rel="stylesheet" href="css/patros.css" >
	
</head>

<body data-spy="scroll">
	
	<!-- Navigation starts -->
	<?php include 'headers/header.php';?>
	<!-- Navigation ends -->
	
	<!-- login start -->
	<?php include 'login.php';?>
	<!-- login ends --> 
	<!-- Register modal -->
	<?php include 'register.html';?>
	<!-- // Register modal -->

	<!-- Header Carousel -->
	<header id="home" class="carousel slide">
		<ul class="cb-slideshow">
			<li><span>image1</span>
				<div class="container">
					<div class="row">
					</li>
					<li><span>image2</span>
						<div class="container">
							<div class="row">
							</div>
						</li>
						<li><span>image3</span>
							<div class="container">
								<div class="row">
									
								</div>
							</li>
							<li><span>Image 05</span>
								<div class="container">
									<div class="row">
										
									</div>
								</li>
								<li><span>Image 06</span>
									<div class="container">
										<div class="row">
											
										</div>
									</li>
								</ul>

								<div class="intro-scroller">
									<a class="inner-link" href="#meet-team">
										<div class="mouse-icon" style="opacity: 1;">
											<div class="wheel"></div>
										</div>
									</a> 
								</div>  

							</header>  

							<section id="meet-team">
								<div class="container">
									<div class="blog-sidebar">
										<?php
										if(isset($_POST['searchTxt']))
										{
											$searchKey = $_POST['searchTxt'];
											$groups = "SELECT * FROM `create_post` WHERE Travel_Place LIKE '%$searchKey%' LIMIT 3";

											$review = "SELECT Review_ID, Review_Title , Experience, Review_Image, Traveled FROM `review_post` WHERE  Traveled LIKE '%$searchKey%' ORDER BY Review_Time DESC LIMIT 3";
											
										}
										else
										{
											$groups = "SELECT Title , Travel_Place, Plan, Upload_Img , Cpost_ID FROM `create_post` ORDER BY Cpost_Time DESC LIMIT 3";

											$review = "SELECT Review_ID, Review_Title , Experience, Review_Image, Traveled FROM `review_post` ORDER BY Review_Time DESC LIMIT 3";
											$searchKey = "";
										}
										?>
										<form action="" method="POST">
											<div class="input-group searchbar">
												<input type="text" class="form-control searchbar" placeholder="Search for..." name="searchTxt" id="searchTxt">
												<span class="input-group-btn">
													<button class="btn btn-primary" type="submit">Search</button>
												</span>
											</div><!-- /input-group -->
										</form>    
									</div>
									
		<div class="row teamspace">
			<div class="col-xs-12 col-sm-6">
				<div class="blog-sidebar">
					<h4 class="sidebar-title"><i class="fa fa-group"></i> Recent Groups</h4>
					<hr style="margin-bottom: 5px;">

					<?php
					$grp = $mysqli->query($groups);

					while ($row = $grp->fetch_assoc()) 
					{
						$cId = $row['Cpost_ID'];
						$title = $row['Title'];
						$cimg = $row['Upload_Img'];
						$travel = $row['Travel_Place'];
						$plan = $row['Plan'];

						?>
						<div class="media">
							<?php
							if (isset($_SESSION['email'])) 
							{
								?>
								<a class="pull-left" href="post_details.php?Cpost_ID=<?php echo $cId; ?>">
									<?php		
								}
								else
								{

									?>
									<a class="pull-left" href="#">

										<?php
									}
									?>


									<?php
									if ($cimg == '') 
									{
										?>
										<img class="img-responsive media-object" src="images/background1.png" alt="Media Object">
										<?php
									}
									else
									{
										?>
										<img class="img-responsive media-object" src="images/<?php echo $cimg;?>" alt="Media Object">
										<?php
									}
									?>

								</a>
								<div class="media-body">
									<h4 class="media-heading">
										<?php
										if (isset($_SESSION['email'])) 
										{
											?>
											<a href="post_details.php?Cpost_ID=<?php echo $cId; ?>">
												<?php		
											}
											else
											{

												?>
												<a href="#">

													<?php
												}
												?>
												<?php echo $title;?>
											</a>
										</h4>
										<?php echo $plan;?>
									</div>
								</div>

								<?php	   
							}
							?>
						</div>
					</div>
				<div class="col-xs-12 col-sm-6">
					    <div class="blog-sidebar">
		<h4 class="sidebar-title"><i class="fa fa-pencil-square"></i> Recent Reviews</h4>
		<hr style="margin-bottom: 5px;">

		<?php

		$rev = $mysqli->query($review);
		while ($row = $rev->fetch_assoc()) 
		{
			$vId = $row['Review_ID'];
			$vtitle = $row['Review_Title'];
			$vimg = $row['Review_Image'];
			$vtravel = $row['Traveled'];
			$vplan = $row['Experience'];

		                     	//	<?php echo ;

			?> 
			<div class="media">
				<?php
				if (isset($_SESSION['email'])) 
				{
					?>
					<a class="pull-left" href="review_details.php?Review_ID=<?php echo $vId; ?>">
						<?php		
					}
					else
					{

						?>
						<a class="pull-left" href="#">

							<?php
						}
						?>


						<?php
						if ($vimg == '') 
						{
							?>
							<img class="img-responsive media-object" src="images/background1.png" alt="Media Object">
							<?php
						}
						else
						{
							?>
							<img class="img-responsive media-object" src="images/<?php echo $vimg;?>" alt="Media Object">
							<?php
						}
						?>

					</a>
					<div class="media-body">
						<h4 class="media-heading">
							<?php
							if (isset($_SESSION['email'])) 
							{
								?>
								<a href="review_details.php?Review_ID=<?php echo $vId; ?>">
									<?php		
								}
								else
								{

									?>
									<a href="#">

										<?php
									}
									?>
									<?php echo $vtitle;?>
								</a>
							</h4>
							<?php echo $vplan;?>
						
					</div>
                </div>
					<?php	   
				}
				?>
    </div>
				</div>
				
			</div>
		</div>
	</section>



	<!-- Page Content -->
	<section id="about" style="background-color: #333; margin-top: 4em;">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<div class="text-center color-elements">
						<h2>About Us</h2>
						<img class="img-responsive displayed" src="images/short.png" alt="Company about"/>
						<div class="row">
							<div class="col-md-12">
								<p style="color: #fff;">
									In our life, whenever we want to go for a trip  everyone is busy around us so we can't go for a trip and also we feeling down for the pressure of
									this monitorius life so, our goal is to find a mate who can travel with you. <span class="color-elements">Stay relex and meet new people.</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> 

	<footer id="footer">
		<div class="container">
			<div class="row myfooter">
				<div class="col-sm-6"><div class="pull-left">
					© Samon Company 2018 | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a>
				</div></div>
				<div class="col-sm-6">
					<div class="pull-right">Designed by <a href="#">Samsun Nahar Samon</a></div>
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- Google Map -->
	<script src="//maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=true&amp;libraries=places"></script>

	<!-- Portfolio -->
	<script src="js/jquery.quicksand.js"></script>	    
	

	<!--Jquery Smooth Scrolling-->
	<script>
		$(document).ready(function(){
			$('.custom-menu a[href^="#"], .intro-scroller .inner-link').on('click',function (e) {
				e.preventDefault();

				var target = this.hash;
				var $target = $(target);

				$('html, body').stop().animate({
					'scrollTop': $target.offset().top
				}, 900, 'swing', function () {
					window.location.hash = target;
				});
			});

			$('a.page-scroll').bind('click', function(event) {
				var $anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top
				}, 1500, 'easeInOutExpo');
				event.preventDefault();
			});

			$(".nav a").on("click", function(){
				$(".nav").find(".active").removeClass("active");
				$(this).parent().addClass("active");
			});

			$('body').append('<div id="toTop" class="btn btn-primary color1"><span class="glyphicon glyphicon-chevron-up"></span></div>');
			$(window).scroll(function () {
				if ($(this).scrollTop() != 0) {
					$('#toTop').fadeIn();
				} else {
					$('#toTop').fadeOut();
				}
			}); 
			$('#toTop').click(function(){
				$("html, body").animate({ scrollTop: 0 }, 700);
				return false;
			});

		});

	</script>

	<script>
		function gallery(){};

		var $itemsHolder = $('ul.port2');
		var $itemsClone = $itemsHolder.clone(); 
		var $filterClass = "";
		$('ul.filter li').click(function(e) {
			e.preventDefault();
			$filterClass = $(this).attr('data-value');
			if($filterClass == 'all'){ var $filters = $itemsClone.find('li'); }
			else { var $filters = $itemsClone.find('li[data-type='+ $filterClass +']'); }
			$itemsHolder.quicksand(
				$filters,
				{ duration: 1000 },
				gallery
				);
		});

		$(document).ready(gallery);
	</script>


	<script type="text/javascript">
		$(document).ready(function(){
			inicializemap()

			$('#contactForm').on('submit', function(e){
				e.preventDefault();
				e.stopPropagation();

			// get values from FORM
			var name = $("#name").val();
			var email = $("#email").val();
			var message = $("#message").val();
			var goodToGo = false;
			var messgaeError = 'Request can not be send';
			var pattern = new RegExp(/^(('[\w-\s]+')|([\w-]+(?:\.[\w-]+)*)|('[\w-\s]+')([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);


			if (name && name.length > 0 && $.trim(name) !='' && message && message.length > 0 && $.trim(message) !='' && email && email.length > 0 && $.trim(email) !='') {
				if (pattern.test(email)) {
					goodToGo = true;
				} else {
					messgaeError = 'Please check your email address';
					goodToGo = false; 
				}
			} else {
				messgaeError = 'You must fill all the form fields to proceed!';
				goodToGo = false;
			}

			
			if (goodToGo) {
				$.ajax({
					data: $('#contactForm').serialize(),
					beforeSend: function() {
						$('#success').html('<div class="col-md-12 text-center"><img src="images/spinner1.gif" alt="spinner" /></div>');
					},
					success:function(response){
						if (response==1) {
							$('#success').html('<div class="col-md-12 text-center">Your email was sent successfully</div>');
							window.location.reload();
						} else {
							$('#success').html('<div class="col-md-12 text-center">E-mail was not sent. Please try again!</div>');
						}
					},
					error:function(e){
						$('#success').html('<div class="col-md-12 text-center">We could not fetch the data from the server. Please try again!</div>');
					},
					complete: function(done){
						console.log('Finished');
					},
					type: 'POST',
					url: 'js/send_email.php', 
				});
				return true;
			} else {
				$('#success').html('<div class="col-md-12 text-center">'+messgaeError+'</div>');
				return false;
			}
			return false;
		});
										});

										var map = null;
										var latitude;
										var longitude;
										function inicializemap(){
											latitude = 41.3349509; 
											longitude = 19.8217028;

											var egglabs = new google.maps.LatLng(latitude, longitude);
											var egglabs1 = new google.maps.LatLng(43.0630171, 89.2296082);
											var egglabs2 = new google.maps.LatLng(13.0630171, 80.2296082 );


											var image = new google.maps.MarkerImage('images/marker.png', new google.maps.Size(84,56), new google.maps.Point(0,0), new google.maps.Point(42,56));
											var mapCoordinates = new google.maps.LatLng(latitude, longitude);
											var mapOptions = {
												backgroundColor: '#ffffff',
												zoom: 10,
												disableDefaultUI: true,
												center: mapCoordinates,
												mapTypeId: google.maps.MapTypeId.ROADMAP,
												scrollwheel: true,
												draggable: true, 
												zoomControl: false,
												disableDoubleClickZoom: true,
												mapTypeControl: false,
												styles: [
												{
													"featureType": "all",
													"elementType": "labels.text.fill",
													"stylers": [
													{
														"color": "#1f242f"
													}
													]
												},
												{
													"featureType": "all",
													"elementType": "labels.icon",
													"stylers": [
													{
														"hue": "#ff9d00"
													}
													]
												},
												{
													"featureType": "landscape.man_made",
													"elementType": "geometry.fill",
													"stylers": [
													{
														"color": "#fef8ef"
													}
													]
												},
												{
													"featureType": "poi.medical",
													"elementType": "geometry.fill",
													"stylers": [
													{
														"hue": "#ff0000"
													}
													]
												},
												{
													"featureType": "poi.park",
													"elementType": "geometry.fill",
													"stylers": [
													{
														"color": "#c9d142"
													},
													{
														"lightness": "0"
													},
													{
														"visibility": "on"
													},
													{
														"weight": "1"
													},
													{
														"gamma": "1.98"
													}
													]
												},
												{
													"featureType": "road",
													"elementType": "geometry",
													"stylers": [
													{
														"weight": "1.00"
													}
													]
												},
												{
													"featureType": "road",
													"elementType": "geometry.fill",
													"stylers": [
													{
														"color": "#d7b19c"
													},
													{
														"weight": "1"
													}
													]
												},
												{
													"featureType": "road.highway",
													"elementType": "geometry",
													"stylers": [
													{
														"visibility": "on"
													}
													]
												},
												{
													"featureType": "road.highway",
													"elementType": "geometry.fill",
													"stylers": [
													{
														"weight": "4.03"
													}
													]
												},
												{
													"featureType": "road.highway",
													"elementType": "geometry.stroke",
													"stylers": [
													{
														"visibility": "off"
													},
													{
														"color": "#ffed00"
													}
													]
												},
												{
													"featureType": "road.highway.controlled_access",
													"elementType": "geometry.fill",
													"stylers": [
													{
														"visibility": "on"
													}
													]
												},
												{
													"featureType": "road.arterial",
													"elementType": "geometry",
													"stylers": [
													{
														"visibility": "on"
													}
													]
												},
												{
													"featureType": "road.local",
													"elementType": "geometry",
													"stylers": [
													{
														"visibility": "on"
													}
													]
												},
												{
													"featureType": "transit.line",
													"elementType": "geometry.fill",
													"stylers": [
													{
														"color": "#cbcbcb"
													}
													]
												},
												{
													"featureType": "water",
													"elementType": "geometry.fill",
													"stylers": [
													{
														"color": "#0b727f"
													}
													]
												}
												]
											};

											map = new google.maps.Map(document.getElementById('map-canvas-holder'),mapOptions);
											marker = new google.maps.Marker({position: egglabs, raiseOnDrag: false, icon: image, map: map, draggable: false,  title: 'ATIS1'}); 
											marker = new google.maps.Marker({position: egglabs1, raiseOnDrag: false, icon: image, map: map, draggable: false,  title: 'ATIS2'}); 
											marker = new google.maps.Marker({position: egglabs2, raiseOnDrag: false, icon: image, map: map, draggable: false,  title: 'ATIS3'}); 
											google.maps.event.addListener(map, 'zoom_changed', function() {
												var center = map.getCenter();
												google.maps.event.trigger(map, 'resize');
												map.setCenter(center);
											});
										}

									</script>


								</body>
								</html>




