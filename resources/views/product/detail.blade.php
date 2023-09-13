@extends('layout.customer')
@section('content')
    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="blog">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Shop Single</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop Single</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="owl-carousel owl-theme s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" style="object-fit: cover;"
                                src="{{ asset('storage/images/' . $product->image) }}" alt="" width="400"
                                height="400">>
                        </div>
                        <!-- <div class="single-prd-item">
                                                           <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                                                          </div>
                                                          <div class="single-prd-item">
                                                           <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                                                          </div> -->
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $product->name }}</h3>
                        <h2>Rp.{{ number_format($product->price, 0) }}</h2>
                        <ul class="list">
                            <li>
                                <span>Category</span> : {{ $product->name }}
                            </li>
                            <li>
                                <span>Stock</span> : {{ $product->stock }}
                            </li>
                        </ul>
                        <p>{{ $product->description }}</p>
                        <div class="product_count">
                            <label for="qty">Quantity:</label>
                            <input type="text" name="qty" id="sst" size="2" maxlength="12" value="1"
                                title="Quantity:" class="input-text qty">
                            <button
                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                class="reduced items-count" type="button"><i class="ti-angle-right"></i></button>
                            <a class="button primary-btn" href="{{ url('add-to-cart/'.$product->id) }}">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->
@endsection
