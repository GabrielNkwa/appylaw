<!doctype html>

<html lang="en">
	<body>
		<img src="{{ app_url() }}/dist/images/globalreturns.jpg" alt="" class="img-fluid" width="230" height="44" /><br>
		<strong>Hello {{ $name }}</strong>
		<br>
		<p>Thanks for being on {{ app_name('separate') }}! This is a confirmation email that an account was created on our platform by this email address. We'll communicate with you from time to time via email so it's important that we have an up-to-date email address on file.</p>
		<p>if you did not create an account, no futher action is required</p>
		<code>your username is : <span style="color: #ffb426;">{{ $username }}</span></code><br>
		<code>your password is : <span style="color: #ffb426;">{{ $password }}</span></code>
		<p>Regards</p>
		<p>{{ app_name('separate') }}</p>
		<hr>
		<small>
			if you dont want to be recieving email from us <a href="">unsubscribe</a>
		</small>
	</body>
</html>