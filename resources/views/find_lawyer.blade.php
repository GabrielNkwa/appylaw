@extends('app1')

@section('content')

		<section class="breadcrumb-section">
		    <h2 class="sr-only">Site Breadcrumb</h2>
		    <div class="container">
		        <div class="breadcrumb-contents">
		            <nav aria-label="breadcrumb">
		                <ol class="breadcrumb">
		                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
		                    <li class="breadcrumb-item active">Find A Lawyer</li>
		                </ol>
		            </nav>
		        </div>
		    </div>
            <div class="container mb-2">
            	<form action="{{ route('find_lawyer') }}">
	                <div class="header-search-block">
	                    <input name="search" type="text" placeholder="Search for a lawyer by name, city or state.">
	                    <button>Search Lawyer</button>
	                </div>
            	</form>
            </div>
		</section>
		<section class="inner-page-sec-padding-bottom space-db--30">
		    <div class="container">
		        <div class="row space-db-lg--60 space-db--30">
		        	@if($lawyers)
			        	@foreach($lawyers as $lawyer)
				            <div class="col-lg-4 col-md-4 mb-lg--60 mb--30">
				                <div class="blog-card card-style-grid" style="box-shadow: 2px 4px 8px 2px #eee; border-radius: 10px; padding: 20px;">
				                    <a href="{{ route('find_lawyer_details', $lawyer->unique_id) }}" class="image d-block">
				                        <img src="{{ image_url($lawyer->avatar) }}" alt="" style="height: 250px !important; width: 100% !important;" />
				                    </a>
				                    <div class="card-content">
				                        <h3 class="title"><a href="{{ route('find_lawyer_details', $lawyer->unique_id) }}">{{ $lawyer->name }}</a></h3>
				                        <p class="post-meta"><span>{{ $lawyer->practice_city }} </span> | <a href="#">{{ $lawyer->practice_state }}</a></p>
				                    </div>
				                </div>
				            </div>
			            @endforeach
		            @endif
		        </div>
		    </div>
		</section>


@endsection