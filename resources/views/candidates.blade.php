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
		<!-- ============ TITLE START ============ -->

		<section id="title">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h1>Candidates</h1>
						<h4>Find your perfect match</h4>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ TITLE END ============ -->

		<!-- ============ JOBS START ============ -->

		<section id="jobs">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<h2>Candidates</h2>

						<div class="jobs">
							
							<!-- Candidate 1 -->
							<a href="#" class="featured">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Susie Johnson</h5>
										<p><strong>Project Manager</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>New York City, NY, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 3 weeks ago</p>
										<p class="candidate-tags">
											<span class="badge">Marketing</span>
											<span class="badge">Sale</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 2 -->
							<a href="#" class="featured">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Matt Berry</h5>
										<p><strong>Senior Web Developer</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>San Jose, CA, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 2 weeks ago</p>
										<p class="candidate-tags">
											<span class="badge">IT</span>
											<span class="badge">Web development</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 3 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Spencer Conner</h5>
										<p><strong>Front End Developer</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>Seattle, WA, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 1 week ago</p>
										<p class="candidate-tags">
											<span class="badge">IT</span>
											<span class="badge">Web development</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 4 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Bernard Byrd</h5>
										<p><strong>Key Account Manager</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>Los Angeles, CA, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 5 days ago</p>
										<p class="candidate-tags">
											<span class="badge">Marketing</span>
											<span class="badge">Sales</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 5 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Grace Bailey</h5>
										<p><strong>Sales Manager</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>Chicago, IL, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 5 days ago</p>
										<p class="candidate-tags">
											<span class="badge">Marketing</span>
											<span class="badge">Sales</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 6 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Susie Johnson</h5>
										<p><strong>Project Manager</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>New York City, NY, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 3 weeks ago</p>
										<p class="candidate-tags">
											<span class="badge">Marketing</span>
											<span class="badge">Sale</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 7 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Matt Berry</h5>
										<p><strong>Senior Web Developer</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>San Jose, CA, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 2 weeks ago</p>
										<p class="candidate-tags">
											<span class="badge">IT</span>
											<span class="badge">Web development</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 8 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Spencer Conner</h5>
										<p><strong>Front End Developer</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>Seattle, WA, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 1 week ago</p>
										<p class="candidate-tags">
											<span class="badge">IT</span>
											<span class="badge">Web development</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 9 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Bernard Byrd</h5>
										<p><strong>Key Account Manager</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>Los Angeles, CA, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 5 days ago</p>
										<p class="candidate-tags">
											<span class="badge">Marketing</span>
											<span class="badge">Sales</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 10 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Grace Bailey</h5>
										<p><strong>Sales Manager</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>Chicago, IL, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 5 days ago</p>
										<p class="candidate-tags">
											<span class="badge">Marketing</span>
											<span class="badge">Sales</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 11 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Susie Johnson</h5>
										<p><strong>Project Manager</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>New York City, NY, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 3 weeks ago</p>
										<p class="candidate-tags">
											<span class="badge">Marketing</span>
											<span class="badge">Sale</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 12 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Matt Berry</h5>
										<p><strong>Senior Web Developer</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>San Jose, CA, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 2 weeks ago</p>
										<p class="candidate-tags">
											<span class="badge">IT</span>
											<span class="badge">Web development</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 13 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Spencer Conner</h5>
										<p><strong>Front End Developer</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>Seattle, WA, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 1 week ago</p>
										<p class="candidate-tags">
											<span class="badge">IT</span>
											<span class="badge">Web development</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 14 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Bernard Byrd</h5>
										<p><strong>Key Account Manager</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>Los Angeles, CA, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 5 days ago</p>
										<p class="candidate-tags">
											<span class="badge">Marketing</span>
											<span class="badge">Sales</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 15 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Grace Bailey</h5>
										<p><strong>Sales Manager</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>Chicago, IL, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 5 days ago</p>
										<p class="candidate-tags">
											<span class="badge">Marketing</span>
											<span class="badge">Sales</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 16 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Susie Johnson</h5>
										<p><strong>Project Manager</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>New York City, NY, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 3 weeks ago</p>
										<p class="candidate-tags">
											<span class="badge">Marketing</span>
											<span class="badge">Sale</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 17 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Matt Berry</h5>
										<p><strong>Senior Web Developer</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>San Jose, CA, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 2 weeks ago</p>
										<p class="candidate-tags">
											<span class="badge">IT</span>
											<span class="badge">Web development</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 18 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Spencer Conner</h5>
										<p><strong>Front End Developer</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>Seattle, WA, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 1 week ago</p>
										<p class="candidate-tags">
											<span class="badge">IT</span>
											<span class="badge">Web development</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 19 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Bernard Byrd</h5>
										<p><strong>Key Account Manager</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>Los Angeles, CA, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 5 days ago</p>
										<p class="candidate-tags">
											<span class="badge">Marketing</span>
											<span class="badge">Sales</span>
										</p>
									</div>
								</div>
							</a>
							
							<!-- Candidate 20 -->
							<a href="#">
								<div class="row">
									<div class="col-xs-3 col-sm-2 col-lg-1">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle img-responsive" />
									</div>
									<div class="col-xs-9 col-sm-4 col-md-5 col-lg-4 candidate-name">
										<h5>Grace Bailey</h5>
										<p><strong>Sales Manager</strong></p>
									</div>
									<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 candidate-location">
										<p><strong>Chicago, IL, USA</strong></p>
										<p>743.6 mi away</p>
									</div>
									<div class="hidden-xs hidden-sm hidden-md col-lg-3">
										<p class="candidate-date">Updated 5 days ago</p>
										<p class="candidate-tags">
											<span class="badge">Marketing</span>
											<span class="badge">Sales</span>
										</p>
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
							<h2>Featured Candidate</h2>
							<a href="#">
								<img src="http://placehold.it/400x260.jpg" alt="Featured Job" class="img-responsive" />
								<div class="featured-job">
									<img src="http://placehold.it/60x60.jpg" alt="" class="img-circle pull-left" />
									<div class="title">
										<h5>Susie Johnson</h5>
										<p>Project Manager</p>
									</div>
									<div class="data">
										<span class="city"><i class="fa fa-map-marker"></i>New York City</span>
										<span class="experience"><i class="fa fa-trophy"></i>12 years</span>
										<span class="sallary"><i class="fa fa-dollar"></i>45,000</span>
									</div>
									<div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tristique euismod lorem, a consequat orci consequat a. Donec ullamcorper tincidunt nunc, ut aliquam est pellentesque porta. In neque erat, malesuada sit amet orci ac, laoreet laoreet mauris.</div>
								</div>
							</a>
						</div>
						<!-- Featured Jobs End -->

						<!-- Find a Job Start -->
						<div class="sidebar-widget" id="jobsearch">
							<h2>Find a Candidate</h2>
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


		

		@endsection