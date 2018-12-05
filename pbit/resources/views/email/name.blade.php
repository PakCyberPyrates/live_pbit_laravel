<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	@if(empty($template))
		<h2>Register Email</h2>
		<p>{{ $user->name }}</p>
	@else
	<?php  echo $template;  ?>
	@endif
	</body>
</html>

