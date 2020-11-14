
@extends('.admin.Layouts.admin_layout')
@section('title', $news->title)
@section('content')
<div class="single-news-wrapper">
    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-0-80">
        <div class="container">
            {{--            <p>{{ asset($news->img_url) }}</p>--}}
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post single-post">
                            <div class="post-thumb" >
                                <a href="#"><img class="news-img" src="{{ asset($news->img_url) }}" alt=""></a>
                            </div>
                            <div class="post-data" style="margin-top: 20px;">
                                <a href="#" class="post-catagory"><span>{{ $news->category }}</span></a>
                                <span class="post-title">{{ $news->title }}</span>
                                <div class="post-meta">
                                    <p class="post-author"><a href="#">{{ $news->created_at }}</a></p>
                                    <p> {{ $news->body }} </p>
                                    <hr>
                                    <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                        <!-- Tags -->
                                        <div class="newspaper-tags d-flex">

                                        </div>

                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center post-like--comments">
                                            <a href="{{ route('news.update',['id' => $news->id]) }}" class="post-like px-3"><img src="{{ asset('img/core-img/like.png') }}" alt=""> <span>{{ $news->likes }}</span></a>
                                            <a href="#" class="post-comment px-3"><img src="{{ asset('img/core-img/chat.png') }}" alt=""> <span>{{ \App\Models\Comments::where('news_id',$news->id)->count() }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix">
                            <h5 class="title font-weight-bolder">{{ \App\Models\Comments::all()->where('news_id', $news->id)->count() }} <span>Comment</span></h5>

                            <ol>

                            @foreach(\App\Models\Comments::all()->where('news_id', $news->id) as $comment)

                                @if($comment->news_id == $news->id)
                                    <!-- Single Comment Area -->
                                        <li class="single_comment_area">
                                            <!-- Comment Content -->
                                            <div class="comment-content d-flex py-2">
                                                <!-- Comment Author -->
                                                <div class="comment-author">
                                                    <img src="{{ asset(\App\User::where('id',$comment->user_id)->first()->img_url) }}" alt="author" style="height: 50px; width: 50px; border-radius: 50px;">
                                                </div>
                                                <!-- Comment Meta -->
                                                <div class="comment- px-5">
                                                    <a href="#" class="post-author" style="font-weight: bold;">{{ \App\User::where('id',$comment->user_id)->first()->name }}</a>
                                                    <p>{{ $comment->comment_body }}</p>
                                                </div>

                                            </div>
                                            <hr>
                                        </li>

                                    @endif
                                @endforeach

                            </ol>
                        </div>

                        <div class="post-a-comment-area section-padding-80-0">
                            <h4>Leave a comment</h4>

                            <!-- Reply Form -->
                            <div class="contact-form-area">
                                <form action="{{ route('admin.comment') }}" method="post" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" name="news_id" value="{{ $news->id }}"><br>
                                            <textarea name="comment" class="form-control" id="comment" cols="30" rows="10" placeholder="comment" required></textarea>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn btn-danger newspaper-btn mt-30 w-100" type="submit">Submit Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
</div>
<style>
    .single-news-wrapper{

    }
    .news-img{
        width: 100%;
        height: 70vh;
    }
    a{
        color: black;
    }
    .post-catagory{
        background: #e88f8f;
        padding: 9px;
        /* margin: 9px; */
        border-radius: 5px;
        color: white; px-3
    }
    .post-title{
        display: block;
        font-size: 24px;
        font-weight: bold;
        margin-top: 21px;
    }
    .newspaper-btn{
        margin-top: 26px;
        background-color: #e88f8f;border: none;
    }
    .comment-author{
        height: 50px;
        width: 50px;
        border-radius: 50px;
    }
</style>
@endsection

