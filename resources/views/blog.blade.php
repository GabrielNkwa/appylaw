@extends('app1')

@section('content')
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <section class="inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-2 mb--40 mb-lg--0">
                        <div class="row space-db-lg--60 space-db--30">
                            @if($blogs)
                                @foreach($blogs as $blog)
                                    <div class="col-lg-4 col-md-6 mb-lg--60 mb--30">
                                        <div class="blog-card card-style-grid" style="box-shadow: 2px 4px 8px 2px #eee; border-radius: 10px; padding: 20px;">
                                            <a href="{{ route('blog_details', $blog->url) }}" class="image d-block">
                                                <img src="{{ image_url($blog->image) }}" alt="">
                                            </a>
                                            <div class="card-content">
                                                <h3 class="title"><a href="{{ route('blog_details', $blog->url) }}">{{ $blog->title }}</a></h3>
                                                <p class="post-meta"><span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y') }} </span> | <a href="javascript:void(0)">Support</a></p>
                                                <article>
                                                    <h2 class="sr-only">
                                                        Blog Article
                                                    </h2>
                                                    <p>{{ truncate($blog->description, 100) }}</p>
                                                    <a href="{{ route('blog_details', $blog->url) }}" class="blog-link">Read More</a>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="inner-page-sidebar">
                            <div class="single-block">
                                <h2 class="sidebar-title mb--30">Search</h2>
                                <div class="site-mini-search">
                                    <form action="{{ route('blog') }}">
                                        <input type="text" placeholder="Search" name="search">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="single-block ">
                                <h2 class="sidebar-title mb--30">RECENT POSTS</h2>
                                <ul class="sidebar-list">
                                    @if($recent_blogs)
                                        @foreach($recent_blogs as $blog)
                                            <li><a href="{{ route('blog_details', $blog->url) }}"> {{ $blog->title }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection