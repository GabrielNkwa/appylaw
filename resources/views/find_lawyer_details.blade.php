@extends('app1')

@section('content')
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Lawyer Details</li>
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
                                <img src="{{ image_url($lawyer->avatar) }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product-details-info pl-lg--30 ">
                            <h3 class="product-title">{{ $lawyer->name }}</h3>
                            <ul class="list-unstyled">
                                <li>Email: <span class="list-value"> {{ $lawyer->email }}</span></li>
                                <li>Phone: <span class="list-value"> {{ $lawyer->phone }}</span></li>
                                <li>Year of Call: <a href="#" class="list-value font-weight-bold"> {{ $lawyer->year_of_call }}</a></li>
                                <li>Office Address: <span class="list-value"> {{ $lawyer->office_address }}</span></li>
                                <li>Practice Location: <span class="list-value"> {{ $lawyer->practice_city . ', ' . $lawyer->practice_state }}</span></li>
                            </ul>
                            <article class="product-details-article">
                                <h6 class="text-primary"><em>Schools Attended</em></h6>
                                {{ $lawyer->schools_attended }}
                            </article>
                            <article class="product-details-article">
                                <h6 class="text-primary"><em>Practice Areas</em></h6>
                                {{ $lawyer->practice_areas }}
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection