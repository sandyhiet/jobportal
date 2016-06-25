@extends('layouts.master')
@section('title', 'Company Details')
@section('content')

		<!-- ============ TITLE START ============ -->

		<section id="title">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<?php if ($company_details[0]->company_logo) { ?>
						<img src="{{url('jobpostimage/thumb332x120/'.$company_details[0]->company_logo)}}" class="img-responsive img-circle" alt="" />
						<?php }else{?>
						<img src="http://placehold.it/332x120.jpg" alt="" class="img-responsive" />
					    <?php } ?>

					</div>
				</div>
			</div>
		</section>

		<!-- ============ TITLE END ============ -->
			<?php

				$companyname        = addslashes(ucfirst($company_details[0]->companyname));
				$companydescription = addslashes(ucfirst($company_details[0]->companydescription));

				$jobtitle  =	ucfirst($job_details[0]->jobtitle);
				$location  =	ucfirst($job_details[0]->location);
				$jobtype   =	ucfirst($job_details[0]->jobtype);
				$jobregion =	ucfirst($job_details[0]->jobregion);
				$email     =	$job_details[0]->email;
				//print_r($job_details);


			 ?>


		<!-- ============ Content START ============ -->

		<section id="jobs">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<article>
							<h2>About {{$companyname}}</h2>
							<p>{!! $companydescription !!}</p>
							
							<hr>
							<!-- <h2>Location</h2> -->


							<!-- Google Map Script -->
							

							
							<h2>Jobs</h2>

							<div class="jobs">

								<?php 

									 $allpostjobs = DB::table('recruiter_jobdetailspost')
							              ->join('recruiter_companydetailspost', 'recruiter_jobdetailspost.id', '=', 'recruiter_companydetailspost.job_id')->orderBy('recruiter_jobdetailspost.id', 'desc')
							              ->paginate(4);

								    foreach ($allpostjobs as $key => $value) { 

									    $jobtitle =	ucfirst($allpostjobs[$key]->jobtitle);
										$companyname =	ucfirst($allpostjobs[$key]->companyname);
										$location =	ucfirst($allpostjobs[$key]->location);
										$jobtype =	ucfirst($allpostjobs[$key]->jobtype);
										$jobregion =	ucfirst($allpostjobs[$key]->jobregion);
										$companytagline =	ucfirst($allpostjobs[$key]->companytagline);



							    ?>

							    <a href="{{url('company_detail/'.$allpostjobs[$key]->id )}}">
									<div class="featured"></div>
									<?php if ($allpostjobs[$key]->company_logo) { ?>
									<img src="{{url('jobpostimage/thumb60x60/'.$allpostjobs[$key]->company_logo)}}" alt="" class="img-circle" width="60" height="60"/>
									<?php }else{?>
									<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
								    <?php } ?>

									<div class="title">
										<h5>{{$jobtitle}}</h5>
										<p>{{$companyname}}</p>
									</div>
									<div class="data">
										<span class="city"><i class="fa fa-map-marker"></i>{{$location}} {{$jobregion}}</span>
										<span class="type full-time"><i class="fa fa-clock-o"></i>{{$jobtype}}</span>
										<span class="sallary"><i class="fa fa-dollar"></i>45,000</span>
									</div>
								</a>



							              
							    <?php  } ?>
								

							</div>
							{{$allpostjobs->render()}}

						</article>
					</div>
					<div class="col-sm-4" id="sidebar">
						<div class="sidebar-widget" id="share">
							<h2>Share it</h2>
							<ul>
								<li><a href="{{$company_details[0]->facebook_username}}"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{$company_details[0]->twitter_username}}"><i class="fa fa-twitter"></i></a></li>
								<li><a href="{{$company_details[0]->google_username}}"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="{{$company_details[0]->linkedin_username}}"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
						<hr>
						<div class="sidebar-widget" id="widget-contact">
							<h2>Contact</h2>
							<ul>
								<li><i class="fa fa-building"></i>Netvibes</li>
								<li><i class="fa fa-map-marker"></i>2 Madison Avenue</li>
								<li><i class="fa"></i>{{$job_details[0]->location}}, {{$job_details[0]->jobregion}}</li>
								<li><i class="fa fa-phone"></i>01.22.987.8392</li>
								<li><i class="fa fa-envelope"></i><a href="mailto:{{$email}}">Send an email</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ Content END ============ -->
	


@endsection

		

		