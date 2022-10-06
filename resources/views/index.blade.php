<!DOCTYPE html>
<html lang="zxx">


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ app_name() }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="/css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="/image/appyicon.png">
    <!-- Toastr -->
    <link type="text/css" rel="stylesheet" href="/plugins/toastr/toastr.min.css"/>
</head>

<body>
    <div class="site-wrapper" id="top">
        <div class="site-header header-3  d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <ul class="header-top-list">
                            <li class="dropdown-trigger currency-dropdown"><i class="fas fa-envelope"></i>
                                {{ app_email() }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-8 flex-lg-right">
                        <ul class="header-top-list">
                            <li><a target="_blank" href="https://nigerianbar.org.ng/"><i class="icons-left fas fa-code-branch"></i>NBA Branches</a>
                            </li>
                            <li><a href="https://casemanager.appylaw.com" target="_blank"><i class="icons-left fas fa-gavel"></i>Case Manager</a>
                            </li>
                            <li><a href="{{ route('contact') }}"><i class="icons-left fas fa-phone"></i> Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <a href="{{ route('index') }}" class="site-brand">
                                <img src="/image/appylogo.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <div class="header-phone ">
                                <div class="icon">
                                    <i class="fas fa-headphones-alt"></i>
                                </div>
                                <div class="text">
                                    <p>Free Support 24/7</p>
                                    <p class="font-weight-bold number">+{{ app_phone() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right li-last-0">
                                    <li class="menu-item">
                                        <a href="{{ route('resource_center') }}">Resource Center</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('legal_event') }}">Events</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="javascript:;">Find A Lawyer</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('blog') }}">Blog</a>
                                    </li>
                                    @if(user())
                                    <li class="menu-item">
                                        <a href="{{ route('account') }}">Account</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-mobile-menu">
            <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
                <div class="container">
                    <div class="row align-items-sm-end align-items-center">
                        <div class="col-md-4 col-7">
                            <a href="index.html" class="site-brand">
                                <img src="/image/appylogo.png" alt="">
                            </a>
                        </div>
                        <div class="col-md-3 col-5  order-md-3 text-right">
                            <div class="mobile-header-btns header-top-widget">
                                <ul class="header-links">
                                    <li class="sin-link">
                                        <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                                class="ion-navicon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--Off Canvas Navigation Start-->
            <aside class="off-canvas-wrapper">
                <div class="btn-close-off-canvas">
                    <i class="ion-android-close"></i>
                </div>
                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <div class="search-box offcanvas">
                        <form>
                            <input type="text" placeholder="Search Here">
                            <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                    <!-- search box end -->
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav class="off-canvas-nav">
                            <ul class="mobile-menu main-mobile-menu">
                                <li class="menu-item">
                                    <a target="_blank" href="https://casemanager.appylaw.com">Case Manager</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('resource_center') }}">Resource Center</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('legal_event') }}">Events</a>
                                </li>
                                <li class="menu-item">
                                    <a href="javascript:;">Find A Lawyer</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('blog') }}">Blog</a>
                                </li>
                                @if(user())
                                <li class="menu-item">
                                    <a href="{{ route('account') }}">Account</a>
                                </li>
                                @endif
                                @if(!user())
                                <li class="menu-item">
                                    <a href="{{ route('auth') }}">Login Or Register</a>
                                </li>
                                @else
                                <li class="menu-item">
                                    <a onclick="return confirm('are you sure you want to logout?')" href="{{ route('logout') }}">Logout</a>
                                </li>
                                @endif
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                    <nav class="off-canvas-nav">
                        <ul class="mobile-menu menu-block-2">
                            <li class="menu-item">
                                <a target="_blank" href="https://nigerianbar.org.ng/"><i class="icons-left fas fa-code-branch"></i> NBA Branches</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://casemanager.appylaw.com" target="_blank"><i class="icons-left fas fa-gavel"></i> Case Manager</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('contact') }}"><i class="icons-left fas fa-phone"></i> Contact</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="off-canvas-bottom">
                        <div class="contact-list mb--10">
                            <a href="tel:{{ app_phone() }}" class="sin-contact"><i class="fas fa-mobile-alt"></i>+{{ app_phone() }}</a>
                            <a href="mailto:{{ app_email() }}" class="sin-contact"><i class="fas fa-envelope"></i>{{ app_email() }}</a>
                        </div>
                        <div class="off-canvas-social">
                            <a href="javascript:void(0)" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)" class="single-icon"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)" class="single-icon"><i class="fas fa-rss"></i></a>
                            <a href="javascript:void(0)" class="single-icon"><i class="fab fa-youtube"></i></a>
                            <a href="javascript:void(0)" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                            <a href="javascript:void(0)" class="single-icon"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </aside>
            <!--Off Canvas Navigation End-->
        </div>
        <div class="sticky-init fixed-header common-sticky">
            <div class="container d-none d-lg-block">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <a href="{{ route('index') }}" class="site-brand">
                            <img src="/image/appylogo.png" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <div class="main-navigation flex-lg-right">
                            <ul class="main-menu menu-right ">
                                <li class="menu-item">
                                    <a href="{{ route('resource_center') }}">Resource Center</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('legal_event') }}">Events</a>
                                </li>
                                <li class="menu-item">
                                    <a href="javascript:;">Find A Lawyer</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('blog') }}">Blog</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('account') }}">Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=================================
        Hero Area
    ===================================== -->
        <section class="hero-area hero-slider-3">
            <div class="sb-slick-slider" data-slick-setting='{
                                                        "autoplay": true,
                                                        "autoplaySpeed": 8000,
                                                        "slidesToShow": 1,
                                                        "dots":true
                                                        }'>
                <div class="single-slide bg-image  bg-overlay--dark" data-bg="image/bg-images/home-3-slider-3.jpg">
                    <div class="container">
                        <div class="home-content text-center">
                            <div class="row justify-content-end">
                                <div class="col-lg-6">
                                    <h1>Discover a whole to new way</h1>
                                    <h2>to manage your daily office routine</h2>
                                    <a href="javascript:void(0)" class="btn btn--yellow">
                                        Get started
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide bg-image  bg-overlay--dark" data-bg="image/bg-images/home-3-slider-5.jpg">
                    <div class="container">
                        <div class="home-content pl--30">
                            <div class="row justify-content-end">
                                <div class="col-lg-6">
                                    <h1>Digital Litigation!</h1>
                                    <h2>Our app will make your law practice enjoyable</h2>
                                    <a href="javascript:void(0)" class="btn btn--yellow">
                                        Get started
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Category Gallery
    ===================================== -->
        <section class="pt--30 section-margin">
            <h2 class="sr-only">Category Gallery Section</h2>
            <div class="container">
                <div class="section-title section-title--bordered">
                    <h2>About US</h2>
                </div>
                <div class="container text-center mb--30">
                    <p>{{ app_name() }} is your trusted partner for effective digital  legal practice and law office management. With our wide range of products and services, you can rest assured that your needs will be met and your expectations surpassed. At AppyLaw, we have a culture of delivering world class services to our clientèle, with an assurance of maintaining international industry best practices. Let us hold your hands and walk with you on the path to improved service delivery. Welcome to AppyLaw, your co-pilot on your flight into a world of digital and virtual legal practice</p>
                </div>
                <div class="row">
                    <div class="col-md-6 pt--20">
                        <img src="/image/about.jpg" style="border-radius: 10px; box-shadow: 4px 8px 20px 4px #eee;">
                    </div>
                    <div class="col-md-6 pt--20">
                        <h4 class="text-primary">Our Vision</h4>
                        <p>To be the melting  pot of Technology and Conservative legal practice space</p>
                        <h4 class="text-primary">Our Mission</h4>
                        <p>{{ app_name() }} is on a mission to bring the highest blend of Technology into the Conservative legal. With the use of state of the art Technology and front line technological software advancements, AppyLaw is on a mission to help the conventional lawyer level up and attain a practice style that is attune with the dictates and demands of the modern world.</p>
                        <h4 class="text-primary">Our Legacy</h4>
                        <p>AppyLaw is committed to helping you enjoy your work as a lawyer by providing you with top notch services to ease your workload. Our well organized  templates gives the lawyer the ability to achieve excellence, save time and offer to his clients in turn an exceptional service delivery within the shortest possible possible.</p>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Law office management system
                                <i class="fa fa-check text-success"></i>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Legal templates and law reports
                                <i class="fa fa-check text-success"></i>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Search for a lawyer in any location
                                <i class="fa fa-check text-success"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Category Gallery
    ===================================== -->
        <section class="pt--30 section-margin">
            <h2 class="sr-only">Category Gallery Section</h2>
            <div class="container">
                <div class="section-title section-title--bordered">
                    <h2>Features of our system</h2>
                </div>
                <div class="container text-center mb--30">
                    <p>We have a wide array of products and services, specifically tailored for your everyday legal practice.</p>
                </div>
                <div class="row">
                    <div class="col-md-3">        
                        <div class="card" style="box-shadow: 2px 4px 8px 2px #eee; border-radius: 2px; margin-top: 20px;">
                            <img src="/image/about.jpg" class="card-img-top" alt="..." style="height: 150px;">
                            <div class="card-body">
                                <h5 class="card-title">Case Manager</h5>
                                <p class="card-text">Our case manager is a digital solution to managing your day to day law office routine.</p>
                                <a target="_blank" href="https://casemanager.appylaw.com" class="text-primary">Go to Case Manager</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">        
                        <div class="card" style="box-shadow: 2px 4px 8px 2px #eee; border-radius: 2px; margin-top: 20px;">
                            <img src="/image/cart.png" class="card-img-top" alt="..." style="height: 150px;">
                            <div class="card-body">
                                <h5 class="card-title">Resource Center</h5>
                                <p class="card-text">Our resource center contains legal templates, book and articles that will make you a better lawyer.</p>
                                <a href="{{ route('resource_center') }}" class="text-primary">Go to Resource Center</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">        
                        <div class="card" style="box-shadow: 2px 4px 8px 2px #eee; border-radius: 2px; margin-top: 20px;">
                            <img src="/image/event.jpg" class="card-img-top" alt="..." style="height: 150px;">
                            <div class="card-body">
                                <h5 class="card-title">Events</h5>
                                <p class="card-text">We provide you with information on periodic events organized by AppyLaw and by the legal community, to help you stay informed and grow your knowledge.</p>
                                <a href="{{ route('legal_event') }}" class="text-primary">Go to Event</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">        
                        <div class="card" style="box-shadow: 2px 4px 8px 2px #eee; border-radius: 2px; margin-top: 20px;">
                            <img src="/image/find.png" class="card-img-top" alt="..." style="height: 150px;">
                            <div class="card-body">
                                <h5 class="card-title">Find a lawyer</h5>
                                <p class="card-text">Find your preferred lawyer for the legal job in any location, in any field of law, and at a personal negotiated fee.</p>
                                <a href="javascript:;" class="text-primary">Find A lawyer</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">        
                        <div class="card" style="box-shadow: 2px 4px 8px 2px #eee; border-radius: 2px; margin-top: 20px;">
                            <img src="/image/blog.jpg" class="card-img-top" alt="..." style="height: 150px;">
                            <div class="card-body">
                                <h5 class="card-title">AppyBlog</h5>
                                <p class="card-text">AppyBlog keeps you updated on current happenings as well as contemporary issues both within the legal space and the society at large.</p>
                                <a href="{{ route('blog') }}" class="text-primary">View blog post</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <!--=================================
        CLIENT TESTIMONIALS
    ===================================== -->
        <section class="section-margin">
            <div class="container">
                <div class="section-title section-title--bordered mb-lg--60">
                    <h2>CLIENT TESTIMONIALS</h2>
                </div>
                <div class="sb-slick-slider testimonial-slider" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow":3,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 2} },
                {"breakpoint":992, "settings": {"slidesToShow": 1} },
                {"breakpoint":768, "settings": {"slidesToShow": 1} },
                {"breakpoint":490, "settings": {"slidesToShow": 1} }
            ]'>
                    <div class="single-slide">
                        <div class="testimonial-card">
                            <div class="testimonial-image">
                                <img src="image/lawyer1.jpg" alt="" style="height: 100px; width: 100px; border-radius: 50%;">
                            </div>
                            <div class="testimonial-body">
                                <article>
                                    <h2 class="sr-only">Testimonial Article</h2>
                                    <p>This is the best polatform i have ever used. the templates are on oint and really helpful.</p>
                                    <span class="d-block client-name">Chidi Umeokafor</span>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="testimonial-card">
                            <div class="testimonial-image">
                                <img src="image/lawyer2.jpg" alt="" style="height: 100px; width: 100px; border-radius: 50%;">
                            </div>
                            <div class="testimonial-body">
                                <article>
                                    <h2 class="sr-only">Testimonial Article</h2>
                                    <p>Its the support you give that i really like, the system is very much good to my taste but its manageable</p>
                                    <span class="d-block client-name">Hycinth Moris</span>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="testimonial-card">
                            <div class="testimonial-image">
                                <img src="image/lawyer3.jpg" alt="" style="height: 100px; width: 100px; border-radius: 50%;">
                            </div>
                            <div class="testimonial-body">
                                <article>
                                    <h2 class="sr-only">Testimonial Article</h2>
                                    <p>I really like what you guys have to offer. I strongly recommend this platform to all lawyers.</p>
                                    <span class="d-block client-name">Rebecka Abiola</span>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal -->
        <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
            aria-labelledby="quickModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="product-details-modal">
                        <div class="row">
                            <div class="col-lg-5">
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
                                        <img src="image/products/product-details-1.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-2.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-3.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-4.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-5.jpg" alt="">
                                    </div>
                                </div>
                                <!-- Product Details Slider Nav -->
                                <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two"
                                    data-slick-setting='{
            "infinite":true,
              "autoplay": true,
              "autoplaySpeed": 8000,
              "slidesToShow": 4,
              "arrows": true,
              "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
              "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
              "asNavFor": ".product-details-slider",
              "focusOnSelect": true
              }'>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-1.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-2.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-3.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-4.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-5.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 mt--30 mt-lg--30">
                                <div class="product-details-info pl-lg--30 ">
                                    <p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>
                                    <h3 class="product-title">Beats EP Wired On-Ear Headphone-Black</h3>
                                    <ul class="list-unstyled">
                                        <li>Ex Tax: <span class="list-value"> £60.24</span></li>
                                        <li>Brands: <a href="#" class="list-value font-weight-bold"> Canon</a></li>
                                        <li>Product Code: <span class="list-value"> model1</span></li>
                                        <li>Reward Points: <span class="list-value"> 200</span></li>
                                        <li>Availability: <span class="list-value"> In Stock</span></li>
                                    </ul>
                                    <div class="price-block">
                                        <span class="price-new">£73.79</span>
                                        <del class="price-old">£91.86</del>
                                    </div>
                                    <div class="rating-widget">
                                        <div class="rating-block">
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star "></span>
                                        </div>
                                        <div class="review-widget">
                                            <a href="#">(1 Reviews)</a> <span>|</span>
                                            <a href="#">Write a review</a>
                                        </div>
                                    </div>
                                    <article class="product-details-article">
                                        <h4 class="sr-only">Product Summery</h4>
                                        <p>Long printed dress with thin adjustable straps. V-neckline and wiring under
                                            the Dust with ruffles
                                            at the bottom
                                            of the
                                            dress.</p>
                                    </article>
                                    <div class="add-to-cart-row">
                                        <div class="count-input-block">
                                            <span class="widget-label">Qty</span>
                                            <input type="number" class="form-control text-center" value="1">
                                        </div>
                                        <div class="add-cart-btn">
                                            <a href="#" class="btn btn-outlined--primary"><span
                                                    class="plus-icon">+</span>Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="compare-wishlist-row">
                                        <a href="#" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                                        <a href="#" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="widget-social-share">
                            <span class="widget-label">Share:</span>
                            <div class="modal-social-share">
                                <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=================================
    Footer
===================================== -->
    </div>
        <!-- contact area Start -->
        <main class="contact_area inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mapouter"><div class="gmap_canvas"><iframe id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="width: 100%; height: auto;"></iframe><br><style>.mapouter{position:relative;text-align:right;height:auto;width:100%;}</style><style>.gmap_canvas {overflow:hidden;background:none!important;height:auto;width:100%;}</style></div></div>
                    </div>
                </div>
            </div>
        </main>
    <!--=================================
    Footer Area
===================================== -->
    <footer class="site-footer">
        <div class="container">
            <div class="row justify-content-between  section-padding">
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="brand-footer footer-title">
                            <img src="/image/appylogo.png" alt="">
                        </div>
                        <div class="footer-contact">
                            <p><span class="label">Address:</span><span class="text">{{ app_address() }}</p>
                            <p><span class="label">Phone:</span><span class="text">+{{ app_phone() }}</span></p>
                            <p><span class="label">Email:</span><span class="text">{{ app_email() }}</span></p>
                        </div>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Information</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a href="javascript:void(0)">About Us</a></li>
                            <li><a href="javascript:void(0)">New products</a></li>
                            <li><a href="javascript:void(0)">Best sales</a></li>
                            <li><a href="{{ route('contact') }}">Contact us</a></li>
                            <li><a href="javascript:void(0)">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Extras</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a target="_blank" href="https://nigerianbar.org.ng/">NBA Branches</a></li>
                            <li><a target="_blank" href="https://casemanager.appylaw.com">Case Manager</a></li>
                            <li><a href="{{ route('store') }}">Stores</a></li>
                            <li><a href="{{ route('contact') }}">Contact us</a></li>
                            <li><a href="javascript:void(0)">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-title">
                        <h3>Newsletter Subscribe</h3>
                    </div>
                    <div class="newsletter-form mb--30">
                        <form action="https://template.hasthemes.com/pustok/pustok/php/mail.php">
                            <input type="email" class="form-control" placeholder="Enter Your Email Address Here...">
                            <button class="btn btn--primary w-100">Subscribe</button>
                        </form>
                    </div>
                    <div class="social-block">
                        <h3 class="title">STAY CONNECTED</h3>
                        <ul class="social-list list-inline">
                            <li class="single-social facebook"><a href="#"><i class="ion ion-social-facebook"></i></a>
                            </li>
                            <li class="single-social twitter"><a href="#"><i class="ion ion-social-twitter"></i></a></li>
                            <li class="single-social google"><a href="#"><i
                                        class="ion ion-social-googleplus-outline"></i></a></li>
                            <li class="single-social youtube"><a href="#"><i class="ion ion-social-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <a href="#" class="payment-block">
                    <img src="/image/icon/payment.png" alt="">
                </a>
                <p class="copyright-text">Copyright © {{ \Carbon\Carbon::now()->format('Y') }} <a href="javascript:void(0)" class="author">{{ app_name() }}</a>. All Right Reserved.
                    <br>
                    Design By {{ app_name() }}</p>
            </div>
        </div>
    </footer>
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="js/plugins.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/custom.js"></script>
</body>


<!-- Mirrored from template.hasthemes.com/pustok/pustok/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Sep 2021 14:51:45 GMT -->
</html>