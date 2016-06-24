@extends('layouts.master')
@section('title', 'Recruiter Forgot password')
@section('content')

		<!-- ============ JOBS START ============ -->

		<section id="jobs">
			<div class="container">
				<form method="post" action="{{url('recruiterresetpassword')}}">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="recruiterresetpass" value="2">
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-lg-offset-3">
							<h2>Forgot your password?</h2>
							@if(old('recruiterresetpass'))
			                  @if( Session::has('message') )
			                    <div class="alert alert-success" style="padding: 11px;">
			                       <p style="color: green;">{{ Session::get('message') }}</p>
			                     </div>
			                  @endif
			                  @if( Session::has('singleerror') )
			                    <div class="alert alert-danger" style="padding: 11px;">
			                       <p style="color: red;">{{ Session::get('singleerror') }}</p>
			                     </div>
			                  @endif
							@endif
							<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}" id="job-email-group">
								<label for="job-email">Email</label>
								<input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Your Registered Email ID" maxlength="50">
								  @if ($errors->has('email'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('email') }}</strong>
					                  </span>
				                  @endif
							</div>
							
							<div class="text-center" style="margin-top: 40px;">
								<button type="submit" name="register" class="form-control btn btn-primary btn-lg">Reset Password</button>
							</div>
							
						</div>
						
					</div>
					
				</form>
				
			</div>
		</section>

		<!-- ============ JOBS END ============ -->
	


@endsection

		

		