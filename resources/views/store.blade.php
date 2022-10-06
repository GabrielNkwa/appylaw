@extends('app')

@section('content')
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active">Store</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<main class="inner-page-sec-padding-bottom">
			<div class="container">
				<div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">
					@if($items)
						@foreach($items as $item)
						<div class="col-lg-4 col-sm-6">
							<div class="product-card">
								<div class="product-grid-content">
									<div class="product-header">
										<a href="#" class="author">
											{{ $item->category }}
										</a>
										<h3><a href="{{ route('store_details', $item->unique_id) }}">{{ $item->name }}</a></h3>
									</div>
									<div class="product-card--body">
										<div class="card-image">
											<img src="{{ image_url($item->thumbnail) }}" alt="">
                                            <div class="hover-contents">
                                                <a href="{{ route('store_details', $item->unique_id) }}" class="hover-image">
                                                    <img src="{{ image_url($item->thumbnail) }}" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a onclick="share('{{ $item->name }}', '{{ $item->unique_id }}')" href="javascript:void(0)" class="single-btn">
                                                        <i class="fas fa-share-alt"></i>
                                                    </a>
                                                    <a onclick="addToCart('{{ $item->unique_id }}', '{{ $item->category }}', '{{ $item->name }}', '{{ $item->current_price }}', '{{ $item->thumbnail }}')" href="javascript:void(0)" class="single-btn">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </a>
                                                </div>
                                            </div>
										</div>
                                        <div class="price-block">
                                            <span class="price">&#8358; {{ number_format($item->current_price, 2, '.', ',') }}</span>
                                            <del class="price-old">&#8358; {{ number_format($item->previous_price, 0, '', ',') }}</del>
                                            <span class="price-discount">{{ get_percentage_discount($item->current_price, $item->previous_price) }}%</span>
                                        </div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					@endif
				</div>
				<!-- Pagination Block -->
				<div class="row pt--30">
					<div class="col-md-12">
						<div class="pagination-block">
							@if($items)
								{{ $items->withQueryString()->links() }}
							@endif
						</div>
					</div>
				</div>
			</div>
		</main>
@endsection