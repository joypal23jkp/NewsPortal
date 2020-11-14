@extends('layouts.app')
@section('title','Home')
@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-12 news-category-area">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active @if(\Request::getRequestUri() == '/') active @endif">
                            <a style=" font-size: 20px;" class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <a style=" font-size: 20px;" class="nav-link" href="{{ route('user.profile') }}">Profile<span class="sr-only">(current)</span></a>
                            @endif
                        </li>
                        <li class="nav-item mx-3 link-category @if(\Request::getRequestUri() == '/entertainment') active @endif ">
                            <a style=" font-size: 20px;" class="nav-link" href="{{ route('home','entertainment') }}">Entertainment <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item mx-3 link-category  @if(\Request::getRequestUri() == '/sports') active @endif ">
                            <a style=" font-size: 20px;" class="nav-link" href="{{ route('home','sports') }}">Sports</a>
                        </li>
                        <li class="nav-item mx-3 link-category  @if(\Request::getRequestUri() == '/information-technology') active @endif">
                            <a style=" font-size: 20px;" class="nav-link" href="{{ route('home','information-technology') }}">Information Technology</a>
                        </li>
                        <li class="nav-item mx-3 link-category  @if(\Request::getRequestUri() == '/travels') active @endif">
                            <a style=" font-size: 20px;" class="nav-link" href="{{ route('home','travel') }}">Travels</a>
                        </li>
                        <li class="nav-item mx-3 link-category  @if(\Request::getRequestUri() == '/business') active @endif">
                            <a style=" font-size: 20px;" class="nav-link" href="{{ route('home','business') }}">Business</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- ##### Featured Post Area Start ##### -->

        <div class="featured-post-area py-3" style="padding-left: 53px; width: 100%;">
            <div class="py-1">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8">
                            <!-- Single Featured Post -->
                        @if($news_category == 'home')
                            @foreach(\App\Models\News::all()  as $news)
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="single-blog-post featured-post">
                                            <div class="post-thumb">
                                                <a class="post-thumb-pic" href="#" ><img src="{{ $news->img_url }}" alt="" style="height: 50vh; width:75%; "></a>
                                            </div>
                                            <div class="post-data">
                                                <a href="#" class="post-catagory">{{ $news->category }}</a>
                                                <a href="#" class="post-title">
                                                    <h6>{{ $news->title }}</h6>
                                                </a>
                                                <div class="post-meta">
                                                    <p class="post-author"> <a href="#">{{ $news->created_at }}</a></p>
                                                    <p class="post-excerp">{{ $news->body }}</p>
                                                    <!-- Post Like & Post Comment -->
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex">
                                                            <a href="{{ route('news.update',['id' => $news->id]) }}" class="post-like"><img src="{{ asset('img/core-img/like.png') }}" alt=""> <span>{{ $news->likes }}</span></a>
                                                            <a href="#" class="post-comment"><img src="{{ asset('img/core-img/chat.png') }}" alt=""> <span>{{ \App\Models\Comments::where('news_id',$news->id)->count() }}</span></a>
                                                        </div>
                                                        <a href="{{  route('single.news',['slug' => $news->slug]) }}" class="post-comment float-right"> <span>view</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                </div>
                            @endforeach
                        @elseif(\App\Models\News::where('category',$news_category)->get() != null)
                            @foreach(\App\Models\News::where('category',$news_category)->get()  as $news)
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="single-blog-post featured-post">
                                            <div class="post-thumb">
                                                <a class="post-thumb-pic" href="#" ><img src="{{ $news->img_url }}" alt="" style="height: 50vh; width:75%; "></a>
                                            </div>
                                            <div class="post-data">
                                                <a href="#" class="post-catagory">{{ $news->category }}</a>
                                                <a href="#" class="post-title">
                                                    <h6>{{ $news->title }}</h6>
                                                </a>
                                                <div class="post-meta">
                                                    <p class="post-author"> <a href="#">{{ $news->created_at }}</a></p>
                                                    <p class="post-excerp">{{ $news->body }}</p>
                                                    <!-- Post Like & Post Comment -->
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex">
                                                            <a href="{{ route('news.update',['id' => $news->id]) }}" class="post-like"><img src="{{ asset('img/core-img/like.png') }}" alt=""> <span>{{ $news->likes }}</span></a>
                                                            <a href="#" class="post-comment"><img src="{{ asset('img/core-img/chat.png') }}" alt=""> <span>{{ \App\Models\Comments::where('news_id',$news->id)->count() }}</span></a>
                                                        </div>
                                                        <a href="{{  route('single.news',['slug' => $news->slug]) }}" class="post-comment float-right"> <span>view</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                </div>
                            @endforeach
                        @else
                            <p> News is NOt Found ! </p>
                        @endif
                        </div>
                    <div class="col-12 col-md-6 col-lg-4" style=" background: #dc35450a;">
                        <div class="section-heading">
                            <h6>Leatest News</h6>
                        </div>
                    @foreach(\App\Models\News::all()->sortByDesc('updated_at') as $news)
                        <!-- Single Featured Post -->
                            <div class="single-blog-post small-featured-post d-flex">
                                <div class="post-thumb">
                                    <a href="#"><img src="{{ $news->img_url }}" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">{{ $news->category }}</a>
                                    <div class="post-meta">
                                        <a href="#" class="post-title">
                                            <h6>{{ $news->title }}</h6>
                                        </a>
                                        <p class="post-date"><span>{{ $news->created_at->toDateString() }}</span> | <span>{{  $news->created_at->toTimeString() }}</span></p>
                                    </div>
                                    <a href="{{  route('single.news',['slug' => $news->slug]) }}" class="post-comment float-right"> <span>view</span></a>
                                </div>
                            </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Featured Post Area End ##### -->

        <!-- ##### Popular News Area Start ##### -->
        <div class="popular-news-area section-padding-80-50" >
            <div class=" " style="padding-left: 53px;">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="section-heading">
                            <h6>Popular News</h6>
                        </div>

                        <div class="row">

                            @php
                            $all_data = \App\Models\News::all()->sortByDesc('likes');
                            @endphp

                            @foreach($all_data as $data )
                            <!-- Single Post -->
                            <div class="col-12 col-md-4">
                                <div class="single-blog-post style-3">
                                    <div class="post-thumb">
                                        <a href="#"><img src="{{ $data->img_url }}" alt=""></a>
                                    </div>
                                    <div class="post-data">
                                        <a href="#" class="post-catagory">{{ $data->category }}</a>
                                        <a href="#" class="post-title">
                                            <h6>{{ $data->title }}</h6>
                                        </a>
                                        <div class="post-meta d-flex align-items-center">
                                            <a href="{{  route('news.update',['id' => $data->id])  }}" class="post-like"><img src="img/core-img/like.png" alt=""> <span>{{ $data->likes }}</span></a>
                                            <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                            <a href="{{  route('single.news',['slug' => $news->slug]) }}" class="post-comment float-right"> <span>view</span></a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- ##### Popular News Area End ##### -->
    </div>

</div>
<style>

    .link-category{ background: #ee002d;}
    .link-category a{ color: white; }
        .post-thumb-pic{
            height: 50vh;
            width: 82%;
        }


</style>
@endsection

