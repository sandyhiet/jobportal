@extends('layouts.master')
@section('title', 'Home Page')
@section('content')


<<<<<<< HEAD
     <!-- ============ NAVBAR START ============ -->

		

		<!-- ============ NAVBAR END ============ -->

		<!-- ============ HEADER END ============ -->
<!-- ============ SLIDES START ============ -->

	<div id="slider" class="sl-slider-wrapper">
		<?php 
		$i=0;
		foreach ($banners as $key => $value) {
		?>
			<div class="sl-slider">
          <?php if($i == 0){?>
			<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
			<?php }
			else if($i == 1){?>
			<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
			<?php }
			else if($i == 2){?>
			<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
			<?php }
			else if($i == 3){?>
			<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
          <?php }?>
				<div class="sl-slide-inner">
				<div class="bg-img bg-img-2"><img src="{{url('sliderHomeImage/thumb1350x690/'.$banners[$key]->sliderImage)}}"></div>
				<div class="tint"></div>
				<div class="slide-content">
				<h2>{{$banners[$key]->sliderh1}}</h2>
				<h3>{{$banners[$key]->sliderh2}}</h3>
				<p><a href="{{url('jobs')}}" class="btn btn-lg btn-default">Find a job</a></p>
=======
<!-- ============ SLIDES START ============ -->

		<div id="slider" class="sl-slider-wrapper">

			<div class="sl-slider">
			
				<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
					<div class="sl-slide-inner">
						<div class="bg-img bg-img-1"></div>
						<div class="tint"></div>
						<div class="slide-content">
							<h2>Looking for a job?</h2>
							<h3>There’s no better place to start</h3>
							<p><a href="jobs.html" class="btn btn-lg btn-default">Find a job</a></p>
						</div>
					</div>
				</div>
			
				<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
					<div class="sl-slide-inner">
						<div class="bg-img bg-img-2"></div>
						<div class="tint"></div>
						<div class="slide-content">
							<h2>Need an employee?</h2>
							<h3>We've got perfect candidates</h3>
							<p><a href="candidates.html" class="btn btn-lg btn-default">Post a job</a></p>
						</div>
					</div>
>>>>>>> refs/remotes/origin/master
				</div>
			
				<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
					<div class="sl-slide-inner">
						<div class="bg-img bg-img-3"></div>
						<div class="tint"></div>
						<div class="slide-content">
							<h2>Evolving your career?</h2>
							<h3>Find new opportunities here</h3>
							<p><a href="jobs.html" class="btn btn-lg btn-default">Find a job</a></p>
						</div>
					</div>
				</div>
			
				<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
					<div class="sl-slide-inner">
						<div class="bg-img bg-img-4"></div>
						<div class="tint"></div>
						<div class="slide-content">
							<h2>Extending your team?</h2>
							<h3>Find a perfect match</h3>
							<p><a href="candidates.html" class="btn btn-lg btn-default">Find a cadidate</a></p>
						</div>
					</div>
				</div>

			</div>
<<<<<<< HEAD
            </div>
	
=======

>>>>>>> refs/remotes/origin/master
			<nav id="nav-arrows" class="nav-arrows">
				<span class="nav-arrow-prev">Previous</span>
				<span class="nav-arrow-next">Next</span>
			</nav>

			<nav id="nav-dots" class="nav-dots">
				<span class="nav-dot-current"></span>
				<span></span>
				<span></span>
				<span></span>
			</nav>
				<?php
		 $i++;
		}
		?>
		</div>


		<!-- ============ SLIDES END ============ -->
		<!-- ============ JOBS START ============ -->

	  	<section id="jobs">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<h2>Recent Jobs</h2>

						<div class="jobs">
							
							<!-- Job offer 1 -->
							<a href="#" class="featured applied">
								<div class="row">
									<div class="col-md-1 hidden-sm hidden-xs">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									</div>
									<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 job-title">
										<h5>Web Designer</h5>
										<p><strong>Amazon Inc.</strong> Company slogan goes here</p>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 job-location">
										<p><strong>New York City, NY, USA</strong></p>
										<p class="hidden-xs">126.3 miles away</p>
									</div>
									<div class="col-lg-2 col-md-2 hidden-sm hidden-xs job-type text-center">
										<p class="job-salary"><strong>$128,000</strong></p>
										<p class="badge full-time">Full time</p>
									</div>
								</div>
							</a>
							
							<!-- Job offer 2 -->
							<a href="#" class="featured">
								<div class="row">
									<div class="col-md-1 hidden-sm hidden-xs">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									</div>
									<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 job-title">
										<h5>Fron End Developer</h5>
										<p><strong>Ebay Inc.</strong> Company slogan goes here</p>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 job-location">
										<p><strong>Chicago, IL, USA</strong></p>
										<p class="hidden-xs">792.1 miles away</p>
									</div>
									<div class="col-lg-2 col-md-2 hidden-sm hidden-xs job-type text-center">
										<p class="job-salary"><strong>$142,000</strong></p>
										<p class="badge part-time">Part time</p>
									</div>
								</div>
							</a>
							
							<!-- Job offer 3 -->
							<a href="#" class="applied">
								<div class="row">
									<div class="col-md-1 hidden-sm hidden-xs">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									</div>
									<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 job-title">
										<h5>Back End Developer</h5>
										<p><strong>Google</strong> Company slogan goes here</p>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 job-location">
										<p><strong>San Diego, CA, USA</strong></p>
										<p class="hidden-xs">875.3 miles away</p>
									</div>
									<div class="col-lg-2 col-md-2 hidden-sm hidden-xs job-type text-center">
										<p class="job-salary"><strong>$220,000</strong></p>
										<p class="badge freelance">Freelance</p>
									</div>
								</div>
							</a>
							
							<!-- Job offer 4 -->
							<a href="#" class="applied">
								<div class="row">
									<div class="col-md-1 hidden-sm hidden-xs">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									</div>
									<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 job-title">
										<h5>Project Manager</h5>
										<p><strong>Dropbox Inc.</strong> Company slogan goes here</p>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 job-location">
										<p><strong>Los Angeles, CA, USA</strong></p>
										<p class="hidden-xs">943.4 miles away</p>
									</div>
									<div class="col-lg-2 col-md-2 hidden-sm hidden-xs job-type text-center">
										<p class="job-salary"><strong>$95,000</strong></p>
										<p class="badge temporary">Temporary</p>
									</div>
								</div>
							</a>
							
							<!-- Job offer 5 -->
							<a href="#">
								<div class="row">
									<div class="col-md-1 hidden-sm hidden-xs">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									</div>
									<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 job-title">
										<h5>Office Assistant</h5>
										<p><strong>Dell Inc.</strong> Company slogan goes here</p>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 job-location">
										<p><strong>Seattle, WA, USA</strong></p>
										<p class="hidden-xs">1168.7 miles away</p>
									</div>
									<div class="col-lg-2 col-md-2 hidden-sm hidden-xs job-type text-center">
										<p class="job-salary"><strong>$36,000</strong></p>
										<p class="badge internship">Internship</p>
									</div>
								</div>
							</a>
							
							<!-- Job offer 6 -->
							<a href="#" class="hidden-job">
								<div class="row">
									<div class="col-md-1 hidden-sm hidden-xs">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									</div>
									<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 job-title">
										<h5>Web Designer</h5>
										<p><strong>Amazon Inc.</strong> Company slogan goes here</p>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 job-location">
										<p><strong>New York City, NY, USA</strong></p>
										<p class="hidden-xs">126.3 miles away</p>
									</div>
									<div class="col-lg-2 col-md-2 hidden-sm hidden-xs job-type text-center">
										<p class="job-salary"><strong>$128,000</strong></p>
										<p class="badge full-time">Full time</p>
									</div>
								</div>
							</a>
							
							<!-- Job offer 7 -->
							<a href="#" class="hidden-job">
								<div class="row">
									<div class="col-md-1 hidden-sm hidden-xs">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									</div>
									<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 job-title">
										<h5>Fron End Developer</h5>
										<p><strong>Ebay Inc.</strong> Company slogan goes here</p>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 job-location">
										<p><strong>Chicago, IL, USA</strong></p>
										<p class="hidden-xs">792.1 miles away</p>
									</div>
									<div class="col-lg-2 col-md-2 hidden-sm hidden-xs job-type text-center">
										<p class="job-salary"><strong>$142,000</strong></p>
										<p class="badge part-time">Part time</p>
									</div>
								</div>
							</a>
							
							<!-- Job offer 8 -->
							<a href="#" class="hidden-job">
								<div class="row">
									<div class="col-md-1 hidden-sm hidden-xs">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									</div>
									<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 job-title">
										<h5>Back End Developer</h5>
										<p><strong>Google</strong> Company slogan goes here</p>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 job-location">
										<p><strong>San Diego, CA, USA</strong></p>
										<p class="hidden-xs">875.3 miles away</p>
									</div>
									<div class="col-lg-2 col-md-2 hidden-sm hidden-xs job-type text-center">
										<p class="job-salary"><strong>$220,000</strong></p>
										<p class="badge freelance">Freelance</p>
									</div>
								</div>
							</a>
							
							<!-- Job offer 9 -->
							<a href="#" class="hidden-job">
								<div class="row">
									<div class="col-md-1 hidden-sm hidden-xs">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									</div>
									<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 job-title">
										<h5>Project Manager</h5>
										<p><strong>Dropbox Inc.</strong> Company slogan goes here</p>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 job-location">
										<p><strong>Los Angeles, CA, USA</strong></p>
										<p class="hidden-xs">943.4 miles away</p>
									</div>
									<div class="col-lg-2 col-md-2 hidden-sm hidden-xs job-type text-center">
										<p class="job-salary"><strong>$95,000</strong></p>
										<p class="badge temporary">Temporary</p>
									</div>
								</div>
							</a>
							
							<!-- Job offer 10 -->
							<a href="#" class="hidden-job">
								<div class="row">
									<div class="col-md-1 hidden-sm hidden-xs">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									</div>
									<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 job-title">
										<h5>Office Assistant</h5>
										<p><strong>Dell Inc.</strong> Company slogan goes here</p>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 job-location">
										<p><strong>Seattle, WA, USA</strong></p>
										<p class="hidden-xs">1168.7 miles away</p>
									</div>
									<div class="col-lg-2 col-md-2 hidden-sm hidden-xs job-type text-center">
										<p class="job-salary"><strong>$36,000</strong></p>
										<p class="badge internship">Internship</p>
									</div>
								</div>
							</a>

						</div>

						<a class="btn btn-primary" id="more-jobs">
							<span class="more">Show More Jobs <i class="fa fa-arrow-down"></i></span>
							<span class="less">Show Less Jobs <i class="fa fa-arrow-up"></i></span>
						</a>

					</div>
					<div class="col-sm-4">
						<h2>Featured Jobs</h2>
						<a href="#">
							<img src="http://placehold.it/400x265.jpg" alt="Featured Job" class="img-responsive" />
							<div class="featured-job">
								<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle" />
								<div class="title">
									<h5>Web Designer</h5>
									<p>Amazon</p>
								</div>
								<div class="data">
									<span class="city"><i class="fa fa-map-marker"></i>New York City</span>
									<span class="type full-time"><i class="fa fa-clock-o"></i>Full Time</span>
									<span class="sallary"><i class="fa fa-dollar"></i>45,000</span>
								</div>
								<div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tristique euismod lorem, a consequat orci consequat a. Donec ullamcorper tincidunt nunc, ut aliquam est pellentesque porta. In neque erat, malesuada sit amet orci ac, laoreet laoreet mauris.</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>
		<!-- ============ JOBS END ============ -->

		<!-- ============ COMPANIES START ============ -->

		<section id="companies" class="color1">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2>Featured Companies</h2>
						<ul id="featured-companies" class="row">
							<li class="col-sm-4 col-md-3">
								<a href="company.html">
									<img src="http://placehold.it/220x100.jpg" alt="" />
									<span class="badge">12</span>
								</a>
							</li>
							<li class="col-sm-4 col-md-3">
								<a href="company.html">
									<img src="http://placehold.it/220x100.jpg" alt="" />
									<span class="badge">4</span>
								</a>
							</li>
							<li class="col-sm-4 col-md-3">
								<a href="company.html">
									<img src="http://placehold.it/220x100.jpg" alt="" />
									<span class="badge">8</span>
								</a>
							</li>
							<li class="col-sm-4 col-md-3">
								<a href="company.html">
									<img src="http://placehold.it/220x100.jpg" alt="" />
									<span class="badge">9</span>
								</a>
							</li>
							<li class="col-sm-4 col-md-3">
								<a href="company.html">
									<img src="http://placehold.it/220x100.jpg" alt="" />
									<span class="badge">13</span>
								</a>
							</li>
							<li class="col-sm-4 col-md-3">
								<a href="company.html">
									<img src="http://placehold.it/220x100.jpg" alt="" />
									<span class="badge">6</span>
								</a>
							</li>
							<li class="col-sm-4 col-md-3">
								<a href="company.html">
									<img src="http://placehold.it/220x100.jpg" alt="" />
									<span class="badge">7</span>
								</a>
							</li>
							<li class="col-sm-4 col-md-3">
								<a href="company.html">
									<img src="http://placehold.it/220x100.jpg" alt="" />
									<span class="badge">15</span>
								</a>
							</li>
							<li class="col-sm-4 col-md-3">
								<a href="company.html">
									<img src="http://placehold.it/220x100.jpg" alt="" />
									<span class="badge">6</span>
								</a>
							</li>
							<li class="col-sm-4 col-md-3">
								<a href="company.html">
									<img src="http://placehold.it/220x100.jpg" alt="" />
									<span class="badge">11</span>
								</a>
							</li>
							<li class="col-sm-4 col-md-3">
								<a href="company.html">
									<img src="http://placehold.it/220x100.jpg" alt="" />
									<span class="badge">14</span>
								</a>
							</li>
							<li class="col-sm-4 col-md-3">
								<a href="company.html">
									<img src="http://placehold.it/220x100.jpg" alt="" />
									<span class="badge">3</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ COMPANIES END ============ -->

		<!-- ============ STATS START ============ -->

		<section id="stats" class="parallax text-center">
			<div class="tint"></div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1>Jobseek Stats</h1>
						<h4>How many people we’ve helped</h4>
					</div>
				</div>
				<div class="row" id="counter">
					
					<div class="counter">
						<div class="number">4,329</div>
						<div class="description">Members</div>
					</div>
				
					<div class="counter">
						<div class="number">894</div>
						<div class="description">Jobs</div>
					</div>
				
					<div class="counter">
						<div class="number">1,482</div>
						<div class="description">Resumes</div>
					</div>
				
					<div class="counter">
						<div class="number">83</div>
						<div class="description">Companies</div>
					</div>

				</div>
				<div class="row">
					<div class="col-sm-12">
						<p><a class="link-register btn btn-primary">Join Us</a></p>
					</div>
				</div>
			</div>
		</section>
		<!-- ============ STATS END ============ -->

		<!-- ============ HOW DOES IT WORK START ============ -->

		<section id="how">
			<div class="container">
				<?php 
				foreach ($work_details as $key => $value) {
				
				?>
				<div class="row">
					<div class="col-sm-12">
						<h2>{{$work_details[$key]->title}}</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<p>{{$work_details[$key]->content}}</p>
						<p><a href="{{url('work_details/'.$work_details[$key]->title)}}" class="btn btn-primary">Learn More</a></p>
					</div>
					<div class="col-sm-6">
						<div class="video-wrapper">
							<iframe src="{{$work_details[$key]->video_link}}" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</section>

		<!-- ============ HOW DOES IT WORK END ============ -->

		<!-- ============ MOBILE APP START ============ -->

<<<<<<< HEAD
		<!-- <section id="app" class="color2">
=======
		<section id="app" class="color2">
>>>>>>> refs/remotes/origin/master
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div id="phone"></div>
					</div>
					<div class="col-sm-offset-1 col-sm-6">
						<p>&nbsp;</p>
						<h2>Get Jobseek app</h2>
						<p>Curabitur et lorem a massa tempus aliquam. Aenean aliquam volutpat gravida. Pellentesque in neque nec tortor sagittis tempor quis in lectus. Vestibulum vehicula aliquet elit ut porta. Sed ipsum felis, interdum blandit purus sed, volutpat ultricies sem. Maecenas feugiat, lectus vitae luctus feugiat, nulla nisl dignissim velit, nec malesuada ligula orci et metus. In vulputate laoreet luctus.</p>
						<p>
							<a href="#" class="btn btn-default"><i class="fa fa-apple"></i> IOS</a>
							<a href="#" class="btn btn-default"><i class="fa fa-android"></i> Android</a>
						</p>
						<p>&nbsp;</p>
					</div>
				</div>
			</div>
		</section>
<<<<<<< HEAD
 -->
=======

>>>>>>> refs/remotes/origin/master
		<!-- ============ MOBILE APP END ============ -->


		<!-- ============ PRICING START ============ -->

	 	<section id="pricing" class="text-center">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1>Plans &amp; Pricing</h1>
						<h4>Choose a package that fits your needs</h4>
					</div>
				</div>
				<div class="row pricing">
					<div class="col-sm-3">
						<ul>
							<li class="title">Free</li>
							<li class="price">$0</li>
							<li>1 job posting</li>
							<li>No featured jobs</li>
							<li>Displayed for 5 days</li>
							<li><a href="post-a-job.html" class="btn btn-primary">Choose</a></li>
						</ul>
					</div>
					<div class="col-sm-3">
						<ul class="popular">
							<li class="title">Startup</li>
							<li class="price">$19</li>
							<li>1 job posting</li>
							<li>No featured jobs</li>
							<li>Displayed for 30 days</li>
							<li><a href="post-a-job.html" class="btn btn-primary">Choose</a></li>
<<<<<<< HEAD
=======
						</ul>
					</div>
					<div class="col-sm-3">
						<ul>
							<li class="title">Company</li>
							<li class="price">$29</li>
							<li>3 job postings</li>
							<li>No featured jobs</li>
							<li>Displayed for 60 days</li>
							<li><a href="post-a-job.html" class="btn btn-primary">Choose</a></li>
>>>>>>> refs/remotes/origin/master
						</ul>
					</div>
					<div class="col-sm-3">
						<ul>
<<<<<<< HEAD
							<li class="title">Company</li>
							<li class="price">$29</li>
							<li>3 job postings</li>
							<li>No featured jobs</li>
							<li>Displayed for 60 days</li>
							<li><a href="post-a-job.html" class="btn btn-primary">Choose</a></li>
						</ul>
					</div>
					<div class="col-sm-3">
						<ul>
=======
>>>>>>> refs/remotes/origin/master
							<li class="title">Enterprise</li>
							<li class="price">$39</li>
							<li>5 job postings</li>
							<li>3 featured jobs</li>
							<li>Displayed for 90 days</li>
							<li><a href="post-a-job.html" class="btn btn-primary">Choose</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ PRICING END ============ -->

			<!-- ============ TESTIMONIALS START ============ -->

		<section id="testimonials" class="parallax text-center">
			<div class="tint"></div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1>Testimonials</h1>
						<h4>Kind words from happy members</h4>
						<div class="owl-carousel">

							<!-- Testimonial 1 -->
							<div>
								<div class="col-sm-3 col-md-2">
								<img class="img-circle img-responsive" src="{{ url('testimonialsImages') }}/{{ $testimonials[$keys]->clientImage }}"/>
									
								</div>
								<div class="col-sm-9 col-md-10">
									<blockquote>
										<p>Thanks for the great service. Jobseek has completely surpassed our expectations.
										Jobseek is the most valuable business resource we have ever purchased.</p>
										<footer>
											Anthony Walsh
											<cite title="Brand Manager in Ebay Inc.">Brand Manager in Ebay Inc.</cite>
										</footer>
									</blockquote>
								</div>
							</div>

							<!-- Testimonial 2 -->
							<div>
								<div class="col-sm-3 col-md-2">
									<img src="http://placehold.it/140x140.jpg" class="img-circle img-responsive" alt="testimonial" />
								</div>
								<div class="col-sm-9 col-md-10">
									<blockquote>
										<p>I didn't even need training. I couldn't have asked for more than this.
										It really saves me time and effort. Jobseek is exactly what our business has been lacking.
										I would be lost without Jobseek.</p>
										<footer>
											Becky Daniels
											<cite title="HR Manager in Apple Inc.">HR Manager in Apple Inc.</cite>
										</footer>
									</blockquote>
								</div>
							</div>

							<!-- Testimonial 3 -->
							<div>
								<div class="col-sm-3 col-md-2">
									<img src="http://placehold.it/140x140.jpg" class="img-circle img-responsive" alt="testimonial" />
								</div>
								<div class="col-sm-9 col-md-10">
									<blockquote>
										<p>I just can't get enough of Jobseek. I want to get a T-Shirt with Jobseek on it so I can show it off to everyone. This is simply unbelievable!</p>
										<footer>
											Erick Olson
											<cite title="Key Account Manager in Twitter Inc.">Key Account Manager in Twitter Inc.</cite>
										</footer>
									</blockquote>
								</div>
							</div>

							<!-- Testimonial 4 -->
							<div>
								<div class="col-sm-3 col-md-2">
									<img src="http://placehold.it/140x140.jpg" class="img-circle img-responsive" alt="testimonial" />
								</div>
								<div class="col-sm-9 col-md-10">
									<blockquote>
										<p>Jobseek is worth much more than I paid. I'm good to go. I couldn't have asked for more than this. Keep up the excellent work.</p>
										<footer>
											Nadine Boyd
											<cite title="CEO in Company Name">CEO in Company Name</cite>
										</footer>
									</blockquote>
								</div>
							</div>

						</div>
						<p><a href="testimonials.html" class="btn btn-primary">Read All</a></p>
					</div>
				</div>
			</div>
		</section>
		<!-- ============ TESTIMONIALS END ============ -->

		<!-- ============ News START ============ -->

		<section id="blog">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<h1>Latest News</h1>
						<h4>Specially crafted job posts everyday</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="owl-carousel">

							<!-- Blog post 1 -->
							<div>
<<<<<<< HEAD
							
					       <img class="img-responsive" src="{{url('newsImages/thumb800x530/'.$news[$key]->newsImage)}}"/>

								
=======
								<img src="http://placehold.it/800x530.jpg" class="img-responsive" alt="Blog Post" />
								<h4>Lorem ipsum dolor sit amet</h4>
								<h5>
									<span><i class="fa fa-calendar"></i>28.08.2015</span>
									<span><i class="fa fa-comment"></i>8 Comments</span>
								</h5>
								<p>Consectetur adipiscing elit. Duis lobortis tincidunt pretium. Suspendisse ullamcorper quis neque quis viverra. Cras ut leo in lectus gravida fringilla. In hac habitasse platea dictumst. Fusce facilisis sapien dolor, non fermentum magna tempus ac. Fusce quis eros sit amet magna aliquam euismod ac eget libero. Fusce accumsan in eros vitae posuere.</p>
								<p><a href="post.html" class="btn btn-primary">Read more</a></p>
							</div>

							<!-- Blog post 2 -->
							<div>
								<img src="http://placehold.it/800x530.jpg" class="img-responsive" alt="Blog Post" />
								<h4>Lorem ipsum dolor sit amet</h4>
								<h5>
									<span><i class="fa fa-calendar"></i>28.08.2015</span>
									<span><i class="fa fa-comment"></i>8 Comments</span>
								</h5>
								<p>Consectetur adipiscing elit. Duis lobortis tincidunt pretium. Suspendisse ullamcorper quis neque quis viverra. Cras ut leo in lectus gravida fringilla. In hac habitasse platea dictumst. Fusce facilisis sapien dolor, non fermentum magna tempus ac. Fusce quis eros sit amet magna aliquam euismod ac eget libero. Fusce accumsan in eros vitae posuere.</p>
								<p><a href="post.html" class="btn btn-primary">Read more</a></p>
							</div>

							<!-- Blog post 3 -->
							<div>
								<img src="http://placehold.it/800x530.jpg" class="img-responsive" alt="Blog Post" />
								<h4>Lorem ipsum dolor sit amet</h4>
								<h5>
									<span><i class="fa fa-calendar"></i>28.08.2015</span>
									<span><i class="fa fa-comment"></i>8 Comments</span>
								</h5>
								<p>Consectetur adipiscing elit. Duis lobortis tincidunt pretium. Suspendisse ullamcorper quis neque quis viverra. Cras ut leo in lectus gravida fringilla. In hac habitasse platea dictumst. Fusce facilisis sapien dolor, non fermentum magna tempus ac. Fusce quis eros sit amet magna aliquam euismod ac eget libero. Fusce accumsan in eros vitae posuere.</p>
								<p><a href="post.html" class="btn btn-primary">Read more</a></p>
							</div>
>>>>>>> refs/remotes/origin/master

							<!-- Blog post 4 -->
							<div>
								<img src="http://placehold.it/800x530.jpg" class="img-responsive" alt="Blog Post" />
								<h4>Lorem ipsum dolor sit amet</h4>
								<h5>
									<span><i class="fa fa-calendar"></i>28.08.2015</span>
									<span><i class="fa fa-comment"></i>8 Comments</span>
								</h5>
								<p>Consectetur adipiscing elit. Duis lobortis tincidunt pretium. Suspendisse ullamcorper quis neque quis viverra. Cras ut leo in lectus gravida fringilla. In hac habitasse platea dictumst. Fusce facilisis sapien dolor, non fermentum magna tempus ac. Fusce quis eros sit amet magna aliquam euismod ac eget libero. Fusce accumsan in eros vitae posuere.</p>
								<p><a href="post.html" class="btn btn-primary">Read more</a></p>
							</div>

<<<<<<< HEAD
								<h4><?php echo implode(explode('_', $news[$key]->newsTitle), ' '); ?></h4>
								
                   
                               <p style="text-align: justify;"><?PHP echo stripcslashes(substr($news[$key]->newsDescription, 0, 220)); ?>...</p>
								<p><a href="#" class="btn btn-primary">Read more</a></p>
=======
							<!-- Blog post 5 -->
							<div>
								<img src="http://placehold.it/800x530.jpg" class="img-responsive" alt="Blog Post" />
								<h4>Lorem ipsum dolor sit amet</h4>
								<h5>
									<span><i class="fa fa-calendar"></i>28.08.2015</span>
									<span><i class="fa fa-comment"></i>8 Comments</span>
								</h5>
								<p>Consectetur adipiscing elit. Duis lobortis tincidunt pretium. Suspendisse ullamcorper quis neque quis viverra. Cras ut leo in lectus gravida fringilla. In hac habitasse platea dictumst. Fusce facilisis sapien dolor, non fermentum magna tempus ac. Fusce quis eros sit amet magna aliquam euismod ac eget libero. Fusce accumsan in eros vitae posuere.</p>
								<p><a href="post.html" class="btn btn-primary">Read more</a></p>
>>>>>>> refs/remotes/origin/master
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>


		<!-- ============ News END ============ -->

		

		<!-- ============ CLIENTS START ============ -->

		<section id="clients">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<h1>Happy Clients</h1>
						<h4>Some of the many companies we’ve helped</h4>


						  

						<div class="owl-carousel">
							<?php 
							$i=1;
							foreach($filter_gallery as $key => $value) {?>
							<!-- Logo 1 -->
							<div>
								<img class="img-responsive pad" src="{{url('gallery/filterGallery/thumb133x69/'.$filter_gallery[$key]->image)}}" alt="">
							</div>
							
				     <?php $i++; }?>


						</div>


					</div>
				</div>
			</div>
		</section>

		<!-- ============ CLIENTS END ============ -->
@endsection

		

		