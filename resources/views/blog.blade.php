@extends('layouts.master')
@section('title', 'Home Page')
@section('content')

		 
		 
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
                <?php 
                $i=1;
				foreach($blogs as $keys => $value)
				{
				?>
							<div class="post row">
								<div class="col-sm-2">
								<img src="{{url('blogImages/thumb358x300/'. $blogs[$keys]->blogThumbImage)}}" class="img-responsive img-circle">
								
								</div>
								<div class="col-sm-10">
									<h2><?php echo implode(explode('_', $blogs[$keys]->title), ' '); ?></h2>
									<div class="meta">
										<span><i class="fa fa-user"></i>{{$blogs[$keys]->name}}</span>
										<span><i class="fa fa-calendar"></i>{{$blogs[$keys]->date}}</span>
									</div>
									<p><img src="{{url('blogImages/thumb750x395/'. $blogs[$keys]->blogImage)}}" class="img-responsive">
									</p>
									<p><?PHP echo stripcslashes(substr($blogs[0]->content, 0, 520)); ?></p>
									<a href="{{url('blogs_details/'.$blogs[$keys]->title)}}" class="btn btn-primary">Read more &nbsp; <i class="fa fa-arrow-right"></i></a>
								</div>
							</div>

							<hr>
				<?php $i++; } ?>

							<ul class="pagination" data-scroll-reveal>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next &nbsp; <i class="fa fa-angle-right"></i></a></li>
						</ul>
						<!-- PAGINATION END -->

						</article>
					</div>

					

				</div>
			</div>
		</section>

		<!-- ============ CONTENT END ============ -->

		@endsection