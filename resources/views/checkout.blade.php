@extends('app')

@section('content')
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active">Checkout</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Checkout Form s-->
						<div class="checkout-form">
							<div class="row row-40">
								<div class="col-12">
									@if(!user())
									<!-- Slide Down Trigger  -->
									<div class="checkout-quick-box">
										<p><i class="far fa-sticky-note"></i>New customer? <a href="javascript:"
												class="slide-trigger" data-target="#quick-register">Click
												here to register</a></p>
									</div>
									<!-- Slide Down Blox ==> Login Box  -->
									<div class="checkout-slidedown-box" id="quick-register">
										<form method="post" action="{{ route('register') }}">
											@csrf
											<input type="hidden" name="route" value="checkout">
											<div class="quick-login-form">
												<div class="form-group">
													<label for="quick-user">Name *</label>
													<input autocomplete="off" name="name" type="text" placeholder="" id="quick-user">
												</div>
												<div class="form-group">
													<label for="quick-user">Email *</label>
													<input autocomplete="off" name="email" type="text" placeholder="" id="quick-user">
												</div>
												<div class="form-group">
													<label for="quick-pass">Password *</label>
													<input autocomplete="new-password" name="password" id="password" type="password" placeholder="" id="quick-pass">
												</div>
												<div class="form-group">
													<label for="quick-pass">Repeat Password *</label>
													<input autocomplete="new-password" name="repeat_password" id="repeat_password" type="password" placeholder="" id="quick-pass">
												</div>
												<div class="form-group">
													<div class="d-inline-flex align-items-center">
														<input type="checkbox" onclick="togglePassword()" class="mb-0 mx-1">
														<label for="accept_terms" class="mb-0">Show Passwords</label>
													</div>
												</div>
												<div class="form-group">
													<div class="d-flex align-items-center flex-wrap">
														<button class="btn btn-outlined me-3">Register</button>
														<div class="d-inline-flex align-items-center">
															<input type="checkbox" id="accept_terms" class="mb-0 mx-1">
															<label for="accept_terms" class="mb-0">I’ve read and accept
																the terms &amp; conditions</label>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
									<!-- Slide Down Trigger  -->
									<div class="checkout-quick-box">
										<p><i class="far fa-sticky-note"></i>Returning customer? <a href="javascript:"
												class="slide-trigger" data-target="#quick-login">Click
												here to login</a></p>
									</div>
									<!-- Slide Down Blox ==> Login Box  -->
									<div class="checkout-slidedown-box" id="quick-login">
										<form method="post" action="{{ route('login') }}">
											@csrf
											<input type="hidden" name="route" value="checkout">
											<div class="quick-login-form">
												<div class="form-group">
													<label for="quick-user">Email *</label>
													<input autocomplete="off" name="email" type="text" placeholder="" id="quick-user">
												</div>
												<div class="form-group">
													<label for="quick-pass">Password *</label>
													<input autocomplete="new-password" name="password" type="password" placeholder="" id="quick-pass">
												</div>
												<div class="form-group">
													<div class="d-flex align-items-center flex-wrap">
														<button class="btn btn-outlined me-3">Login</button>
														<div class="d-inline-flex align-items-center">
															<input type="checkbox" id="accept_terms" class="mb-0 mx-1">
															<label for="accept_terms" class="mb-0">I’ve read and accept
																the terms &amp; conditions</label>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
									@endif
								</div>
								<div class="col-lg-7 mb--20">
									<!-- Billing Address -->
									<div id="billing-form" class="mb-40">
										<h4 class="checkout-title">Billing Address</h4>
										<div class="row">
											<div class="col-12 mb--20">
												<label>Name*</label>
												<input id="name" type="text" placeholder="Company Name" value="{{ user() ? user()->name : NULL }}">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Email Address*</label>
												<input id="email" type="hidden" placeholder="Email Address" value="{{ user() ? user()->email : NULL }}">
												<input name="email" type="email" placeholder="Email Address" value="{{ user() ? user()->email : NULL }}" disabled="true">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Phone no*</label>
												<input id="phone" type="text" placeholder="Phone number" value="{{ user() ? user()->phone : NULL }}">
											</div>
											<div class="col-12 mb--20">
												<label>Address*</label>
												<input id="address" type="text" placeholder="Address line 1" value="{{ user() ? user()->address : NULL }}">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-5">
									<div class="row">
										<!-- Cart Total -->
										<div class="col-12">
											<div class="checkout-cart-total">
												<h2 class="checkout-title">YOUR ORDER</h2>
												<h4>Product <span>Total</span></h4>
												<ul id="item-holder">
												</ul>
												<p>Sub Total <span>&#8358; <span id="sub-total"></span></span></p>
												<h4>Grand Total <span>&#8358; <span id="total"></span></span></h4>
												<div class="term-block">
													<input type="checkbox" id="accept_terms2" name="accept_terms2">
													<label for="accept_terms2">I’ve read and accept the terms &
														conditions</label>
												</div>
                                                <form>
                                                    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                                                </form>
												<button @if(user()) onclick="makePayment(true)"  @else onclick="makePayment(false)"  @endif class="place-order w-100">Place order</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
@endsection

@section('scripts')
	<script src="https://js.paystack.co/v1/inline.js"></script> 
	<script type="text/javascript">
		var cart = JSON.parse(localStorage.getItem("cart") || "[]")
		var total_price = 0
        var name = ""
        var email = ""
        var phone = ""
        var address = ""

		$(document).ready(()=>{
			loadCheckout()
		})

		function loadCheckout(){
			//empty item list
			$('#item-holder').html('')
			
            //loop the cart
            for(var i = 0; i < cart.length; i++){
                total_price += parseFloat(cart[i].price)
                $('#item-holder').append('<li><span class="left">'+ cart[i].name +'</span> <span class="right">&#8358; '+ parseFloat(cart[i].price) +'</span></li>')
            }

	        //update cart totals
	        $('#sub-total').html(0)
	        $('#sub-total').html(total_price || 0)

	        //update cart totals
	        $('#total').html(0)
	        $('#total').html(total_price || 0)
		}

		function makePayment(check){
			if(check){
	            name = $('#name').val()
	            email = $('#email').val()
	            phone = $('#phone').val()
	            address = $('#address').val()
	            checked = $('#accept_terms2')[0].checked

	            if(checked == false){
	            	toast("error", "please accept our terms of service")
	            	return;
	            }

	            if(cart.length < 1){
	                toast("error", "please select at least one item before proceeding to payment")
	            }
	            else{
	                var reference = "{{ generate_random_numbers(16) }}";

	                if(total_price == 0){
	                	reportSale(reference)
	                }
	                else{
					    let handler = PaystackPop.setup({
					        key: "{{ app_public_key() }}", // Replace with your public key
					        email: email,
					        amount: parseFloat(total_price) * 100,
					        ref: reference, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
					        // label: "Optional string that replaces customer email"
					        onClose: function () {
					            toast("error", "payment cancelled");
					            //reportSale(reference)
					        },
					        callback: function (response) {
					            toast("success", "Payment complete, please exercise patience while we verify your payment!");
					            reportSale(reference)
					        },
					    });
					    handler.openIframe();
	                }
	            }
			}
			else{
				toast("error", "please login or register an account to continue")
			}
		}

        function reportSale(reference){
        	$.get("{{ route('report_sale') }}", {
        		reference : reference,
        		name : name,
        		email : email,
        		phone : phone,
        		address : address,
        		amount : total_price,
        		cart: cart
        	})
        	.done((response)=>{
        		toast(response.type, response.message)
        		if(response.type == 'success'){
                    //reset localstorage to null
                    localStorage.setItem("cart", "[]")

                    //reset global values
                    cart = JSON.parse("[]")
                    total_price = 0

                    //update cart info
                    updateCartInfo()

                    //load checkout parameters
                    loadCheckout()
        		}
        	})
        	.fail((response)=>{
        		console.log(response)
        	})
        }
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