@extends('layouts.mail.mailmaster')
@section('mailcontent')
	<h3>Job Post Approval.</h3>
	<p class="lead">{!!$mailmessage!!}</p>
	<p>Company Name: {{$name}}</p>
	<p>Email: {{$email}}</p>
	
	<!-- <p class="callout">
		Login to your admin account to check more 
		<a href="{{url(env('SITEURL').'/admin')}}">Click here to login! &raquo;</a>
	</p> -->
@endsection