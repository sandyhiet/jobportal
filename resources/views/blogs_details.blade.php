
@extends('layouts.master')
@section('title', 'Home Page')
@section('content')


		<!-- ============ TITLE START ============ -->

		<section id="title">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
					<img src="{{url('blogImages/thumb358x300/'. $blogs[0]->blogThumbImage)}}" class="img-responsive img-circle">
						<!-- <img src="http://placehold.it/140x140.jpg" alt="" class="img-responsive img-circle" /> -->
					</div>
					<div class="col-sm-10">
						<h1><?php echo implode(explode('_', $blogs[0]->title), ' '); ?></h1>
						<div class="meta">
							<span><i class="fa fa-user"></i>{{$blogs[0]->name}}</span>
							<span><i class="fa fa-calendar"></i>{{$blogs[0]->date}}</span>
<!-- 							<span><i class="fa fa-comment"></i>24</span>
 -->						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ TITLE END ============ -->

		<!-- ============ CONTENT START ============ -->

		<section id="blog">
			<div class="container">
				<div class="row">

					<div class="col-sm-12">

						<!-- POSTS START -->

						<article>

						
						<p>
							<img style="height:450px;width:1130px;" src="{{url('blogImages/thumb750x395/'. $blogs[0]->blogImage)}}" class="img-responsive">
							</p>
							 <p style="text-align: justify;">{!!$blogs[0]->content!!}</p>

						
						

<!--  -->
						</article>
                      </div>
                    </div>
			</div>
		</section>

		<!-- ============ CONTENT END ============ -->

		@endsection