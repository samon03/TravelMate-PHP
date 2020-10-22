<section id="about" style="background-color: #333;">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10">
						<div class="text-center color-elements">
							<h2>About Us</h2>
							<img class="img-responsive displayed" src="images/short.png" alt="Company about"/>
							<div class="row" >
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

<!-- 		<section id="contact">
			<div class="container"> 
				<div class="row">
					<div class="col-md-12">
						<div class="col-lg-12">
							<div class="text-center color-elements">
							<h2>Contact Us</h2>
							</div>
						</div>
						<div class="col-lg-6 col-md-8">
							<form class="inline" id="contactForm" method="post" >
								<div class="row">
									<div class="col-sm-6 height-contact-element">
										<div class="form-group">
											<input type="text" name="first_name" class="form-control custom-labels" id="name" placeholder="FULL NAME" required data-validation-required-message="Please write your name!"/>
											<p class="help-block text-danger"></p>
										</div>
									</div>
									<div class="col-sm-6 height-contact-element">
										<div class="form-group">
											<input type="email" name="email" class="form-control custom-labels" id="email" placeholder="EMAIL" required data-validation-required-message="Please write your email!"/>
											<p class="help-block text-danger"></p>
										</div>
									</div>
									<div class="col-sm-12 height-contact-element">
										<div class="form-group">
											<input type="text" name="message" class="form-control custom-labels" id="message" placeholder="WHAT'S ON YOUR MIND" required data-validation-required-message="Please write a message!"/>
										</div>
									</div>
									<div class="col-sm-3 col-xs-6 height-contact-element">
										<div class="form-group">
											<input type="submit" class="btn btn-md btn-custom btn-noborder-radius" value="Send It"/>
										</div>
									</div>
									<div class="col-sm-3 col-xs-6 height-contact-element">
										<div class="form-group">
											<button type="button" class="btn btn-md btn-noborder-radius btn-custom" name="reset">RESET
											</button>
										</div>
									</div>
									<div class="col-sm-3 col-xs-6 height-contact-element">
										<div class="form-group">
											<div id="response_holder"></div>
										</div>
									</div>
									<div class="col-sm-12 contact-msg">
									<div id="success"></div>
									</div>
								</div>
							</form>
						</div>
						<div class="col-lg-5 col-md-3 col-lg-offset-1 col-md-offset-1">
							<div class="row">
								<div class="col-md-12 height-contact-element">
									<div class="form-group">
										<i class="fa fa-2x fa-map-marker"></i>
										<span class="text">LOCATION</span>
									</div>
								</div>
								<div class="col-md-12 height-contact-element">
									<div class="form-group">
										<i class="fa fa-2x fa-phone"></i>
										<span class="text">0051 768622115</span>
									 </div>
								 </div>
								<div class="col-md-12 height-contact-element">    
									<div class="form-group">
										<i class="fa fa-2x fa-envelope"></i>
										<span class="text">info@company.com</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="follow-us">
			<div class="container"> 
				<div class="text-center height-contact-element">
					<h2>FOLLOW US</h2>
				</div>
				<img class="img-responsive displayed" src="images/short.png" alt="short" />
				<div class="text-center height-contact-element">
					<ul class="list-unstyled list-inline list-social-icons">
						<li class="active"><a href="#"><i class="fa fa-facebook social-icons"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter social-icons"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus social-icons"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin social-icons"></i></a></li>
					</ul>
				</div>
			</div>
		</section>    -->

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


        <script src="js/jquery.js"></script>
        
        <script src="js/bootstrap.min.js"></script>


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