@extends('layouts.master')
@section('title', 'Recruiter Change Password')
@section('content')

		<!-- ============ JOBS START ============ -->

		<section id="jobs">
			<div class="container">

				<form method="post" action="{{url('recruiterchangepassword')}}">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="recruiter_id" value="{{Auth::user()->id}}">
					<input type="hidden" name="recruiterchangepass" value="2">
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-lg-offset-3">
							<h2>Recruiter Change Password</h2>
								@if(old('recruiterchangepass'))
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
							
							<div class="form-group {{ $errors->has('oldpassword') ? ' has-error' : '' }}" id="job-title-group">
								<label for="job-title">Old Password</label>
								<input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Enter old password" maxlength="15">
								 @if ($errors->has('oldpassword'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('oldpassword') }}</strong>
					                  </span>
				                 @endif
							</div>
							<div class="form-group {{ $errors->has('newpassword') ? ' has-error' : '' }}" id="job-title-group">
								<label for="job-title">New Password</label>
								<input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Enter new password" maxlength="15">
								 @if ($errors->has('newpassword'))
					                  <span class="help-block">
					                   <strong>{{ $errors->first('newpassword') }}</strong>
					                  </span>
				                 @endif
							</div>
							<div class="form-group" id="job-location-group">
								<label for="job-location">Confirm Password</label>
								<input type="password" class="form-control" id="confmpassword" name="confmpassword" placeholder="Enter confirm password" maxlength="15">
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

		

		