
@extends('layouts.master')
@section('title', 'Home Page')
@section('content')


		<!-- ============ TITLE START ============ -->

		<section id="title">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<img src="http://placehold.it/140x140.jpg" alt="" class="img-responsive img-circle" />
					</div>
					<div class="col-sm-10">
						<h1><?php echo implode(explode('_', $news[0]->newsTitle), ' '); ?></h1>
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

					<div class="col-sm-12">

						<!-- POSTS START -->

						<article>

						
						<p>
							<img style="width:700px;" class="img-responsive" src="{{url('newsImages/thumb800x530/'.$news[0]->newsImage)}}"/>
							</p>
							 <p style="text-align: justify;"><?PHP echo stripcslashes(substr($news[0]->newsDescription, 0, 520)); ?>

						
							<h2>Gallery</h2>



							<ul class="gallery row">
								<li class="col-xs-4 col-sm-3 col-lg-2">
									<a href="http://placehold.it/800x530.jpg" class="fancybox" data-fancybox-group="gallery" title="Sample title">
										<img src="http://placehold.it/200x200.jpg" class="img-responsive" alt="" />
									</a>
								</li>
							</ul>
						</article>
                      </div>
                    </div>
			</div>
		</section>

		<!-- ============ CONTENT END ============ -->

		@endsection