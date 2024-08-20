<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@php
		$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
		echo $dt->format('F j, Y, g:i a'); 
	@endphp

	<div>
		<h4>Subject: <strong>{{@$subject}}</strong></h4>
		<h4>Dear, <strong>Techno Mole Creations Ltd.</strong></h4>
		<p style="margin-left:30px">
			{{@$msg}}
		</p>
		<h3>Best Regards</h3>
		<h4>{{@$name}}</h4>
		<h4>Email: <strong>{{@$email}}</strong></h4>
	</div>
</body>
</html>