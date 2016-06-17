@extends('layout.master')
@section('title', 'Home Page')
@section('content')


		 <!-- ============ NAVBAR START ============ -->

		<div class="fm-container">
			<!-- Menu -->
			<div class="menu">
				<div class="button-close text-right">
					<a class="fm-button"><i class="fa fa-close fa-2x"></i></a>
				</div>
				<ul class="nav">
					<li class="active"><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{url('jobs')}}">Jobs</a></li>
					<li><a href="{{url('post-a-job')}}">Post a job</a></li>
					<li><a href="{{url('candidates')}}">Candidates</a></li>
					<li><a href="{{url('post-a-resume')}}">Post a Resume</a></li>
					<li><a href="#">Read More</a>
						<ul>
							<li><a href="{{url('job-details')}}">Job Details</a></li>
							<li><a href="{{url('resume')}}">Resume</a></li>
							<li><a href="{{url('company')}}">Company</a></li>
							<li><a href="{{url('blog')}}">Blog</a></li>
							<li><a href="{{url('post')}}">Single Post</a></li>
							<li><a href="{{url('about')}}">About Us</a></li>
							<li><a href="{{url('testimonials')}}">Testimonials</a></li>
							<li><a href="{{url('options')}}">Options</a></li>
						</ul>
					</li>
					<li><a href="">Job Seeker</a>
						<ul>
							<li><a class="link-register">Register</a></li>
							<li><a class="link-login">Login</a></li>
					    </ul>
					</li>
					<li><a href="">Job Recruiter</a>
						<ul>
							<li><a class="link-recruiter-register">Register</a></li>
							<li><a class="link-recruiter-login">Login</a></li>
					    </ul>
					</li>
				</ul>		
			</div>
			<!-- end Menu -->
		</div>

		<!-- ============ NAVBAR END ============ -->
		<!-- ============ JOBS START ============ -->

		<section id="jobs">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">

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
										<h5>Front End Developer</h5>
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
							<a href="#">
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
							<a href="#">
								<div class="row">
									<div class="col-md-1 hidden-sm hidden-xs">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									</div>
									<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 job-title">
										<h5>Front End Developer</h5>
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
							<a href="#">
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
							<a href="#">
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
							
							<!-- Job offer 1 -->
							<a href="#" class="applied">
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
							<a href="#">
								<div class="row">
									<div class="col-md-1 hidden-sm hidden-xs">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									</div>
									<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 job-title">
										<h5>Front End Developer</h5>
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
							<a href="#">
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
							<a href="#">
								<div class="row">
									<div class="col-md-1 hidden-sm hidden-xs">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									</div>
									<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 job-title">
										<h5>Front End Developer</h5>
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
							<a href="#">
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
							<a href="#">
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

						</div>

						<nav>
							<ul class="pagination">
								<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
								<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
							</ul>
						</nav>

					</div>
					<div class="col-sm-4" id="sidebar">

						<!-- Featured Jobs Start -->
						<div class="sidebar-widget">
							<h2>Featured Jobs</h2>
							<a href="#">
								<img src="http://placehold.it/400x265.jpg" alt="Featured Job" class="img-responsive" />
								<div class="featured-job">
									<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle pull-left" />
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
						<!-- Featured Jobs End -->

						<!-- Find a Job Start -->
						<div class="sidebar-widget" id="jobsearch">
							<h2>Find a Job</h2>
							<form>
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group" id="job-search-group">
											<label for="job-search" class="sr-only">Search</label>
											<input type="text" class="form-control" id="job-search" placeholder="Type and press enter">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<hr>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<h5>Career Level</h5>
										<div class="checkbox">
											<label>
												<input type="checkbox"> All Types
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Junior
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Middle
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Senior
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Expert
											</label>
										</div>
									</div>
									<div class="col-xs-6">
										<h5>Presence</h5>
										<div class="checkbox">
											<label>
												<input type="checkbox"> All Types
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Remote
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Office
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Relocation
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Travel a lot
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<hr>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<h5>Job Type</h5>
										<div class="checkbox">
											<label>
												<input type="checkbox"> All Types
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Freelance
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Part Time
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Full Time
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Internship
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Volunteer
											</label>
										</div>
									</div>
									<div class="col-xs-6">
										<h5>Location</h5>
										<div class="checkbox">
											<label>
												<input type="checkbox"> All Types
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> New York
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Los Angeles
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> San Francisco
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Chicago
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"> Boston
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<hr>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<h5>Experience</h5>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<p>More than <b><span id="years-field"></span></b> years</p>
									</div>
									<div class="col-xs-6">
										<div class="form-slider" id="years"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<hr>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<h5>Salary</h5>
										<div class="form-slider" id="salary"></div>
										<p>From <b><span id="salary-field-lower"></span></b> to  <b><span id="salary-field-upper"></span></b></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<hr>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<a class="btn btn-primary">Reset All Filters</a>
									</div>
								</div>
							</form>
						</div>
						<!-- Find a Job End -->

					</div>
				</div>
			</div>
		</section>

		<!-- ============ JOBS END ============ -->

		<!-- ============ CONTACT START ============ -->

		<!-- <section id="contact" class="color2">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<h2>Drop us a line</h2>
						<form role="form" name="contact-form" id="contact-form" action="process.php">
							<div class="form-group" id="contact-name-group">
								<label for="contact-name" class="sr-only">Name</label>
								<input type="text" class="form-control" id="contact-name" placeholder="Name">
							</div>
							<div class="form-group" id="contact-email-group">
								<label for="contact-email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="contact-email" placeholder="Email">
							</div>
							<div class="form-group" id="contact-subject-group">
								<label for="contact-subject" class="sr-only">Subject</label>
								<input type="text" class="form-control" id="contact-subject" placeholder="Subject">
							</div>
							<div class="form-group" id="contact-message-group">
								<label for="contact-message" class="sr-only">Message</label>
								<textarea class="form-control" rows="3" id="contact-message"></textarea>
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
					<div class="col-sm-6">
						<h2>Visit our office</h2>
						<div class="row">
							<div class="col-sm-6">
								<h5>New York</h5>
								<p>5 Park Avenue<br>
								New York, NY 10016<br>
								USA</p>
								<p><i class="fa fa-phone"></i>+1 718.242.5555<br>
								<i class="fa fa-fax"></i>+1 718.242.5556<br>
								<i class="fa fa-envelope"></i><a href="mailto:ny@jobseek.com">ny@jobseek.com</a></p>
								<p><i class="fa fa-clock-o"></i>Mon-Fri 9am - 5pm<br>
								<i class="fa fa-clock-o"></i>Sat 10am - 2pm<br>
								<i class="fa fa-clock-o"></i>Sun Closed</p>
							</div>
							<div class="col-sm-6">
								<h5>Los Angeles</h5>
								<p>8605 Santa Monica Blvd<br>
								Los Angeles, CA 90069-4109<br>
								USA</p>
								<p><i class="fa fa-phone"></i>+1 985.562.5555<br>
								<i class="fa fa-fax"></i>+1 985.562.5556<br>
								<i class="fa fa-envelope"></i><a href="mailto:la@jobseek.com">la@jobseek.com</a></p>
								<p><i class="fa fa-clock-o"></i>Mon-Fri 9am - 5pm<br>
								<i class="fa fa-clock-o"></i>Sat 10am - 2pm<br>
								<i class="fa fa-clock-o"></i>Sun Closed</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->

		<!-- ============ CONTACT END ============ -->

@endsection
