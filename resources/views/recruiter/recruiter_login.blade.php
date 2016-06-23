@extends('layouts.master')
@section('title', 'Recruiter Login')
@section('content')

		<!-- ============ JOBS START ============ -->

		<section id="jobs">
			<div class="container">
				<form method="post" action="{{url('saverecruiterLogin')}}">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="recruiterloginfrm" value="2">
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-lg-offset-3">
							<h2>Recruiter Login</h2>
							@if(old('recruiterloginfrm'))
			                  @if( Session::has('message') )
			                    <div class="alert alert-success" style="padding: 11px;">
			                       <p style="color: green;">{{ Session::get('message') }}</p>
			                     </div>
			                  @endif
			                  @if( Session::has('singleerrors') )
			                    <div class="alert alert-danger" style="padding: 11px;">
			                       <p style="color: red;">{{ Session::get('singleerrors') }}</p>
			                     </div>
			                  @endif
							@endif
							<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}" id="job-email-group">
								<label for="job-email">Email</label>
								<input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="you@yourdomain.com" maxlength="50">
								  @if ($errors->has('email'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('email') }}</strong>
					                  </span>
				                  @endif
							</div>
							<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}" id="job-location-group">
								<label for="job-location">Re-enter Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" maxlength="15">
								  @if ($errors->has('password'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('password') }}</strong>
					                  </span>
				                  @endif
							</div>
							<div class="col-lg-9 text-left">
								<input name="remember" type="checkbox"> <span>Remember me</span>
							</div>
							<div class="col-lg-3 text-right">
								<a href="{{url('recruiter_forgotpassword')}}">Forgot password?</a>
							</div>
							<br/><br/>
							<div class="text-center">
								<button type="submit" name="register" class="form-control btn btn-primary btn-lg">Login</button>
							</div>
							
						</div>
						
					</div>
					
				</form>
				<div class="col-lg-6 col-sm-6 col-lg-offset-3 text-center" style="margin-top: 25px;">
					Don't have Job Profile? <a href="{{url('recruiter_registration')}}">Create Now</a>
				</div>
			</div>
		</section>

		<!-- ============ JOBS END ============ -->
	


@endsection

		

		