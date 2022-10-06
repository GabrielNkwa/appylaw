<!doctype html>

<html lang="en">
	<body>
		<img src="{{ app_url() }}/dist/images/globalreturns.jpg" alt="" class="img-fluid" width="230" height="44" /><br>
		<strong>Hello {{ $name }}</strong>
		<br>
		<p>Thanks for being on {{ app_name() }}! Please reset your password by clicking on the link below. We'll communicate with you from time to time via email so it's important that we have an up-to-date email address on file.</p>
		<center><a style="padding: 10px; border-radius: 3px; background: #ffb426; color: white; text-decoration: none;" href="{{ $url }}">Recover my password</a></center>
		<p>if you did not create an account, no futher action is required</p>
		<p>Regards</p>
		<p>{{ app_name() }}</p>
		<hr>
		<small>
			if you're having trouble clicking the "Reset My Password" button, copy and paste the URL below into your web browser <a href="{{ $url }}">{{ $url }}</a>
		</small>

	</body>
</html>