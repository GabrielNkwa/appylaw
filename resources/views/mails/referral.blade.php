<!doctype html>

<html lang="en">
	<body>
		<img src="{{ app_url() }}/dist/images/globalreturns.jpg" alt="" class="img-fluid" width="230" height="44" /><br>
		<strong>Dear {{ $referree_name }} ({{ $referree_username }})</strong>
		<br>
		<p>You have a new direct signup on {{ app_url() }}.</p>
		<p>Name: {{ $user }}</p>
		<p>Username: {{ $username }}</p>
		<p>Email: {{ $email }}</p>
		<p>Regards</p>
		<p>{{ app_name('separate') }}</p>
		<hr>
		<small>
			if you dont want to be recieving email from us <a href="">unsubscribe</a>
		</small>
	</body>
</html>