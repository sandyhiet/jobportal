@extends('layouts.master')
@section('title', 'Recruiter Reset password')
@section('content')

		<!-- ============ JOBS START ============ -->

		<section id="jobs">
			<div class="container">
				<form method="post" action="{{url('recruiter_update_resetpassword')}}">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="recruiterresetpass" value="2">
					<input type="hidden" name="id" value="{{$userprofile[0]->id}}">
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-lg-offset-3">
							<h2>Reset your password</h2>
							@if(old('recruiterresetpass'))
			                  @if( Session::has('message') )
			                    <div class="alert alert-success" style="padding: 11px;">
			                       <p style="color: green;">{{ Session::get('message') }}</p>
			                     </div>
			                  @endif
			                  @if( Session::has('flash_message') )
			                    <div class="alert alert-danger" style="padding: 11px;">
			                       <p style="color: red;">{{ Session::get('flash_message') }}</p>
			                     </div>
			                  @endif
							@endif
							<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}" id="job-location-group">
								<label for="job-location">New Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" maxlength="15">
								  @if ($errors->has('password'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('password') }}</strong>
					                  </span>
				                  @endif
							</div>
							<div class="form-group {{ $errors->has('repassword') ? ' has-error' : '' }}" id="job-location-group">
								<label for="job-location">Confirm Password</label>
								<input type="password" class="form-control" id="repassword" name="repassword" placeholder="Enter re-password" maxlength="15">
								  @if ($errors->has('repassword'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('repassword') }}</strong>
					                  </span>
				                  @endif
							</div>
							
							<div class="text-center" style="margin-top: 40px;">
								<button type="submit" name="register" class="form-control btn btn-primary btn-lg">Update</button>
							</div>
							
						</div>
						
					</div>
					
				</form>
				
			</div>
		</section>

		<!-- ============ JOBS END ============ -->
	


@endsection

		

		