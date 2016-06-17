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
					<div class="col-sm-2">
						<img src="http://placehold.it/140x140.jpg" alt="" class="img-responsive img-circle" />
					</div>
					<div class="col-sm-10">
						<h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h1>
						<div class="meta">
							<span><i class="fa fa-user"></i>John Doe</span>
							<span><i class="fa fa-calendar"></i>28/09/2015</span>
							<span><i class="fa fa-comment"></i>24</span>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ TITLE END ============ -->

		<!-- ============ CONTENT START ============ -->

		<section id="blog">
			<div class="container">
				<div class="row">

					<div class="col-sm-8">

						<!-- POSTS START -->

						<article>
							<p><img src="http://placehold.it/800x530.jpg" alt="" class="img-responsive" /></p>
							<p>Proin eu erat tincidunt, scelerisque ipsum non, fringilla dolor. Quisque interdum congue tellus. Aliquam vel odio sit amet ex laoreet finibus. Etiam commodo purus tortor, sed interdum justo faucibus vitae. Praesent ac elit a felis luctus facilisis. Aenean et magna elit. Morbi eget nulla volutpat, egestas ex vel, blandit enim. Pellentesque sit amet metus luctus, congue.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel sapien nibh. Mauris et neque tellus. In tellus felis, ornare in urna commodo, volutpat gravida sem. Integer vitae lorem sit amet nibh ornare varius. Sed sollicitudin leo quis dui dictum fermentum. Nulla at fringilla dolor. Proin magna nibh, dignissim vitae enim quis, bibendum euismod ipsum. In mattis nulla nulla. Cras suscipit aliquet augue in vulputate. Donec in enim non elit ornare sodales id nec arcu.</p>
							<h2>Gallery</h2>
							<ul class="gallery row">
								<li class="col-xs-4 col-sm-3 col-lg-2">
									<a href="http://placehold.it/800x530.jpg" class="fancybox" data-fancybox-group="gallery" title="Sample title">
										<img src="http://placehold.it/200x200.jpg" class="img-responsive" alt="" />
									</a>
								</li>
								<li class="col-xs-4 col-sm-3 col-lg-2">
									<a href="http://placehold.it/800x530.jpg" class="fancybox" data-fancybox-group="gallery" title="Sample title">
										<img src="http://placehold.it/200x200.jpg" class="img-responsive" alt="" />
									</a>
								</li>
								<li class="col-xs-4 col-sm-3 col-lg-2">
									<a href="http://placehold.it/800x530.jpg" class="fancybox" data-fancybox-group="gallery" title="Sample title">
										<img src="http://placehold.it/200x200.jpg" class="img-responsive" alt="" />
									</a>
								</li>
								<li class="col-xs-4 col-sm-3 col-lg-2">
									<a href="http://placehold.it/800x530.jpg" class="fancybox" data-fancybox-group="gallery" title="Sample title">
										<img src="http://placehold.it/200x200.jpg" class="img-responsive" alt="" />
									</a>
								</li>
								<li class="col-xs-4 col-sm-3 col-lg-2">
									<a href="http://placehold.it/800x530.jpg" class="fancybox" data-fancybox-group="gallery" title="Sample title">
										<img src="http://placehold.it/200x200.jpg" class="img-responsive" alt="" />
									</a>
								</li>
								<li class="col-xs-4 col-sm-3 col-lg-2">
									<a href="http://placehold.it/800x530.jpg" class="fancybox" data-fancybox-group="gallery" title="Sample title">
										<img src="http://placehold.it/200x200.jpg" class="img-responsive" alt="" />
									</a>
								</li>
								<li class="col-xs-4 col-sm-3 col-lg-2">
									<a href="http://placehold.it/800x530.jpg" class="fancybox" data-fancybox-group="gallery" title="Sample title">
										<img src="http://placehold.it/200x200.jpg" class="img-responsive" alt="" />
									</a>
								</li>
								<li class="col-xs-4 col-sm-3 col-lg-2">
									<a href="http://placehold.it/800x530.jpg" class="fancybox" data-fancybox-group="gallery" title="Sample title">
										<img src="http://placehold.it/200x200.jpg" class="img-responsive" alt="" />
									</a>
								</li>
								<li class="col-xs-4 col-sm-3 col-lg-2">
									<a href="http://placehold.it/800x530.jpg" class="fancybox" data-fancybox-group="gallery" title="Sample title">
										<img src="http://placehold.it/200x200.jpg" class="img-responsive" alt="" />
									</a>
								</li>
								<li class="col-xs-4 col-sm-3 col-lg-2">
									<a href="http://placehold.it/800x530.jpg" class="fancybox" data-fancybox-group="gallery" title="Sample title">
										<img src="http://placehold.it/200x200.jpg" class="img-responsive" alt="" />
									</a>
								</li>
								<li class="col-xs-4 col-sm-3 col-lg-2">
									<a href="http://placehold.it/800x530.jpg" class="fancybox" data-fancybox-group="gallery" title="Sample title">
										<img src="http://placehold.it/200x200.jpg" class="img-responsive" alt="" />
									</a>
								</li>
								<li class="col-xs-4 col-sm-3 col-lg-2">
									<a href="http://placehold.it/800x530.jpg" class="fancybox" data-fancybox-group="gallery" title="Sample title">
										<img src="http://placehold.it/200x200.jpg" class="img-responsive" alt="" />
									</a>
								</li>
							</ul>
							<p>Proin eu erat tincidunt, scelerisque ipsum non, fringilla dolor. Quisque interdum congue tellus. Aliquam vel odio sit amet ex laoreet finibus. Etiam commodo purus tortor, sed interdum justo faucibus vitae. Praesent ac elit a felis luctus facilisis. Aenean et magna elit. Morbi eget nulla volutpat, egestas ex vel, blandit enim. Pellentesque sit amet metus luctus, congue.</p>
							<blockquote>Maecenas mollis dictum lectus quis scelerisque. Nulla at rutrum ipsum. Praesent augue quam, facilisis vitae felis vel, convallis convallis nisi. Donec maximus accumsan purus vel tempus. Aenean pretium luctus velit id fermentum.</blockquote>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel sapien nibh. Mauris et neque tellus. In tellus felis, ornare in urna commodo, volutpat gravida sem. Integer vitae lorem sit amet nibh ornare varius. Sed sollicitudin leo quis dui dictum fermentum. Nulla at fringilla dolor. Proin magna nibh, dignissim vitae enim quis, bibendum euismod ipsum. In mattis nulla nulla. Cras suscipit aliquet augue in vulputate. Donec in enim non elit ornare sodales id nec arcu.</p>
						</article>

						<!-- POSTS END -->

						<!-- SHARING START -->

						<ul class="share">
							<li><h5>Share it</h5></li>
							<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html"><i class="fa fa-2x fa-facebook-square"></i></a></li>
							<li><a href="https://twitter.com/home?status=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html"><i class="fa fa-2x fa-twitter-square"></i></a></li>
							<li><a href="https://plus.google.com/share?url=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html"><i class="fa fa-2x fa-google-plus-square"></i></a></li>
							<li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html&amp;title=Jobseek%20-%20Job%20Board%20Responsive%20HTML%20Template&amp;summary=&amp;source="><i class="fa fa-2x fa-linkedin-square"></i></a></li>
						</ul>

						<!-- SHARING END -->

						<!-- TAGS START -->

						<ul class="tags">
							<li><i class="fa fa-tag"></i></li>
							<li><a href="#">job</a></li>
							<li><a href="#">work</a></li>
							<li><a href="#">company</a></li>
							<li><a href="#">resume</a></li>
							<li><a href="#">market</a></li>
							<li><a href="#">business</a></li>
						</ul>

						<!-- TAGS END -->

						<!-- AUTHOR START -->

						<div id="author" class="row">
							<div class="col-sm-2">
								<img src="http://placehold.it/140x140.jpg" alt="" class="img-responsive img-circle" />
							</div>
							<div class="col-sm-10">
								<h5>About The Author</h5>
								<p>Aenean non velit non nulla interdum venenatis. Integer in libero sagittis, consequat est quis, commodo odio. Aliquam eu vulputate neque. Nunc et massa leo. Vestibulum a pretium dolor. Proin et fermentum sapien.</p>
								<ul class="social">
									<li><a href="https://www.facebook.com/"><i class="fa fa-2x fa-facebook-square"></i></a></li>
									<li><a href="https://twitter.com/"><i class="fa fa-2x fa-twitter-square"></i></a></li>
									<li><a href="https://instagram.com/"><i class="fa fa-2x fa-instagram"></i></a></li>
									<li><a href="https://www.linkedin.com/"><i class="fa fa-2x fa-linkedin-square"></i></a></li>
								</ul>
							</div>
						</div>

						<!-- AUTHOR END -->

						<!-- PAGING START -->

						<ul id="paging">
							<li class="pull-left"><a href="#" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Prev</a></li>
							<li class="pull-right"><a href="#" class="btn btn-primary">Next <i class="fa fa-arrow-right"></i></a></li>
						</ul>

						<!-- PAGING END -->

						<hr>

						<!-- COMMENTS START -->

						<div class="row">
							<div class="col-sm-12">
								<h2>6 Comments</h2>
								<ul class="media-list">

									<li class="media">
										<a class="pull-left media-photo" href="#"><img class="media-object img-responsive img-circle" src="images/job1.jpg" alt="" /></a>
										<div class="media-body">
											<p class="media-heading"><a href="#">John Doe, 28/08/2015 at 9:37 pm:</a><a href="#" class="pull-right"><i class="fa fa-reply"></i> &nbsp; Reply</a></p>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit id nisi non varius. Aliquam erat volutpat. Pellentesque in dolor vel tortor placerat rutrum. Aenean suscipit lacus nec adipiscing tristique. Mauris semper aliquam purus eu tempor. Etiam gravida, lorem vel imperdiet ullamcorper, est mauris lacinia elit, ut sollicitudin tellus erat et felis. Vestibulum id rhoncus sapien. Mauris scelerisque imperdiet mollis. Nullam eu volutpat urna, quis facilisis metus.</p>
											
											<div class="media" data-scroll-reveal>
												<a class="pull-left media-photo" href="#"><img class="media-object img-responsive img-circle" src="images/job2.jpg" alt="" /></a>
												<div class="media-body">
													<p class="media-heading"><a href="#">John Doe, 28/08/2015 at 9:37 pm:</a><a href="#" class="pull-right"><i class="fa fa-reply"></i> &nbsp; Reply</a></p>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit id nisi non varius. Aliquam erat volutpat. Pellentesque in dolor vel tortor placerat rutrum. Aenean suscipit lacus nec adipiscing tristique. Mauris semper aliquam purus eu tempor. Etiam gravida, lorem vel imperdiet ullamcorper, est mauris lacinia elit, ut sollicitudin tellus erat et felis. Vestibulum id rhoncus sapien. Mauris scelerisque imperdiet mollis. Nullam eu volutpat urna, quis facilisis metus.</p>

													<div class="media" data-scroll-reveal>
														<a class="pull-left media-photo" href="#"><img class="media-object img-responsive img-circle" src="images/job3.jpg" alt="" /></a>
														<div class="media-body">
															<p class="media-heading"><a href="#">John Doe, 28/08/2015 at 9:37 pm:</a><a href="#" class="pull-right"><i class="fa fa-reply"></i> &nbsp; Reply</a></p>
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit id nisi non varius. Aliquam erat volutpat. Pellentesque in dolor vel tortor placerat rutrum. Aenean suscipit lacus nec adipiscing tristique. Mauris semper aliquam purus eu tempor. Etiam gravida, lorem vel imperdiet ullamcorper, est mauris lacinia elit, ut sollicitudin tellus erat et felis. Vestibulum id rhoncus sapien. Mauris scelerisque imperdiet mollis. Nullam eu volutpat urna, quis facilisis metus.</p>
														</div>
													</div>

												</div>
											</div>

										</div>
									</li>

									<li class="media" data-scroll-reveal>
										<a class="pull-left media-photo" href="#"><img class="media-object img-responsive img-circle" src="images/job4.jpg" alt="" /></a>
										<div class="media-body">
											<p class="media-heading"><a href="#">John Doe, 28/08/2015 at 9:37 pm:</a><a href="#" class="pull-right"><i class="fa fa-reply"></i> &nbsp; Reply</a></p>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit id nisi non varius. Aliquam erat volutpat. Pellentesque in dolor vel tortor placerat rutrum. Aenean suscipit lacus nec adipiscing tristique. Mauris semper aliquam purus eu tempor. Etiam gravida, lorem vel imperdiet ullamcorper, est mauris lacinia elit, ut sollicitudin tellus erat et felis. Vestibulum id rhoncus sapien. Mauris scelerisque imperdiet mollis. Nullam eu volutpat urna, quis facilisis metus.</p>

											<div class="media" data-scroll-reveal>
												<a class="pull-left media-photo" href="#"><img class="media-object img-responsive img-circle" src="images/job5.jpg" alt="" /></a>
												<div class="media-body">
													<p class="media-heading"><a href="#">John Doe, 28/08/2015 at 9:37 pm:</a><a href="#" class="pull-right"><i class="fa fa-reply"></i> &nbsp; Reply</a></p>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit id nisi non varius. Aliquam erat volutpat. Pellentesque in dolor vel tortor placerat rutrum. Aenean suscipit lacus nec adipiscing tristique. Mauris semper aliquam purus eu tempor. Etiam gravida, lorem vel imperdiet ullamcorper, est mauris lacinia elit, ut sollicitudin tellus erat et felis. Vestibulum id rhoncus sapien. Mauris scelerisque imperdiet mollis. Nullam eu volutpat urna, quis facilisis metus.</p>

													<div class="media" data-scroll-reveal>
														<a class="pull-left media-photo" href="#"><img class="media-object img-responsive img-circle" src="images/job1.jpg" alt="" /></a>
														<div class="media-body">
															<p class="media-heading"><a href="#">John Doe, 28/08/2015 at 9:37 pm:</a><a href="#" class="pull-right"><i class="fa fa-reply"></i> &nbsp; Reply</a></p>
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit id nisi non varius. Aliquam erat volutpat. Pellentesque in dolor vel tortor placerat rutrum. Aenean suscipit lacus nec adipiscing tristique. Mauris semper aliquam purus eu tempor. Etiam gravida, lorem vel imperdiet ullamcorper, est mauris lacinia elit, ut sollicitudin tellus erat et felis. Vestibulum id rhoncus sapien. Mauris scelerisque imperdiet mollis. Nullam eu volutpat urna, quis facilisis metus.</p>
														</div>
													</div>

												</div>
											</div>

										</div>
									</li>
								</ul>
							</div>
						</div>

						<!-- COMMENTS END -->

						<hr>

						<!-- COMMENT FORM START -->

						<h2>Write a Comment</h2>
						<form role="form">
							<div class="row" data-scroll-reveal>
								<div class="form-group col-sm-6">
									<input type="text" class="form-control" id="input-comment-name" placeholder="Name">
								</div>
								<div class="form-group col-sm-6">
									<input type="email" class="form-control" id="input-comment-email" placeholder="Email">
								</div>
							</div>
							<div class="row" data-scroll-reveal>
								<div class="form-group col-sm-12">
									<textarea class="form-control" rows="5"></textarea>
								</div>
							</div>
							<div class="row" data-scroll-reveal>
								<div class="form-group col-sm-12">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>

						<!-- COMMENTS FORM END -->
						
					</div>

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
