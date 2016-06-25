@extends('layouts.master')
@section('title', 'Home Page')
@section('content')


     <!-- ============ NAVBAR START ============ -->

		

		<!-- ============ NAVBAR END ============ -->

		<!-- ============ HEADER END ============ -->
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

		</div>


		<!-- ============ SLIDES END ============ -->
		<!-- ============ JOBS START ============ -->

	  	<section id="jobs">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<h2>Recent Jobs</h2>

						<div class="jobs">
						<?php 

							foreach($allpostjobs as $key => $value) {

								$jobtitle =	ucfirst($allpostjobs[$key]->jobtitle);
								$companyname =	ucfirst($allpostjobs[$key]->companyname);
								$location =	ucfirst($allpostjobs[$key]->location);
								$jobtype =	ucfirst($allpostjobs[$key]->jobtype);
								$jobregion =	ucfirst($allpostjobs[$key]->jobregion);
								$companytagline =	ucfirst($allpostjobs[$key]->companytagline);

								$feature = $allpostjobs[$key]->featuredjob;
								$ftru = '';
								switch ($feature) {
	                                case 1:
	                                    $ftru = 'featured applied';
	                                    break;
	                                case 0:
	                                    $ftru = '';
	                                    break;
	                                default:
	                                    $ftru = '';
	                                    break;
                               }

							 ?>

							<a href="{{url('company_detail/'.$allpostjobs[$key]->id )}}" class="{{$ftru}}">
								<div class="row">
									<div class="col-md-1 hidden-sm hidden-xs">
										<?php if ($allpostjobs[$key]->company_logo) { ?>
										<img src="{{url('jobpostimage/thumb60x60/'.$allpostjobs[$key]->company_logo)}}" alt="" class="img-responsive" />
										<?php }else{?>
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									    <?php } ?>
										
									</div>
									<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 job-title">
										<h5>{{$jobtitle}}</h5>
										<p><strong>{{$companyname}}</strong> {{$companytagline}}</p>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 job-location">
										<p><strong>{{$location}}, {{$jobregion}}</strong></p>
										<p class="hidden-xs">126.3 miles away</p>
									</div>
									<?php 
										$badge = '';
                                        $jtype = $allpostjobs[$key]->jobtype;
                                        switch ($jtype) {
                                            case 'Full Time':
                                                $badge = 'full-time';
                                                break;
                                            case 'Part Time':
                                                $badge = 'part-time';
                                                break;
                                            case 'Internship':
                                                $badge = 'internship';
                                                break;
                                            case 'Freelance':
                                                $badge = 'freelance';
                                                break;
                                            case 'Volunteer':
                                                $badge = 'volunteer';
                                                break;    
                                            default:
                                                $badge = 'temporary';
                                                break;
                                        }


									?>
									<div class="col-lg-2 col-md-2 hidden-sm hidden-xs job-type text-center">
										<p class="job-salary"><strong>$128,000</strong></p>
										<p class="badge {{$badge}}">{{$jobtype}}</p>
									</div>
								</div>
							</a>		


							<?php } ?>
							
						

						
							
							<!-- Job offer 10 -->
							<!-- <a href="#" class="hidden-job">
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
							</a> -->

						</div>

						<a class="btn btn-primary" id="more-jobs">
							<span class="more">Show More Jobs <i class="fa fa-arrow-down"></i></span>
							<span class="less">Show Less Jobs <i class="fa fa-arrow-up"></i></span>
						</a>

					</div>
					<div class="col-sm-4">
						<h2>Featured Jobs</h2>
						<a href="{{url('company_detail/'.$featuredpostjobs[0]->id )}}">
							<?php if ($featuredpostjobs[0]->company_logo) { ?>
								<img src="{{url('jobpostimage/thumb400x265/'.$featuredpostjobs[0]->company_logo)}}" alt="Featured Job" class="img-responsive" width="400" height="265" />
							<?php }else{?>
							<img src="http://placehold.it/400x265.jpg" alt="Featured Job" class="img-responsive" />
							<?php } ?>
							
							<div class="featured-job">
								<?php if ($featuredpostjobs[0]->company_logo) { ?>
								<img src="{{url('jobpostimage/thumb60x60/'.$featuredpostjobs[0]->company_logo)}}" alt="" class="img-circle" />
								<?php }else{?>
								<img src="http://placehold.it/60x60.jpg" alt="Featured Job" class="img-responsive" />
							    <?php } ?>
								<div class="title">
									<h5>{{ ucfirst($featuredpostjobs[0]->jobtitle) }}</h5>
									<p>{{ ucfirst($featuredpostjobs[0]->companyname) }}</p>
								</div>
								<div class="data">
									<span class="city"><i class="fa fa-map-marker"></i>{{ucfirst($featuredpostjobs[0]->location) }}, {{ucfirst($featuredpostjobs[0]->jobregion) }}</span>
									<span class="type full-time"><i class="fa fa-clock-o"></i>{{ ucfirst($featuredpostjobs[0]->jobtype) }}</span>
									<span class="sallary"><i class="fa fa-dollar"></i>45,000</span>
								</div>
								<div class="description">
									<?php echo substr($featuredpostjobs[0]->companydescription, 0, 200); ?>
								</div>
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
				<div class="row">
					<div class="col-sm-12">
						<h2>How does it work</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<p>Curabitur et lorem a massa tempus aliquam. Aenean aliquam volutpat gravida. Pellentesque in neque nec tortor sagittis tempor quis in lectus. Vestibulum vehicula aliquet elit ut porta. Sed ipsum felis, interdum blandit purus sed, volutpat ultricies sem. Maecenas feugiat, lectus vitae luctus feugiat, nulla nisl dignissim velit, nec malesuada ligula orci et metus. In vulputate laoreet luctus.</p>
						<p>Sed hendrerit ligula tortor, eget iaculis velit vestibulum a. Phasellus convallis nisl pretium nisi porttitor, eu scelerisque mauris consectetur. Fusce pretium, dui placerat laoreet consectetur, nibh diam accumsan enim, sed fringilla turpis quam quis ex. Mauris a rhoncus tortor, a cursus urna. Sed et condimentum quam. Nunc dictum erat ut ante aliquam porttitor. Donec diam eros, bibendum et scelerisque egestas, aliquet ut nulla.</p>
						<p><a href="about.html" class="btn btn-primary">Learn More</a></p>
					</div>
					<div class="col-sm-6">
						<div class="video-wrapper">
							<iframe src="https://player.vimeo.com/video/121698707" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ HOW DOES IT WORK END ============ -->

		<!-- ============ MOBILE APP START ============ -->

		<section id="app" class="color2">
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
						</ul>
					</div>
					<div class="col-sm-3">
						<ul>
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

							<?php 
							foreach($testimonials as $keys => $value)
								{
									?>
							<div>
								<div class="col-sm-3 col-md-2">
								<img class="img-circle img-responsive" src="{{ url('testimonialsImages') }}/{{ $testimonials[$keys]->clientImage }}"/>
									
								</div>
								<div class="col-sm-9 col-md-10">
									<blockquote>
										<p><?PHP echo stripcslashes(substr($testimonials[$keys]->testiMonial, 0, 220)); ?>...</p>
										<footer>
											{{$testimonials[$keys]->clientName}}
											<cite title="Brand Manager in Ebay Inc.">{{$testimonials[$keys]->clientCompany}}</cite>
										</footer>
									</blockquote>
								</div>
							</div>
							<?php } ?>

							</div>
						<p><a href="{{url('testimonial')}}" class="btn btn-primary">Read All</a></p>
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
							<?php 
							$i=1;
							foreach($news as $key => $value) {?>
							<div>
							
					       <img class="img-responsive" src="{{url('newsImages/thumb800x530/'.$news[$key]->newsImage)}}"/>

								


								<h4><?php echo implode(explode('_', $news[$key]->newsTitle), ' '); ?></h4>
								
                   
                               <p style="text-align: justify;"><?PHP echo stripcslashes(substr($news[$key]->newsDescription, 0, 220)); ?>...</p>

								<p><a href="{{url('read_news/'.$news[$key]->newsTitle)}}" class="btn btn-primary">Read more</a></p>
							</div>
							<?php $i++; }?>

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

		

		