@extends('layout.customer')
@section('content')
    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Shopping Cart</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>

                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    <?php $total += $details['amount'] * $details['qty']; ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="img/cart/cart1.png" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <p>{{ $details['name'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>Rp.{{ number_format($details['amount'], 0) }}</h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <input type="text" name="qty" id="sst" maxlength="12" value="1"
                                                    title="Quantity:" class="input-text qty">
                                                <button
                                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                                    class="increase items-count" type="button"><i
                                                        class="lnr lnr-chevron-up"></i></button>
                                                <button
                                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                                    class="reduced items-count" type="button"><i
                                                        class="lnr lnr-chevron-down"></i></button>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>Rp.{{ number_format($details['amount'] * $details['qty'], 0) }}</h5>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            <tr class="bottom_button">
                                <td>
                                    <a class="button" href="#">Update Cart</a>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input type="text" placeholder="Coupon Code">
                                        <a class="primary-btn" href="#">Apply</a>
                                        <a class="button" href="#">Have a Coupon?</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>Rp.{{ number_format($total, 0) }}</h5>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td class="d-none-l">

                                </td>
                                <td class="">

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="#">Continue Shopping</a>
                                        <a class="primary-btn ml-2" href="#">Proceed to checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection
