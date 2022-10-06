@extends('app')

@section('content')

        <!--=================================
        Hero Area
        ===================================== -->
        <section class="hero-area hero-slider-1">
            <div class="sb-slick-slider" data-slick-setting='{
                            "autoplay": true,
                            "fade": true,
                            "autoplaySpeed": 3000,
                            "speed": 3000,
                            "slidesToShow": 1,
                            "dots":true
                            }'>
            @foreach($documents->shuffle()->take(3) as $document)
                @if(check_even($loop->index))
                <div class="single-slide bg-shade-whisper  ">
                    <div class="container">
                        <div class="home-content text-center text-sm-left position-relative">
                            <div class="hero-partial-image image-right">
                                <img src="{{ image_url($document->thumbnail) }}" alt="" style="max-width: 400px; max-height: 400px;">
                            </div>
                            <div class="row g-0">
                                <div class="col-xl-6 col-md-6 col-sm-7">
                                    <div class="home-content-inner content-left-side text-start">
                                        <h1>{{ truncate($document->name, 40) }}</h1>
                                        <h2>{{ truncate($document->description, 50) }}</h2>
                                        <a href="{{ route('store_details', $document->unique_id) }}" class="btn btn-outlined--primary">
                                            ${{ number_format($document->current_price, 2, '.', ',') }} - Learn More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="single-slide bg-ghost-white">
                    <div class="container">
                        <div class="home-content text-center text-sm-left position-relative">
                            <div class="hero-partial-image image-left">
                                <img src="{{ image_url($document->thumbnail) }}" alt="" style="max-width: 400px; max-height: 400px;">
                            </div>
                            <div class="row align-items-center justify-content-start justify-content-md-end">
                                <div class="col-lg-6 col-xl-7 col-md-6 col-sm-7">
                                    <div class="home-content-inner content-right-side text-start">
                                        <h1>{{ truncate($document->name, 40) }}</h1>
                                        <h2>{{ truncate($document->description, 50) }}</h2>
                                        <a href="shop-grid.html" class="btn btn-outlined--primary">
                                            ${{ number_format($document->current_price, 2, '.', ',') }} - Learn More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            </div>
        </section>
        <!--=================================
        Home Features Section
        ===================================== -->
        <section class="mb--30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="text">
                                <h5>Free Downloads</h5>
                                <p> Get documents for free</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-redo-alt"></i>
                            </div>
                            <div class="text">
                                <h5>Money Back Guarantee</h5>
                                <p>100% money back</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-money-bill"></i>
                            </div>
                            <div class="text">
                                <h5>Smooth payment</h5>
                                <p>Pay with paystack</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-life-ring"></i>
                            </div>
                            <div class="text">
                                <h5>Help & Support</h5>
                                <p>Call : {{ app_phone() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Promotion Section One
        ===================================== -->
        <section class="section-margin">
            <h2 class="sr-only">Promotion Section</h2>
            <div class="container">
                <div class="row space-db--30">
                    <div class="col-lg-6 col-md-6 mb--30">
                        <a href="#" class="promo-image promo-overlay">
                            <img src="image/bg-images/promo-banner-1.png" alt="">
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 mb--30">
                        <a href="#" class="promo-image promo-overlay">
                            <img src="image/bg-images/promo-banner-with-text-2.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Slider Tab
        ===================================== -->
        <section class="section-padding">
            <h2 class="sr-only">Home Tab Slider Section</h2>
            <div class="container">
                <div class="sb-custom-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="shop-tab" data-bs-toggle="tab" href="#shop" role="tab"
                                aria-controls="shop" aria-selected="true">
                                Featured Items
                            </a>
                            <span class="arrow-icon"></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="men-tab" data-bs-toggle="tab" href="#men" role="tab"
                                aria-controls="men" aria-selected="true">
                                New Arrivals
                            </a>
                            <span class="arrow-icon"></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="woman-tab" data-bs-toggle="tab" href="#woman" role="tab"
                                aria-controls="woman" aria-selected="false">
                                Most view Items
                            </a>
                            <span class="arrow-icon"></span>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">
                            @if($documents)
                                @foreach($documents as $document)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="product-card">
                                        <div class="product-grid-content">
                                            <div class="product-header">
                                                <a href="#" class="author">
                                                    {{ $document->category }}
                                                </a>
                                                <h3><a href="{{ route('store_details', $document->unique_id) }}">{{ $document->name }}</a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="{{ image_url($document->thumbnail) }}" alt="">
                                                    <div class="hover-contents">
                                                        <a href="{{ route('store_details', $document->unique_id) }}" class="hover-image">
                                                            <img src="{{ image_url($document->thumbnail) }}" alt="">
                                                        </a>
                                                        <div class="hover-btns">
                                                            <a onclick="share('{{ $document->name }}', '{{ $document->unique_id }}')" href="javascript:void(0)" class="single-btn">
                                                                <i class="fas fa-share-alt"></i>
                                                            </a>
                                                            <a onclick="addToCart('{{ $document->unique_id }}', '{{ $document->category }}', '{{ $document->name }}', '{{ $document->current_price }}', '{{ $document->thumbnail }}')" href="javascript:void(0)" class="single-btn">
                                                                <i class="fas fa-plus-circle"></i> 
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">&#8358; {{ number_format($document->current_price, 2, '.', ',') }}</span>
                                                    <del class="price-old">&#8358; {{ number_format($document->previous_price, 0, '', ',') }}</del>
                                                    <span class="price-discount">{{ get_percentage_discount($document->current_price, $document->previous_price) }}%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!--=================================
            Promotion Section Three
        ===================================== -->
        <section class="section-margin">
            <div class="promo-wrapper promo-type-three">
                <a href="#" class="promo-image promo-overlay bg-image" data-bg="image/bg-images/promo-banner-full2.jpg">
                </a>
                <div class="promo-text w-100 ml-0">
                    <div class="container">
                        <div class="row w-100">
                            <div class="col-lg-7">
                                <h2>Get the best legal templates!</h2>
                                <h3>for your day to day legal works, spice up your work from our insights.</h3>
                                <a href="{{ route('store') }}" class="btn btn--yellow">go to store</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Blog Slider
        ===================================== -->
        <!--=================================
        Home Blog
        ===================================== -->
        <section class="section-margin">
            <div class="container">
                <div class="section-title">
                    <h2>LATEST EVENTS</h2>
                </div>
                <div class="blog-slider sb-slick-slider" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 2,
                "dots": true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 1} }
            ]'>
                    @if($events)
                        @foreach($events as $event)
                            <div class="single-slide">
                                <div class="blog-card">
                                    <div class="image">
                                        <a href="{{ route('legal_event_details', $event->unique_id) }}"><img src="{{ image_url($event->avatar) }}" alt=""></a>
                                    </div>
                                    <div class="content">
                                        <div class="content-header">
                                            <div class="date-badge">
                                                <span class="date">
                                                    {{ \Carbon\Carbon::parse($event->start_date)->format('d') }}
                                                </span>
                                                <span class="month">
                                                    {{ \Carbon\Carbon::parse($event->start_date)->format('M') }}
                                                </span>
                                            </div>
                                            <h3 class="title"><a href="{{ route('legal_event_details', $event->unique_id) }}">{{ $event->title }}</a>
                                            </h3>
                                        </div>
                                        <article class="blog-paragraph">
                                            <p>{{ \Str::limit($event->body, 150) }}</p>
                                        </article>
                                        <a href="{{ route('legal_event_details', $event->unique_id) }}" class="card-link">Read More <i
                                                class="fas fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <!--=================================
        Footer
        ===================================== -->
@endsection