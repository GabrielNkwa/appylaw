@extends('app1')

@section('content')

		<section class="breadcrumb-section">
		    <h2 class="sr-only">Site Breadcrumb</h2>
		    <div class="container">
		        <div class="breadcrumb-contents">
		            <nav aria-label="breadcrumb">
		                <ol class="breadcrumb">
		                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
		                    <li class="breadcrumb-item active">Events</li>
		                </ol>
		            </nav>
		        </div>
		    </div>
		</section>
		<section class="inner-page-sec-padding-bottom space-db--30">
		    <div class="container">
		        <div class="row space-db-lg--60 space-db--30">
		        	@if($events)
			        	@foreach($events as $event)
				            <div class="col-lg-4 col-md-6 mb-lg--60 mb--30">
				                <div class="blog-card card-style-grid" style="box-shadow: 2px 4px 8px 2px #eee; border-radius: 10px; padding: 20px;">
				                    <a href="{{ route('legal_event_details', $event->unique_id) }}" class="image d-block">
				                        <img src="{{ image_url($event->avatar) }}" alt="" style="height: 250px !important; width: 100% !important;" />
				                    </a>
				                    <div class="card-content">
				                        <h3 class="title"><a href="{{ route('legal_event_details', $event->unique_id) }}">{{ $event->title }}</a></h3>
				                        <p class="post-meta"><span>{{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y') }}</span></p>
				                        <article>
				                            <h2 class="sr-only">
				                                Event Description
				                            </h2>
				                            <p>{{ \Str::limit($event->body, 150) }}</p>
				                            <a href="{{ route('legal_event_details', $event->unique_id) }}" class="blog-link">Read More</a>
				                        </article>
				                    </div>
				                </div>
				            </div>
			            @endforeach
		            @endif
		        </div>
		    </div>
		</section>


@endsection