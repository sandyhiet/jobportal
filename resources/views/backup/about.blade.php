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
						<h1>About Us</h1>
						<h4>Short story of our company</h4>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ TITLE END ============ -->

		<!-- ============ STORY START ============ -->

		<section id="story">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<p>Maecenas mollis dictum lectus quis scelerisque. Nulla at rutrum ipsum. Praesent augue quam, facilisis vitae felis vel, convallis convallis nisi. Donec maximus accumsan purus vel tempus. Aenean pretium luctus velit id fermentum. Aenean non velit non nulla interdum venenatis. Integer in libero sagittis, consequat est quis, commodo odio. Aliquam eu vulputate neque. Nunc et massa leo. Vestibulum a pretium dolor. Proin et fermentum sapien. Cras malesuada neque ac purus fermentum, a placerat quam malesuada. Quisque sollicitudin tellus a ex eleifend mattis. In vitae ipsum in mauris vestibulum imperdiet.</p>
					</div>
					<div class="col-sm-6">
						<p>Maecenas mollis dictum lectus quis scelerisque. Nulla at rutrum ipsum. Praesent augue quam, facilisis vitae felis vel, convallis convallis nisi. Donec maximus accumsan purus vel tempus. Aenean pretium luctus velit id fermentum. Aenean non velit non nulla interdum venenatis. Integer in libero sagittis, consequat est quis, commodo odio. Aliquam eu vulputate neque. Nunc et massa leo. Vestibulum a pretium dolor. Proin et fermentum sapien. Cras malesuada neque ac purus fermentum, a placerat quam malesuada. Quisque sollicitudin tellus a ex eleifend mattis. In vitae ipsum in mauris vestibulum imperdiet.</p>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ STORY END ============ -->

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
									<img src="http://placehold.it/140x140.jpg" class="img-circle img-responsive" alt="testimonial" />
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

		<!-- ============ TEAM START ============ -->

		<section id="team" class="color1">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2>Our Team</h2>
						<div class="owl-carousel">

							<!-- Team Member 1 -->
							<div class="team-member text-center img-rounded">
								<img src="http://placehold.it/140x140.jpg" class="img-responsive img-circle" alt="" />
								<h5>John Doe</h5>
								<h6>Managing Director</h6>
								<p>Aenean non velit non nulla interdum venenatis. Integer in libero sagittis, consequat est quis, commodo odio. Aliquam eu vulputate neque.</p>
								<p>
									<a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-instagram fa-2x"></i></a>
								</p>
							</div>

							<!-- Team Member 2 -->
							<div class="team-member text-center img-rounded">
								<img src="http://placehold.it/140x140.jpg" class="img-responsive img-circle" alt="" />
								<h5>Jane Smith</h5>
								<h6>Sales Director</h6>
								<p>Aenean non velit non nulla interdum venenatis. Integer in libero sagittis, consequat est quis, commodo odio. Aliquam eu vulputate neque.</p>
								<p>
									<a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-instagram fa-2x"></i></a>
								</p>
							</div>

							<!-- Team Member 3 -->
							<div class="team-member text-center img-rounded">
								<img src="http://placehold.it/140x140.jpg" class="img-responsive img-circle" alt="" />
								<h5>Ryan Hampton</h5>
								<h6>Key Account Manager</h6>
								<p>Aenean non velit non nulla interdum venenatis. Integer in libero sagittis, consequat est quis, commodo odio. Aliquam eu vulputate neque.</p>
								<p>
									<a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-instagram fa-2x"></i></a>
								</p>
							</div>

							<!-- Team Member 4 -->
							<div class="team-member text-center img-rounded">
								<img src="http://placehold.it/140x140.jpg" class="img-responsive img-circle" alt="" />
								<h5>Marilyn Strickland</h5>
								<h6>Account Manager</h6>
								<p>Aenean non velit non nulla interdum venenatis. Integer in libero sagittis, consequat est quis, commodo odio. Aliquam eu vulputate neque.</p>
								<p>
									<a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-instagram fa-2x"></i></a>
								</p>
							</div>

							<!-- Team Member 5 -->
							<div class="team-member text-center img-rounded">
								<img src="http://placehold.it/140x140.jpg" class="img-responsive img-circle" alt="" />
								<h5>Harold Chandler</h5>
								<h6>Support Agent</h6>
								<p>Aenean non velit non nulla interdum venenatis. Integer in libero sagittis, consequat est quis, commodo odio. Aliquam eu vulputate neque.</p>
								<p>
									<a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-instagram fa-2x"></i></a>
								</p>
							</div>

							<!-- Team Member 5 -->
							<div class="team-member text-center img-rounded">
								<img src="http://placehold.it/140x140.jpg" class="img-responsive img-circle" alt="" />
								<h5>Mandy Fisher</h5>
								<h6>Sales Representative</h6>
								<p>Aenean non velit non nulla interdum venenatis. Integer in libero sagittis, consequat est quis, commodo odio. Aliquam eu vulputate neque.</p>
								<p>
									<a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-instagram fa-2x"></i></a>
								</p>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ TEAM END ============ -->

		@endsection
