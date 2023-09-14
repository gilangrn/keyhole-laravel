@extends('layout.customer')
@section('content')
    <main class="site-main">

        <!--================ Hero banner start =================-->
        <section class="hero-banner">
            <div class="container">
                <div class="row no-gutters align-items-center pt-60px">
                    <div class="col-5 d-none d-sm-block">
                        <div class="hero-banner__img">
                            <img class="img-fluid" src="/customer-assets/img/home/hero-banner.png" alt="">
                        </div>
                    </div>
                    <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                        <div class="hero-banner__content">
                            <h4>Shop is fun</h4>
                            <h1>Browse Our Premium Product</h1>
                            <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth
                                without morning over third. Their male dry. They are great appear whose land fly grass.
                            </p>
                            <a class="button button-hero" href="#browse">Browse Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Hero banner start =================-->


        <!-- ================ trending product section start ================= -->
        <section class="section-margin calc-60px" id="browse">
            <div class="container">
                <div class="section-intro pb-60px">
                    <p>Popular Item in the market</p>
                    <h2>All <span class="section-intro__style">Product</span></h2>
                </div>
                <div class="row">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($product as $item)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    <a href="{{ route('product.detail', $item->id) }}"><img class="card-img"
                                            style="object-fit: cover;" src="{{ asset('storage/images/' . $item->image) }}"
                                            alt="Image" width="200" height="200"></a>
                                </div>
                                <div class="card-body">
                                    <p>{{ $item->category }}</p>
                                    <h4 class="card-product__title"><a
                                            href="{{ route('product.detail', $item->id) }}">{{ $item->name }}</a>
                                    </h4>
                                    <p class="card-product__price">Rp.{{ number_format($item->price, 0) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ================ trending product section end ================= -->


        <!-- ================ offer section start ================= -->
        <section class="offer" id="parallax-1" data-anchor-target="#parallax-1"
            data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="offer__content text-center">
                            <h3>Up To 50% Off</h3>
                            <h4>Winter Sale</h4>
                            <p>Him she'd let them sixth saw light</p>
                            <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ offer section end ================= -->

        <!-- ================ Blog section start ================= -->
        <section class="blog section-margin calc-60px">
            <div class="container">
                <div class="section-intro pb-60px">
                    <p>Popular Item in the market</p>
                    <h2>Latest <span class="section-intro__style">News</span></h2>
                </div>

                <div class="row">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($news as $itemNews)
                        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                            <div class="card card-blog">
                                <div class="card-blog__img">
                                    <img class="card-img rounded-0" src="{{ asset('storage/images/' . $itemNews->image) }}"
                                        alt="">
                                </div>
                                <div class="card-body">
                                    <ul class="card-blog__info">
                                        <li><a href="{{ route('blog.detail', $itemNews->id) }}">By {{ $itemNews->author }}</a></li>
                                        <li><a href="{{ route('blog.detail', $itemNews->id) }}"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                                    </ul>
                                    <h4 class="card-blog__title"><a href="{{ route('blog.detail', $itemNews->id) }}">{{ $itemNews->title }}</a></h4>
                                    <p>{{ $itemNews->short_description }}</p>
                                    <a class="card-blog__link" href="{{ route('blog.detail', $itemNews->id) }}">Read More <i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
        <!-- ================ Blog section end ================= -->

        <!-- ================ Subscribe section start ================= -->
        <section class="subscribe-position">
            <div class="container">
                <div class="subscribe text-center">
                    <h3 class="subscribe__title">Get Update From Anywhere</h3>
                    <p>Bearing Void gathering light light his eavening unto dont afraid</p>
                    <div id="mc_embed_signup">
                        <form target="_blank"
                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                            method="get" class="subscribe-form form-inline mt-5 pt-1">
                            <div class="form-group ml-sm-auto">
                                <input class="form-control mb-1" type="email" name="EMAIL"
                                    placeholder="Enter your email" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Your Email Address '">
                                <div class="info"></div>
                            </div>
                            <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                    type="text">
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </section>
        <!-- ================ Subscribe section end ================= -->
    </main>
@endsection
