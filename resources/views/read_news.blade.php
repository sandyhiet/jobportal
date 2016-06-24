
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

					<div class="col-sm-10">

						<!-- POSTS START -->

						<article>

						<?php 
							
						foreach($news as $key => $value) {?>
						<p>
							 <img class="img-responsive" src="{{url('newsImages/thumb800x530/'.$news[$key]->newsImage)}}"/>
							</p>
							<p>Proin eu erat tincidunt, scelerisque ipsum non, fringilla dolor. Quisque interdum congue tellus. Aliquam vel odio sit amet ex laoreet finibus. Etiam commodo purus tortor, sed interdum justo faucibus vitae. Praesent ac elit a felis luctus facilisis. Aenean et magna elit. Morbi eget nulla volutpat, egestas ex vel, blandit enim. Pellentesque sit amet metus luctus, congue.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel sapien nibh. Mauris et neque tellus. In tellus felis, ornare in urna commodo, volutpat gravida sem. Integer vitae lorem sit amet nibh ornare varius. Sed sollicitudin leo quis dui dictum fermentum. Nulla at fringilla dolor. Proin magna nibh, dignissim vitae enim quis, bibendum euismod ipsum. In mattis nulla nulla. Cras suscipit aliquet augue in vulputate. Donec in enim non elit ornare sodales id nec arcu.</p>

							<?php }?>
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