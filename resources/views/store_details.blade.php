@extends('app')

@section('content')
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">{{ $item->name }} Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <main class="inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row  mb--60">
                    <div class="col-lg-5 mb--30">
                        <!-- Product Details Slider Big Image-->
                        <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
                            <div class="single-slide">
                                <img src="{{ image_url($item->thumbnail) }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product-details-info pl-lg--30 ">
                            <p class="tag-block">Category: <a href="#">{{ $item->category }}</a></p>
                            <h3 class="product-title">{{ $item->name }}</h3>
                            <ul class="list-unstyled">
                                <li>Access Type: <span class="list-value"> {{ $item->access_type }}</span></li>
                                <li>Document Format : <a href="#" class="list-value font-weight-bold"> {{ $item->format }}</a></li>
                            </ul>
                            <div class="price-block">
                                <span class="price-new">&#8358; {{ number_format($item->current_price, 2, '.', ',') }}</span>
                                <del class="price-old">&#8358; {{ number_format($item->previous_price, 2, '.', ',') }}</del>
                            </div>
                            <div class="rating-widget">
                                <div class="rating-block">
                                    @for($i = 0; $i < 5; $i++)
                                        @if($i < $item_ratings)
                                            <span class="fas fa-star star_on"></span>
                                        @else
                                            <span class="fas fa-star "></span>
                                        @endif
                                    @endfor
                                </div>
                                <div class="review-widget">
                                    <a href="#">({{ $item_reviews }} Reviews)</a> <span>|</span>
                                    <a href="#">Write a review</a>
                                </div>
                            </div>
                            <article class="product-details-article">
                                <h4 class="sr-only">Product Summary</h4>
                                {{ $item->description }}
                            </article>
                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <h4 class="product-title">Tags:</h4>
                                    @php $tags = explode(",", $item->tags) @endphp
                                    @for($i = 0; $i < count($tags); $i++)
                                    <a class="m-2" href="{{ route('store') }}?search={{ trim($tags[$i]) }}">
                                        <i class="fas fa-tag text-info mr-2"></i>
                                        {{ $tags[$i] }}
                                    </a>
                                    @endfor
                                </div>
                            </div>
                            <div class="add-to-cart-row mt-5">
                                <div class="add-cart-btn">
                                    <a onclick="addToCart('{{ $item->unique_id }}', '{{ $item->category }}', '{{ $item->name }}', '{{ $item->current_price }}', '{{ $item->thumbnail }}')" href="javascript:void(0)" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to
                                        Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review-wrapper">
                    <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                    <div class="rating-row pt-2">
                        <p class="d-block">Your Rating</p>
                        <span class="rating-widget-block">
                            <input type="radio" name="star" id="star1" onclick="updateRating('5')">
                            <label for="star1"></label>
                            <input type="radio" name="star" id="star2" onclick="updateRating('4')">
                            <label for="star2"></label>
                            <input type="radio" name="star" id="star3" onclick="updateRating('3')">
                            <label for="star3"></label>
                            <input type="radio" name="star" id="star4" onclick="updateRating('2')">
                            <label for="star4"></label>
                            <input type="radio" name="star" id="star5" onclick="updateRating('1')">
                            <label for="star5"></label>
                        </span>
                        <form method="post" action="{{ route('store_item_review') }}" class="mt--15 site-form ">
                            @csrf
                            <input type="hidden" name="document_id" value="{{ $item->unique_id }}">
                            <input type="hidden" name="rating" id="rating" >
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message">Comment</label>
                                        <textarea name="comment" id="comment" cols="30" rows="10"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" id="name" class="form-control" disabled="" value="{{ user() ? user()->name : NULL }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="text" id="email" class="form-control" disabled="" value="{{ user() ? user()->email : NULL }}">
                                    </div>
                                </div>
                                @if(user())
                                <div class="col-lg-4">
                                    <div class="submit-btn">
                                        <button class="btn btn-black">Post Comment</button>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
@endsection

@section('scripts')
    <script type="text/javascript">
        function updateRating(value){
            $('#rating').val(value)
        }
    </script>
@endsection