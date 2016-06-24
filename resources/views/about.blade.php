@extends('layouts.master')
@section('title', 'Home Page')
@section('content')
		
		<!-- ============ TITLE START ============ -->

		<section id="title">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h1>About Us</h1>

						<h4><?php echo implode(explode('_', $about_us[0]->title), ' '); ?></h4>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ TITLE END ============ -->

		<!-- ============ STORY START ============ -->

		<section id="story">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<p style="text-align: justify;">{!!$about_us[0]->content!!}</p>
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

						<?php 
						foreach ($OurTeam as $key => $value) {
							
					?>

							<!-- Team Member 1 -->
							<div class="team-member text-center img-rounded">
							<img src="{{url('ourTeamImage/thumb360X407/'.$OurTeam[$key]->image)}}" class="img-responsive img-circle" width="150" >
								
								<h5>{{$OurTeam[$key]->name}}</h5>
								<h6>{{$OurTeam[$key]->designation}}</h6>


								<p><?PHP echo stripcslashes(substr($OurTeam[$key]->content, 0, 50)); ?>...</p>
								<p>
									<a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
									<a href="#"><i class="fa fa-instagram fa-2x"></i></a>
								</p>
							</div>
                        <?php }?>
							
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ TEAM END ============ -->


		

		@endsection
