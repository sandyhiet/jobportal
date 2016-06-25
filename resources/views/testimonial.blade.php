@extends('layouts.master')
@section('title', 'Home Page')
@section('content')

		<!-- ============ TITLE START ============ -->

		<section id="title">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h1>Testimonials</h1>
						<h4>Kind words from happy members</h4>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ TITLE END ============ -->

		<!-- ============ TESTIMONIALS START ============ -->

		<section id="testimonials-long">
			<div class="container">
		        <?php 
				foreach($testimonials as $keys => $value)
				{
				?>
				<!-- Testimonial 1 -->
				<div class="row">
					<div class="col-sm-3 col-md-2">
					<img class="img-circle img-responsive" src="{{ url('testimonialsImages') }}/{{ $testimonials[$keys]->clientImage }}"/>
						
					</div>
					<div class="col-sm-9 col-md-10">
						<blockquote>
							<p><?PHP echo stripcslashes(substr($testimonials[$keys]->testiMonial, 0, 220)); ?></p>
							<footer>
								{{$testimonials[$keys]->clientName}}
								<cite title="Brand Manager in Ebay Inc.">{{$testimonials[$keys]->clientCompany}}</cite>
							</footer>
						</blockquote>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<hr>
					</div>
				</div>
		        <?php }?>
				

			</div>
		</section>

		<!-- ============ TESTIMONIALS END ============ -->

		
		@endsection