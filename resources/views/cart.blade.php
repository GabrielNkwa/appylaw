@extends('app')

@section('content')
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active">Cart</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!-- Cart Page Start -->
		<main class="cart-page-main-block inner-page-sec-padding-bottom">
			<div class="cart_area cart-area-padding  ">
				<div class="container">
					<div class="page-section-title">
						<h1>Shopping Cart</h1>
					</div>
					<div class="row">
						<div class="col-12">
							<form action="#" class="">
								<!-- Cart Table -->
								<div class="cart-table table-responsive mb--40">
									<table class="table">
										<!-- Head Row -->
										<thead>
											<tr>
												<th class="pro-remove"></th>
												<th class="pro-thumbnail">Image</th>
												<th class="pro-title">Item Category</th>
												<th class="pro-title">Item Name</th>
												<th class="pro-price">Price</th>
											</tr>
										</thead>
										<tbody id="table-body">
										</tbody>
									</table>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="cart-section-2">
				<div class="container">
					<div class="row">
						<!-- Cart Summary -->
						<div class="col-12">
							<div class="cart-summary">
								<div class="cart-summary-wrap">
									<h4><span>Cart Summary</span></h4>
									<p>Sub Total <span class="text-primary">&#8358; <span id="sub-total"></span></span></p>
									<p>Downlaod Cost <span class="text-primary">&#8358; 0</span></p>
									<h2>Grand Total <span class="text-primary">&#8358; <span id="total"></span></span></h2>
								</div>
								<div class="cart-summary-button">
									<a href="{{ route('checkout') }}" class="checkout-btn c-btn btn--primary">Checkout</a>
									<button onclick="removeFromCart()" class="update-btn c-btn btn-outlined">Empty Cart</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
@endsection

@section('scripts')
	<script type="text/javascript">
		function loadCart(){
			var cart = JSON.parse(localStorage.getItem("cart") || "[]")
			var total_price = 0

			//empty cart first
			$('#table-body').html('')

            //loop the cart
            for(var i = 0; i < cart.length; i++){
                total_price += parseFloat(cart[i].price)
                $('#table-body').append('\
					<tr>\
						<td><a onclick="removeFromCart(' + cart[i].unique_id + ')" href="javascript:void(0)"><i class="far fa-trash-alt"></i></a>\
						</td>\
						<td class="pro-thumbnail"><a href="#"><img\
									src="'+ image_url(cart[i].avatar) +'" alt="Product"></a></td>\
						<td class="pro-title"><a href="#">'+ cart[i].category +'</a></td>\
						<td class="pro-title"><a href="#">'+ cart[i].name +'</a></td>\
						<td class="pro-price"><span>&#8358; '+ parseFloat(cart[i].price) +'</span></td>\
					</tr>\
                ')
            }

	        //update cart totals
	        $('#sub-total').html(total_price || 0)

	        //update cart totals
	        $('#total').html(total_price || 0)
		}

		$(document).ready(()=>{
			loadCart()
		})
	</script>
@endsection