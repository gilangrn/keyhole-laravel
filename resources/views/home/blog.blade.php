@extends('layout.customer')
@section('content')
    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="blog">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Our Blog</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->

    <!--================Blog Area =================-->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">

                        @php
                            $no = 1;
                        @endphp
                        @foreach ($news as $item)
                            <article class="row blog_item">
                                <div class="col-md-3">
                                    <div class="blog_info text-right">
                                        <div class="post_tag">
                                            {{ $item->category }}
                                        </div>
                                        <ul class="blog_meta list">
                                            <li>
                                                <a href="#">{{ $item->author }}
                                                    <i class="lnr lnr-user"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">{{ date('d M Y', strtotime($item->created_at)) }}
                                                    <i class="lnr lnr-calendar-full"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">1.2M Views
                                                    <i class="lnr lnr-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">06 Comments
                                                    <i class="lnr lnr-bubble"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="blog_post">
                                        <img src="img/blog/main-blog/m-blog-1.jpg" alt="">
                                        <div class="blog_details">
                                            <a href="{{ route('blog.detail', $item->id) }}">
                                                <h2>{{ $item->title }}</h2>
                                            </a>
                                            <p>{{ $item->short_description }}</p>
                                            <a class="button button-blog" href="{{ route('blog.detail', $item->id) }}">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Posts">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="lnr lnr-magnifier"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                            <h4>Charlie Barber</h4>
                            <p>Senior blog writer</p>
                            <div class="social_icon">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-behance"></i>
                                </a>
                            </div>
                            <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you
                                should
                                have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits
                                detractors.
                            </p>
                            <div class="br"></div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <!--================Instagram Area =================-->
    <section class="instagram_area">
        <div class="container box_1620">
            <div class="insta_btn">
                <a class="btn theme_btn" href="#">Follow us on instagram</a>
            </div>
            <div class="instagram_image row m0">
                <a href="#"><img src="img/instagram/ins-1.jpg" alt=""></a>
                <a href="#"><img src="img/instagram/ins-2.jpg" alt=""></a>
                <a href="#"><img src="img/instagram/ins-3.jpg" alt=""></a>
                <a href="#"><img src="img/instagram/ins-4.jpg" alt=""></a>
                <a href="#"><img src="img/instagram/ins-5.jpg" alt=""></a>
                <a href="#"><img src="img/instagram/ins-6.jpg" alt=""></a>
            </div>
        </div>
    </section>
    <!--================End Instagram Area =================-->
@endsection
