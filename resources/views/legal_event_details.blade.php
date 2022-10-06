@extends('app1')

@section('content')
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Event Details</li>
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
                            <div class="single-slide" style="box-shadow: 2px 4px 8px 2px #eee; border-radius: 10px; padding: 20px;">
                                <img src="{{ image_url($event->avatar) }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product-details-info pl-lg--30 ">
                            <h3 class="product-title">{{ $event->title }}</h3>
                            <ul class="list-unstyled">
                                <li>Access Type: <span class="list-value"> {{ $event->access_type }}</span></li>
                                <li>Start Date: <a href="#" class="list-value font-weight-bold"> {{ \Carbon\Carbon::parse($event->start_date)->format('D d M Y') }}</a></li>
                                <li>End Date: <span class="list-value"> {{ \Carbon\Carbon::parse($event->end_date)->format('D d M Y') }}</span></li>
                            </ul>
                            <div class="price-block">
                                <span class="price-new">&#8358; {{ number_format($event->price, 2, '.', ',') }}</span>
                            </div>
                            <article class="product-details-article">
                                <h4 class="sr-only">Event Summary</h4>
                                {{ $event->body }}
                            </article>
                            @if(user())
                            <form>
                                <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                            </form>
                            <div class="compare-wishlist-row">
                                <a onclick="return confirm('are you sure you want to register for this event?') ? makePayment() : null" href="javascript:void(0)" class="add-link"><i class="fas fa-plus-circle"></i>Register for this event</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection

@section('scripts')
    <script src="https://js.paystack.co/v1/inline.js"></script> 
    <script type="text/javascript">
        var unique_id = "{{ $event->unique_id }}"
        var access_type = "{{ $event->access_type }}"
        var amount = "{{ $event->price }}"
        var email = "{{ user() ? user()->email : NULL }}"
        var phone = "{{ user() ? user()->phone : NULL }}"

        function makePayment(){
            if(access_type == "Free"){
                register()
            }
            else{
                var reference = "{{ generate_random_numbers(16) }}";
                let handler = PaystackPop.setup({
                    key: "{{ app_public_key() }}", // Replace with your public key
                    email: email,
                    amount: parseFloat(amount) * 100,
                    ref: reference, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    // label: "Optional string that replaces customer email"
                    onClose: function () {
                        toast("error", "payment cancelled");
                        //reportSale(reference)
                    },
                    callback: function (response) {
                        toast("success", "Payment complete, please exercise patience while we verify your payment!");
                        register(reference)
                    },
                });
                handler.openIframe();
            }
        }

        function register(reference = null){
            $.get("{{ route('legal_event_register') }}", {
                unique_id : unique_id,
                reference : reference,
            })
            .done((response)=>{
                toast(response.type, response.message)
            })
            .fail((response)=>{
                console.log(response)
            })
        }
    </script>
@endsection