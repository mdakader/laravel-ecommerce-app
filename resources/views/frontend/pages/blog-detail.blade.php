@extends('frontend.layouts.master')

@section('title')
    {{$settings->site_name}} || About
@endsection

@section('content')
    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>blog details</h4>
                        <ul>
                            <li><a href="#">blog</a></li>
                            <li><a href="#">blog details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        BLOGS DETAILS START
    ==============================-->
    <section id="wsus__blog_details">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-8">
                    <div class="wsus__main_blog">
                        <div class="wsus__main_blog_img">
                            <img src="{{asset($blog->image)}}" alt="blog" class="img-fluid w-100">
                        </div>
                        <p class="wsus__main_blog_header">
                            <span><i class="fas fa-user-tie"></i> by {{$blog->user->name}}</span>
                            <span><i class="fal fa-calendar-alt"></i> {{date('M d Y', strtotime($blog->created_at))}}</span>
                        </p>
                        <div class="wsus__description_area">
                            <h1>{!!$blog->title!!}</h1>
                            {!!$blog->description!!}
                        </div>
                        <div class="wsus__share_blog">
                            <p>share:</p>
                            <ul>
                                <li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"><i class="fab fa-facebook-f"></i></a></li>

                                <li><a class="twitter" href="https://twitter.com/share?url={{url()->current()}}&text={{$blog->title}}"><i class="fab fa-twitter"></i></a></li>

                                <li><a class="linkedin" href="https://www.linkedin.com/shareArticle?url={{url()->current()}}&title={{$blog->title}}&summary={{limitText($blog->description, 50)}}"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        @if (count($recentBlogs) != 0)
                            <div class="wsus__related_post">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <h5>Recent posts</h5>
                                    </div>
                                </div>
                                <div class="row blog_det_slider">
                                    @foreach ($recentBlogs as $blogItem)
                                        <div class="col-xl-3">
                                            <div class="wsus__single_blog wsus__single_blog_2">
                                                <a class="wsus__blog_img" href="{{route('blog-details', $blogItem->slug)}}">
                                                    <img src="{{asset($blogItem->image)}}" alt="blog" class="img-fluid w-100">
                                                </a>
                                                <div class="wsus__blog_text">
                                                    <a class="blog_top red" href="#">{{$blogItem->category->name}}</a>
                                                    <div class="wsus__blog_text_center">
                                                        <a href="{{route('blog-details', $blogItem->slug)}}">{!!limitText($blogItem->title, 45)!!}</a>
                                                        <p class="date">{{date('M D Y', strtotime($blogItem->created_at))}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endif
                        <div class="wsus__blog_post">
                            <h4>Popular Post</h4>
                            <div class="wsus__blog_post_single">
                                <a href="#" class="wsus__blog_post_img">
                                    <img src="images/location_1.jpg" alt="blog" class="imgofluid w-100">
                                </a>
                                <div class="wsus__blog_post_text">
                                    <a href="#">One Thing Separates Creators</a>
                                    <p> <span>Jul 29 2021 </span> 2 Comment </p>
                                </div>
                            </div>
                            <div class="wsus__blog_post_single">
                                <a href="#" class="wsus__blog_post_img">
                                    <img src="images/location_2.jpg" alt="blog" class="imgofluid w-100">
                                </a>
                                <div class="wsus__blog_post_text">
                                    <a href="#">One Thing Separates Creators</a>
                                    <p> <span>Jul 29 2021 </span> 2 Comment </p>
                                </div>
                            </div>
                            <div class="wsus__blog_post_single">
                                <a href="#" class="wsus__blog_post_img">
                                    <img src="images/location_3.jpg" alt="blog" class="imgofluid w-100">
                                </a>
                                <div class="wsus__blog_post_text">
                                    <a href="#">One Thing Separates Creators</a>
                                    <p> <span>Jul 29 2021 </span> 2 Comment </p>
                                </div>
                            </div>
                            <div class="wsus__blog_post_single">
                                <a href="#" class="wsus__blog_post_img">
                                    <img src="images/location_4.jpg" alt="blog" class="imgofluid w-100">
                                </a>
                                <div class="wsus__blog_post_text">
                                    <a href="#">One Thing Separates Creators</a>
                                    <p> <span>Jul 29 2021 </span> 2 Comment </p>
                                </div>
                            </div>
                            <div class="wsus__blog_post_single">
                                <a href="#" class="wsus__blog_post_img">
                                    <img src="images/location_2.jpg" alt="blog" class="imgofluid w-100">
                                </a>
                                <div class="wsus__blog_post_text">
                                    <a href="#">One Thing Separates Creators</a>
                                    <p> <span>Jul 29 2021 </span> 2 Comment </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4">
                    <div class="wsus__blog_sidebar" id="sticky_sidebar">
                        <div class="wsus__blog_search">
                            <h4>search</h4>
                            <form action="{{route('blog')}}" method="GET">
                                <input type="text" placeholder="Search" name="search">
                                <button type="submit" class="common_btn"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="wsus__blog_category">
                            <h4>Categories</h4>
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="{{route('blog', ['category' => $category->slug])}}">{{$category->name}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="wsus__blog_post">
                            <h4>More Posts</h4>
                            @foreach ($moreBlogs as $blog)

                                <div class="wsus__blog_post_single">
                                    <a href="{{route('blog-details', $blog->slug)}}" class="wsus__blog_post_img">
                                        <img style="height: 71px;" src="{{asset($blog->image)}}" alt="blog" class="imgofluid w-100">
                                    </a>
                                    <div class="wsus__blog_post_text">
                                        <a href="{{route('blog-details', $blog->slug)}}">{{limitText($blog->title, 35)}}</a>
                                        <p> <span>{{date('M d Y', strtotime($blog->created_at))}} </span> 12 Comment </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BLOGS DETAILS END
    ==============================-->
@endsection
