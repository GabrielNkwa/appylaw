@extends('app')

@section('content')

		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active">Login</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!--=============================================
    =            Login Register page content         =
    =============================================-->
		<main class="page-section inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
						<!-- Login Form s-->
						<form method="post" action="{{ route('register') }}">
							@csrf
							<div class="login-form">
								<h4 class="login-title">New Customer</h4>
								<p><span class="font-weight-bold">I am a new customer</span></p>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="email">Full Name</label>
										<input autocomplete="off" name="name" class="mb-0 form-control" type="text" id="name"
											placeholder="Enter your full name">
									</div>
									<div class="col-12 mb--20">
										<label for="email">Email</label>
										<input autocomplete="off" name="email" class="mb-0 form-control" type="email" id="email" placeholder="Enter Your Email Address Here..">
									</div>
									<div class="col-lg-6 mb--20">
										<label for="password">Password</label>
										<input autocomplete="off" name="password" class="mb-0 form-control" type="password" id="password" placeholder="Enter your password">
									</div>
									<div class="col-lg-6 mb--20">
										<label for="password">Repeat Password</label>
										<input autocomplete="off" name="repeat_password" class="mb-0 form-control" type="password" id="repeat_password" placeholder="Repeat your password">
									</div>
									<div class="col-lg-6 form-group">
										<div class="d-inline-flex align-items-center">
											<input type="checkbox" onclick="togglePassword()" class="mb-0 mx-1">
											<label for="accept_terms" class="mb-0">Show Passwords</label>
										</div>
									</div>
									<div class="col-md-12">
										<button class="btn btn-outlined">Register</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
						<form method="post" action="{{ route('login') }}">
							@csrf
							<div class="login-form">
								<h4 class="login-title">Returning Customer</h4>
								<p><span class="font-weight-bold">I am a returning customer</span></p>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="email">Enter your email address here...</label>
										<input autocomplete="off" name="email" class="mb-0 form-control" type="email" id="email1"
											placeholder="Enter you email address here...">
									</div>
									<div class="col-12 mb--20">
										<label for="password">Password</label>
										<input autocomplete="off" name="password" class="mb-0 form-control" type="password" id="login-password" placeholder="Enter your password">
									</div>
									<div class="col-md-12">
										<button class="btn btn-outlined">Login</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>

@endsection

@section('scripts')
	<script type="text/javascript">
		function togglePassword() {
			var password = document.getElementById("password");
			var repeat_password = document.getElementById("repeat_password");
			
			if(password.type === "password"){
				password.type = "text";
			} 
			else{
				password.type = "password";
			}

			if(repeat_password.type === "password"){
				repeat_password.type = "text";
			} 
			else{
				repeat_password.type = "password";
			}
		}
	</script>
@endsection