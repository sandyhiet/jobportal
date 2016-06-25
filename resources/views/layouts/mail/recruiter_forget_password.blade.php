@extends('layouts.mail.mailmaster')
@section('mailcontent')
	<h3>Forgot Your Password</h3>
	<p class="lead">{!!$mailmessage1!!}</p>
	<p>{!!$mailmessage!!}</p>
	
	<!-- <p class="callout">
		Login to your admin account to check more 
		<a href="{{url(env('SITEURL').'/admin')}}">Click here to login! &raquo;</a>
	</p> -->
@endsection