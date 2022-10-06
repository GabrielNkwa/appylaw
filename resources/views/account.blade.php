@extends('app')

@section('content')
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active">My Account</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<div class="page-section inner-page-sec-padding">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="row">
							<!-- My Account Tab Menu Start -->
							<div class="col-lg-3 col-12">
								<div class="myaccount-tab-menu nav" role="tablist">
									<a href="#dashboad" class="active" data-bs-toggle="tab"><i
											class="fas fa-tachometer-alt"></i>
										Dashboard</a>
									<a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> My Items</a>
									<a href="#download" data-bs-toggle="tab"><i class="fas fa-calendar"></i> My Events</a>
									<a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> My Account
										Details</a>
									<a onclick="return confirm('are you sure you want to logout')" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
								</div>
							</div>
							<!-- My Account Tab Menu End -->
							<!-- My Account Tab Content Start -->
							<div class="col-lg-9 col-12 mt--30 mt-lg--0">
								<div class="tab-content" id="myaccountContent">
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
										<div class="myaccount-content">
											<h3>Dashboard</h3>
											<div class="welcome mb-20">
												<p>Hello, <strong>{{ user()->name }}</strong> (If Not <strong>You
														!</strong><a onclick="return confirm('are you sure you want to logout?')" href="{{ route('logout') }}" class="logout">
														Logout</a>)</p>
											</div>
											<p class="mb-0">From your account dashboard. you can easily check &amp; view
												your
												recent items, view your event sand manage your account details.</p>
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="orders" role="tabpanel">
										<div class="myaccount-content">
											<h3>Items</h3>
											<div class="myaccount-table table-responsive text-center">
												<table class="table table-bordered">
													<thead class="thead-light">
														<tr>
															<th>No</th>
															<th>Category</th>
															<th>Name</th>
															<th>Payment Status</th>
															<th>Purchase Date</th>
															<th>Download Count</th>
															<th>...</th>
														</tr>
													</thead>
													<tbody id="table_body">
													</tbody>
												</table>
										        <!-- Pagination-->
										        <div id="more-holder" style="display: none;">
										            <div class="shop-pagination mb-4 pt-1 text-center">
										                <div class="container">
										                    <a class="btn btn-primary btn-sm" href="javascript:void(0)" onclick="loadItem(false, true)">Load More Items...</a>
										                </div>
										            </div>
										        </div>
											</div>
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="download" role="tabpanel">
										<div class="myaccount-content">
											<h3>Events</h3>
											<div class="myaccount-table table-responsive text-center">
												<table class="table table-bordered">
													<thead class="thead-light">
														<tr>
															<th>No</th>
															<th>Event</th>
															<th>Entry Key</th>
															<th>Start Date</th>
															<th>End Date</th>
															<th>Payment Status</th>
														</tr>
													</thead>
													<tbody id="table_body2">
													</tbody>
												</table>
										        <div id="more-holder2" style="display: none;">
										            <div class="shop-pagination mb-4 pt-1 text-center">
										                <div class="container">
										                    <a class="btn btn-primary btn-sm" href="javascript:void(0)" onclick="loadEvent(false, true)">Load More Events...</a>
										                </div>
										            </div>
										        </div>
											</div>
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="payment-method" role="tabpanel">
										<div class="myaccount-content">
											<h3>Payment Method</h3>
											<p class="saved-message">You Can't Saved Your Payment Method yet.</p>
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="address-edit" role="tabpanel">
										<div class="myaccount-content">
											<h3>Billing Address</h3>
											<address>
												<p><strong>Alex Tuntuni</strong></p>
												<p>1355 Market St, Suite 900 <br>
													San Francisco, CA 94103</p>
												<p>Mobile: (123) 456-7890</p>
											</address>
											<a href="#" class="btn btn--primary"><i class="fa fa-edit"></i>Edit
												Address</a>
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="account-info" role="tabpanel">
										<div class="myaccount-content">
											<h3>Account Details</h3>
											<div class="account-details-form">
												<form method="post" action="{{ route('account_update') }}">
													@csrf
													<div class="row">
														<div class="col-12  mb--30">
															<input autocomplete="off" id="name" placeholder="Full Name" type="text" value="{{ user()->name }}">
														</div>
														<div class="col-md-6  mb--30">
															<input autocomplete="off" name="email" placeholder="Email Address" type="email" disabled="" value="{{ user()->email }}">
														</div>
														<div class="col-md-6  mb--30">
															<input autocomplete="off" name="phone" placeholder="Phone Number" type="text" value="{{ user()->phone }}">
														</div>
														<div class="col-12  mb--30">
															<input autocomplete="off" name="address" placeholder="Enter your address" type="text" value="{{ user()->address }}">
														</div>
														<div class="col-12  mb--30">
															<h4>Password change</h4>
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input autocomplete="new-password" name="password" placeholder="New Password"
																type="password">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input autocomplete="new-password" name="repeat_password" placeholder="Repeat New Password"
																type="password">
														</div>
														<div class="col-12">
															<button class="btn btn--primary">Save Changes</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!-- Single Tab Content End -->
								</div>
							</div>
							<!-- My Account Tab Content End -->
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection

@section('scripts')
	<script type="text/javascript">

		var item_download_url = "{{ route('download_item') }}"

        var page = 0
        var page2 = 0

        $(document).ready(()=>{
            loadItem()
            loadEvent()
        })

        function loadItem(reload = false, more = false){

            //hide load more button
            $('#more-holder').hide()

            var search = $('#search').val()

            //if you are reloading, clear page
            reload ? page = 0 : null

            $.get("{{ route('get_items') }}", { page : (page + 1), search : search })
                .done((response)=>{
                    //empty table if more is parsed
                    !more ? $('#table_body').html('') : null

                    //store items in local storage
                    if(more){
                      var previous = JSON.parse(localStorage.getItem("items"))
                      var updated = previous.concat(response.items.data)
                      localStorage.setItem("items", JSON.stringify(updated))
                    }
                    else{
                      localStorage.setItem("items", JSON.stringify(response.items.data))
                    }
                    
                    //console.log(response)
                    page = response.items.current_page

                    var trailer = (page - 1) * 10

                    for(var i = 0; i < response.items.data.length; i++){
                        $('#table_body').append('\
							<tr>\
								<td>'+ (i + 1 + trailer) +'</td>\
								<td>'+ response.items.data[i].category +'</td>\
								<td>'+ response.items.data[i].name +'</td>\
								<td class="text-'+ (response.items.data[i].is_paid ? 'success' : 'danger') +'">'+ (response.items.data[i].is_paid ? 'Verified' : 'Pending') +'</td>\
								<td>'+ (response.items.data[i].created_at).split('T')[0] +'</td>\
								<td>'+ response.items.data[i].download_count +'</td>\
								<td><a onclick="ItemDownload('+ "'" + response.items.data[i].unique_id + "'" +')" href="javascript:void(0)"><i class="fas fa-download"></i></a></td>\
							</tr>\
                        ')
                    }

                    //if next page exist
                    if(response.items.next_page_url){
                        $('#more-holder').show()
                    }
                })
        }

        function ItemDownload(unique_id){
        	window.location.href = (item_download_url + '?unique_id=' + unique_id + '&token=' + (new Date()))
        }

        function loadEvent(reload = false, more = false){

            //hide load more button
            $('#more-holder2').hide()

            var search2 = $('#search2').val()

            //if you are reloading, clear page
            reload ? page2 = 0 : null

            $.get("{{ route('get_events') }}", { page : (page2 + 1), search : search2 })
                .done((response)=>{
                    //empty table if more is parsed
                    !more ? $('#table_body2').html('') : null

                    //store events in local storage
                    if(more){
                      var previous = JSON.parse(localStorage.getItem("events"))
                      var updated = previous.concat(response.events.data)
                      localStorage.setItem("events", JSON.stringify(updated))
                    }
                    else{
                      localStorage.setItem("events", JSON.stringify(response.events.data))
                    }
                    
                    //console.log(response)
                    page2 = response.events.current_page

                    var trailer2 = (page2 - 1) * 10

                    for(var i = 0; i < response.events.data.length; i++){
                        $('#table_body2').append('\
							<tr>\
								<td>'+ (i + 1 + trailer2) +'</td>\
								<td>'+ response.events.data[i].title +'</td>\
								<td>EVT-'+ response.events.data[i].unique_id +'</td>\
								<td>'+ (response.events.data[i].start_date).split('T')[0] +'</td>\
								<td>'+ (response.events.data[i].end_date).split('T')[0] +'</td>\
								<td class="text-'+ (response.events.data[i].is_paid ? 'success' : 'danger') +'">'+ (response.events.data[i].is_paid ? 'Verified' : 'Pending') +'</td>\
							</tr>\
                        ')
                    }

                    //if next page exist
                    if(response.events.next_page_url){
                        $('#more-holder2').show()
                    }
                })
        }
	</script>
@endsection