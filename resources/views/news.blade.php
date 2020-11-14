@extends('layouts.app')

@section('title', $news->title)
@section('content')
    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-0-80">
        <div class="container">
{{--            <p>{{ asset($news->img_url) }}</p>--}}
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="blog-posts-area">
                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post single-post">
                            <div class="post-thumb">
                                <a href="#"><img src="{{ asset($news->img_url) }}" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="#" class="post-catagory">{{ $news->category }}</a>
                                <a href="#" class="post-title">
                                    <h6>{{ $news->title }}</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author"><a href="#">{{ $news->created_at }}</a></p>
                                        <p> {{ $news->body }} </p>
                                    <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                        <!-- Tags -->
                                        <div class="newspaper-tags d-flex">
                                            <span>Tags:</span>
                                            <ul class="d-flex">
                                                <li><a href="#">finacial,</a></li>
                                                <li><a href="#">politics,</a></li>
                                                <li><a href="#">stock market</a></li>
                                            </ul>
                                        </div>

                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center post-like--comments">
                                            <a href="{{ route('news.update',['id' => $news->id]) }}" class="post-like"><img src="{{ asset('img/core-img/like.png') }}" alt=""> <span>{{ $news->likes }}</span></a>
                                            <a href="#" class="post-comment"><img src="{{ asset('img/core-img/chat.png') }}" alt=""> <span>{{ \App\Models\Comments::where('news_id',$news->id)->count() }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- About Author -->
                        <div class="blog-post-author d-flex">
                            <div class="author-thumbnail">
                                <img src="{{ asset(\App\Models\Admin::where('id',1)->first()->img_url) }}" alt="">
                            </div>
                            <div class="author-info">
                                <a href="#" class="author-name">{{  \App\Models\Admin::where('id',1)->first()->name }}<span> , The Author</span></a>
                            </div>
                        </div>


                        <div class="section-heading">
                            <h6>Related</h6>
                            @foreach(\App\Models\News::where('category','finance') as $category)
                                @if($category!=null)
                                    <h6>{{ $category }}</h6>ghg
                                @else
                                    ghg
                                @endif
                            @endforeach

                        </div>


                        <div class="row">
                            <!-- Single Post -->
                            <div class="col-12 col-md-6">
                                <div class="single-blog-post style-3 mb-80">
                                    <div class="post-thumb">
                                        <a href="#"><img src="{{ asset('img/bg-img/12.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="post-data">
                                        <a href="#" class="post-catagory">Finance</a>
                                        <a href="#" class="post-title">
                                            <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                        </a>
                                        <div class="post-meta d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="{{ asset('img/core-img/like.png') }}" alt=""> <span>392</span></a>
                                            <a href="#" class="post-comment"><img src="{{ asset('img/core-img/chat.png') }}" alt=""> <span>10</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Post -->
                            <div class="col-12 col-md-6">
                                <div class="single-blog-post style-3 mb-80">
                                    <div class="post-thumb">
                                        <a href="#"><img src="{{ asset('img/bg-img/13.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="post-data">
                                        <a href="#" class="post-catagory">Finance</a>
                                        <a href="#" class="post-title">
                                            <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                        </a>
                                        <div class="post-meta d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="{{ asset('img/core-img/like.png') }}" alt=""> <span>392</span></a>
                                            <a href="#" class="post-comment"><img src="{{ asset('img/core-img/chat.png') }}" alt=""> <span>10</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix">
                            <h5 class="title">{{ \App\Models\Comments::all()->count() }} <span>Comment</span></h5>

                            <ol>

                                @foreach(\App\Models\Comments::all() as $comment)

                                    @if($comment->news_id == $news->id)
                                        <!-- Single Comment Area -->
                                        <li class="single_comment_area">
                                            <!-- Comment Content -->
                                            <div class="comment-content d-flex">
                                                <!-- Comment Author -->
                                                <div class="comment-author">
{{--                                                    <img src="{{ asset(Auth::guard('admin')->user()->img_url) }}" alt="author">--}}
                                                    <img src="{{ asset(\App\User::where('id',$comment->user_id)->first()->img_url) }}" alt="author">
                                                </div>
                                                <!-- Comment Meta -->
                                                <div class="comment-meta">
                                                    <a href="#" class="post-author">{{ \App\User::where('id',$comment->user_id)->first()->name }}</a>
                                                    <p>{{ $comment->comment_body }}</p>
                                                </div>
                                            </div>
                                        </li>

                                    @endif
                                @endforeach

                            </ol>
                        </div>

                        <div class="post-a-comment-area section-padding-80-0">
                            <h4>Leave a comment</h4>

                            <!-- Reply Form -->
                            <div class="contact-form-area">
                                <form action="{{ route('user.comment') }}" method="post" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" name="news_id" value="{{ $news->id }}"><br>
                                            <textarea name="comment" class="form-control" id="comment" cols="30" rows="10" placeholder="comment" required></textarea>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn newspaper-btn mt-30 w-100" type="submit">Submit Comment</button>
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
@endsection
