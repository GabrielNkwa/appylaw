@extends('app1')

@section('content')
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('blog') }}">Home</a></li>
                            <li class="breadcrumb-item active">Blog Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <section class="inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-2 mb--40 mb-lg--0">
                        <div class="blog-post post-details mb--50">
                            <div class="blog-image" style="box-shadow: 2px 4px 8px 2px #eee; border-radius: 10px; padding: 20px;">
                                <img src="{{ image_url($blog->image) }}" alt="">
                            </div>
                            <div class="blog-content mt--30">
                                <header>
                                    <h3 class="blog-title"> {{ $blog->title }}</h3>
                                    <div class="post-meta">
                                        <span class="post-author">
                                            <i class="fas fa-user"></i>
                                            <span class="text-gray">Posted by : </span>
                                            admin
                                        </span>
                                        <span class="post-separator">|</span>
                                        <span class="post-date">
                                            <i class="far fa-calendar-alt"></i>
                                            <span class="text-gray">On : </span>
                                            {{ \Carbon\Carbon::parse($blog->created_at)->format('d-m-Y H:ia') }}
                                        </span>
                                    </div>
                                </header>
                                <article>
                                    {!! $blog->body !!}
                                </article>
                            </div>
                        </div>
                        <div class="share-block mb--50">
                            <h3>Share Now</h3>
                            <div class="social-links  justify-content-center  mt--10">
                                <a href="#" class="single-social social-rounded"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="single-social social-rounded"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="single-social social-rounded"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#" class="single-social social-rounded"><i
                                        class="fab fa-google-plus-g"></i></a>
                                <a href="#" class="single-social social-rounded"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="comment-block-wrapper mb--50" id="commentHolder">
                            <h3>{{ $comment_count }} Comments</h3>
                        </div>
                        @if(user())
                        <div class="replay-form-wrapper" id="comment-reply">
                            <h3 class="mt-0">LEAVE A REPLY</h3>
                            <input type="hidden" id="type" value="comment">
                            <input type="hidden" id="comment_id">
                            <input type="hidden" id="blog_id" value="{{ $blog->unique_id }}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message">Comment</label>
                                        <textarea name="message" id="comment" cols="30" rows="10"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="submit-btn">
                                        <button href="#" onclick="comment()" class="btn btn-black">Post Comment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
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

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script>
        $(document).ready(()=>{
            loadComment()
        })

        function loadComment(){
            var commentHolder = $('#commentHolder')
            var blog_id = $('#blog_id').val()
            $.get("{{ route('blog_comment_get') }}", { blog_id : blog_id })
                .done((response)=>{
                    console.log(response)
                    
                    //clear commentHolder
                    commentHolder.html(null)

                    for(var i = 0; i < response.comments.length; i++){
                        commentHolder.append('\
                            <div class="single-comment">\
                                <div class="comment-avatar">\
                                    <img src="/assets/images/user/user.png" alt="">\
                                </div>\
                                <div class="comment-text">\
                                    <h5 class="author"> <a href="javascript:void(0)"> '+ response.comments[i].user_name +'</a></h5>\
                                    <span class="time">'+ getActualTime(response.comments[i].created_at) +'</span>\
                                    <p>'+ response.comments[i].comment +'</p>\
                                </div>\
                                <a href="#comment-reply" onclick="reply('+ "'" + response.comments[i].unique_id+ "'" +')" class="btn btn-outlined--primary btn-rounded reply-btn">Reply</a>\
                            </div>\
                        ')

                        var comment_replies = response.replies.filter(reply => reply.comment_id == response.comments[i].unique_id)
                        if(comment_replies.length > 0){
                            for(var j = 0; j < comment_replies.length; j++){
                                commentHolder.append('\
                                    <div class="single-comment" style="margin-left: 20px;">\
                                        <div class="comment-avatar">\
                                            <img src="/assets/images/user/user.png" alt="">\
                                        </div>\
                                        <div class="comment-text">\
                                            <h5 class="author"> <a href="javascript:void(0)"> '+ comment_replies[j].user_name +'</a></h5>\
                                            <span class="time">'+ getActualTime(comment_replies[j].created_at) +'</span>\
                                            <p>'+ comment_replies[j].reply +'</p>\
                                        </div>\
                                        <a href="#comment-reply" onclick="reply('+ "'" + response.comments[i].unique_id+ "'" +')" class="btn btn-outlined--primary btn-rounded reply-btn">Reply</a>\
                                    </div>\
                                ')

                            }
                        }
                    }
                })
                .fail((response)=>{
                    console.log(response)
                })
        }

        function comment(){
            var type = $('#type').val()
            var comment_id = $('#comment_id').val()
            var blog_id = $('#blog_id').val()
            var comment = $('#comment').val()

            if(comment != ""){
                $.get("{{ route('blog_comment') }}", { type : type, comment_id : comment_id, blog_id : blog_id, comment : comment })
                    .done((response)=>{
                        loadComment()
                        $('#comment').val(null)
                        $('#comment_id').val(null)
                        toast(response.type, response.body)
                    })
                    .fail((response)=>{
                        console.log(response)
                    })
            }
            else{
                toast("error", 'comment field cannot be empty')
            }
        }

        function reply(comment_id){
            $('#type').val('reply')
            $('#comment_id').val(comment_id)
        }

        function getActualTime(time){
            var d = new Date(time)
            var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
            var dateString = normalize(d.getDay())+ ' ' + months[d.getMonth()]+ ' ' + d.getFullYear()
            return dateString
        }

        function normalize(number){
            return ("0" + number).slice(-2)
        }
    </script>
@endsection