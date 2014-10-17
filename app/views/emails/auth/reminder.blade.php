<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>MasonACM Password Reset</h2>

	<div>
		To reset your password for your MasonACM account, continue to this link: {{ URL::route('password.reset', ['token' => $token]) }}.
	</div>
</body>
</html>