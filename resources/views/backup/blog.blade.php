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
						<h1>Blog</h1>
						<h4>Latest News</h4>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ TITLE END ============ -->

		<!-- ============ CONTENT START ============ -->

		<section id="blog">
			<div class="container">
				<div class="row">

					<!-- POSTS START -->

					<div class="col-sm-8">
						<article>

							<div class="post row">
								<div class="col-sm-2">
									<img src="http://placehold.it/140x140.jpg" alt="" class="img-responsive img-circle" />
								</div>
								<div class="col-sm-10">
									<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
									<div class="meta">
										<span><i class="fa fa-user"></i>John Doe</span>
										<span><i class="fa fa-calendar"></i>28/09/2015</span>
										<span><i class="fa fa-comment"></i>24</span>
									</div>
									<p><img src="http://placehold.it/800x530.jpg" alt="" class="img-responsive" /></p>
									<p>Proin eu erat tincidunt, scelerisque ipsum non, fringilla dolor. Quisque interdum congue tellus. Aliquam vel odio sit amet ex laoreet finibus. Etiam commodo purus tortor, sed interdum justo faucibus vitae. Praesent ac elit a felis luctus facilisis. Aenean et magna elit. Morbi eget nulla volutpat, egestas ex vel, blandit enim.</p>
									<a href="post.html" class="btn btn-primary">Read more &nbsp; <i class="fa fa-arrow-right"></i></a>
								</div>
							</div>

							<hr>

							<div class="post row">
								<div class="col-sm-2">
									<img src="http://placehold.it/140x140.jpg" alt="" class="img-responsive img-circle" />
								</div>
								<div class="col-sm-10">
									<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
									<div class="meta">
										<span><i class="fa fa-user"></i>John Doe</span>
										<span><i class="fa fa-calendar"></i>24/09/2015</span>
										<span><i class="fa fa-comment"></i>18</span>
									</div>
									<p><img src="http://placehold.it/800x530.jpg" alt="" class="img-responsive" /></p>
									<p>Proin eu erat tincidunt, scelerisque ipsum non, fringilla dolor. Quisque interdum congue tellus. Aliquam vel odio sit amet ex laoreet finibus. Etiam commodo purus tortor, sed interdum justo faucibus vitae. Praesent ac elit a felis luctus facilisis. Aenean et magna elit. Morbi eget nulla volutpat, egestas ex vel, blandit enim.</p>
									<a href="post.html" class="btn btn-primary">Read more &nbsp; <i class="fa fa-arrow-right"></i></a>
								</div>
							</div>

							<hr>

							<div class="post row">
								<div class="col-sm-2">
									<img src="http://placehold.it/140x140.jpg" alt="" class="img-responsive img-circle" />
								</div>
								<div class="col-sm-10">
									<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
									<div class="meta">
										<span><i class="fa fa-user"></i>John Doe</span>
										<span><i class="fa fa-calendar"></i>21/09/2015</span>
										<span><i class="fa fa-comment"></i>8</span>
									</div>
									<p><img src="http://placehold.it/800x530.jpg" alt="" class="img-responsive" /></p>
									<p>Proin eu erat tincidunt, scelerisque ipsum non, fringilla dolor. Quisque interdum congue tellus. Aliquam vel odio sit amet ex laoreet finibus. Etiam commodo purus tortor, sed interdum justo faucibus vitae. Praesent ac elit a felis luctus facilisis. Aenean et magna elit. Morbi eget nulla volutpat, egestas ex vel, blandit enim.</p>
									<a href="post.html" class="btn btn-primary">Read more &nbsp; <i class="fa fa-arrow-right"></i></a>
								</div>
							</div>

							<hr>

							<div class="post row">
								<div class="col-sm-2">
									<img src="http://placehold.it/140x140.jpg" alt="" class="img-responsive img-circle" />
								</div>
								<div class="col-sm-10">
									<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
									<div class="meta">
										<span><i class="fa fa-user"></i>John Doe</span>
										<span><i class="fa fa-calendar"></i>17/09/2015</span>
										<span><i class="fa fa-comment"></i>9</span>
									</div>
									<p><img src="http://placehold.it/800x530.jpg" alt="" class="img-responsive" /></p>
									<p>Proin eu erat tincidunt, scelerisque ipsum non, fringilla dolor. Quisque interdum congue tellus. Aliquam vel odio sit amet ex laoreet finibus. Etiam commodo purus tortor, sed interdum justo faucibus vitae. Praesent ac elit a felis luctus facilisis. Aenean et magna elit. Morbi eget nulla volutpat, egestas ex vel, blandit enim.</p>
									<a href="post.html" class="btn btn-primary">Read more &nbsp; <i class="fa fa-arrow-right"></i></a>
								</div>
							</div>

							<hr>

						<!-- PAGINATION START -->
						<ul class="pagination" data-scroll-reveal>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next &nbsp; <i class="fa fa-angle-right"></i></a></li>
						</ul>
						<!-- PAGINATION END -->

						</article>
					</div>

					<!-- POSTS END -->

					<!-- SIDEBAR START -->

					<div class="col-sm-4" id="sidebar">

						<div class="sidebar-links" id="categories">
							<h5>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-folder fa-stack-1x fa-inverse"></i>
								</span>
								Categories
							</h5>
							<ul>
								<li><a href="#">Companies</a></li>
								<li><a href="#">Jobs</a></li>
								<li><a href="#">Resumes</a></li>
								<li><a href="#">Market</a></li>
							</ul>
						</div>

						<div class="sidebar-links" id="archives">
							<h5>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-archive fa-stack-1x fa-inverse"></i>
								</span>
								Archives
							</h5>
							<ul>
								<li><a href="#">April 2015</a></li>
								<li><a href="#">March 2015</a></li>
								<li><a href="#">February 2015</a></li>
								<li><a href="#">January 2015</a></li>
							</ul>
						</div>

						<div class="sidebar-links" id="recent-posts">
							<h5>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-flag fa-stack-1x fa-inverse"></i>
								</span>
								Recent Posts
							</h5>
							<ul>
								<li><a href="#"><span class="meta">28/04/2015 by Susie Johnson</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
								<li><a href="#"><span class="meta">26/04/2015 by Matt Berry</span>Proin eu erat tincidunt, scelerisque ipsum non, fringilla dolor.</a></li>
								<li><a href="#"><span class="meta">24/04/2015 by Spencer Conner</span>Quisque interdum congue tellus. Aliquam vel odio sit amet ex laoreet finibus.</a></li>
								<li><a href="#"><span class="meta">22/04/2015 by Nadine Carlson</span>Etiam commodo purus tortor, sed interdum justo faucibus vitae.</a></li>
							</ul>
						</div>

						<div class="sidebar-links" id="recent-comments">
							<h5>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-flag fa-stack-1x fa-inverse"></i>
								</span>
								Recent Comments
							</h5>
							<ul>
								<li><a href="#"><span class="meta">Susie Johnson on</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
								<li><a href="#"><span class="meta">Matt Berry on</span>Proin eu erat tincidunt, scelerisque ipsum non, fringilla dolor.</a></li>
								<li><a href="#"><span class="meta">Spencer Conner on</span>Quisque interdum congue tellus. Aliquam vel odio sit amet ex laoreet finibus.</a></li>
								<li><a href="#"><span class="meta">Nadine Carlson on</span>Etiam commodo purus tortor, sed interdum justo faucibus vitae.</a></li>
							</ul>
						</div>

					</div>

					<!-- SIDEBAR END -->

				</div>
			</div>
		</section>

		<!-- ============ CONTENT END ============ -->

		@endsection