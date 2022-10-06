<!doctype html>

<html lang="en">
	<body>
		<img src="{{ app_url() }}/dist/images/globalreturns.jpg" alt="" class="img-fluid" width="230" height="44" /><br>
		<strong>Hello {{ $name }}</strong>
		<p>Your {{ $type }} request #{{ $unique_id }} has been confirmed successfully and credited to your {{ app_name('separate') }} account</p>
		<p>Type : {{ $type }}</p>
		<p>Trans. Amount : USD{{ number_format($amount, 2, '.', ',') }}</p>
		<p>Payment Method : {{ $payment_method }}</p>
		<p>Time-Date : {{ $time_date }}</p>
		<p>visit our dashbord for more details</p>
		<center><a style="padding: 10px; border-radius: 3px; background: #ffb426; color: white; text-decoration: none;" href="{{ $url }}">Go to Dashboard</a></center>
		<p>Regards</p>
		<p>{{ app_name('separate') }}</p>
		<hr>
		<small>
			if you dont want to be recieving email from us <a href="">unsubscribe</a>
		</small>
	</body>
</html>