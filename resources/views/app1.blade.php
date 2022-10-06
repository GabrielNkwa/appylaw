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
        <div class="site-header header-2 mb--20 d-none d-lg-block">
            <div class="header-bottom bg-primary">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <a href="{{ route('index') }}" class="site-brand">
                                <img src="/image/appylogo.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <div class="header-phone color-white">
                                <div class="icon">
                                    <i class="fas fa-headphones-alt"></i>
                                </div>
                                <div class="text">
                                    <p>Free Support 24/7</p>
                                    <p class="font-weight-bold number">+{{ app_phone() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right main-menu--white li-last-0">
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
                            <a href="{{ route('index') }}" class="site-brand">
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

        @yield('content')

    </div>
    <!--=================================
    Brands Slider
    ===================================== -->
    <section class="section-margin">
        <h2 class="sr-only">Brand Slider</h2>
        <div class="container">
            <div class="brand-slider sb-slick-slider border-top border-bottom" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 6
                                            }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 4} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 3} },
                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
                <div class="single-slide">
                    <img src="image/others/brand-1.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-2.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-3.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-4.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-5.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-6.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-1.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-2.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
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
    <script src="/js/plugins.js"></script>
    <script src="/js/ajax-mail.js"></script>
    <script src="/js/custom.js"></script>
    
    <!-- Toastr Script -->
    <script src="/plugins/toastr/toastr.min.js"></script>
    
    <script type="text/javascript">
    function toast(type, body){
        toastr.options.closeButton = true;
        toastr.options.positionClass = 'toast-top-right';    
        toastr[type](body);
    }
    </script>

    @if(session()->has('message'))
        <script>
            toastr.options.closeButton = true;
            toastr.options.positionClass = 'toast-top-right';    
            toastr["{{ session()->get('message')['type'] }}"]("{{ session()->get('message')['body'] }}");
        </script>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-top-right';    
                toastr["error"]("{{ $error }}");
            </script>
        @endforeach
    @endif
    @yield('scripts')
    <script type="text/javascript">

        var url = "{{ app_url() }}"

        function addToCart(item_id, item_category, item_name, item_current_price, item_thumbnail){
            var cart = JSON.parse(localStorage.getItem("cart") || "[]")

            //check for the item in the cart
            var item = cart.filter((item)=> item.unique_id == item_id)
            if(item.length < 1){
                var obj = {
                    unique_id : item_id,
                    category : item_category,
                    name : item_name,
                    price : item_current_price,
                    avatar : item_thumbnail,
                }

                //add to cart
                cart.push(obj)

                //save to localstorage
                localStorage.setItem("cart", JSON.stringify(cart))

                toast("success", "item added successfully")

                //update cart info
                updateCartInfo()
            }
            else{
                toast("info", "item has already been added to cart")
            }
        }

        function removeFromCart(item_id = null){
            if(item_id){
                if(confirm('are you sure you want to remove this item from cart?')){
                    var cart = JSON.parse(localStorage.getItem("cart") || "[]")

                    //get order items not the one
                    var items = cart.filter((item)=> item.unique_id != item_id)

                    //save to localstorage
                    localStorage.setItem("cart", JSON.stringify(items))

                    toast("success", "item removed successfully")

                    //update cart info
                    updateCartInfo()

                    //load cart
                    loadCart()
                }
            }
            else{
                if(confirm('are you sure you want to empty your cart?')){
                    //reset localstorage to null
                    localStorage.setItem("cart", "[]")

                    toast("success", "cart emtied successfully")

                    //update cart info
                    updateCartInfo()

                    //load cart
                    loadCart()
                }
            }
        }

        function updateCartInfo(){
            var cart = JSON.parse(localStorage.getItem("cart") || "[]")
            var total_price = 0

            //loop the cart
            for(var i = 0; i < cart.length; i++){
                total_price += parseInt(cart[i].price)
            }

            //update the count of cart items
            $('#cart-count').html(cart.length || 0)

            //update the count of cart items
            $('#cart-total-price').html(total_price || 0)

            console.log(cart)
        }

        function image_url(avatar){
            return (url + '/storage/' + avatar + '?' + (new Date()))
        }

        $(document).ready(()=>{
            updateCartInfo()
        })

        function share(title, id){  
            var url = "{{ app_url() }}" + '/store-details/' + id

            if (navigator.share) {
                navigator.share({
                    title: title,
                    url: url
                }).then(() => {
                    console.log('Thanks for sharing!');
                })
                .catch(console.error);
            } else {
                // fallback
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val(url).select();
                document.execCommand("copy");
                $temp.remove();
                
                toast("info", "link copied to clipboard")
            }
        }
    </script>
</body>


<!-- Mirrored from template.hasthemes.com/pustok/pustok/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Sep 2021 14:51:27 GMT -->
</html>