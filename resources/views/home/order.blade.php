@extends('layout.customer')
@section('content')
    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Order</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order</li>
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
                                <th scope="col">Order Id</th>
                                <th scope="col">Tanggal Order</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Kurir</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($order as $item)
                                <tr>
                                    <td>
                                        <h5>{{ $item->order_id }}</h5>
                                    </td>
                                    <td>
                                        <h5>{{ date('d M Y', strtotime($item->order_date)) }}</h5>
                                    </td>
                                    <td>
                                        <h5>{{ $item->payment_method_id }}</h5>
                                    </td>
                                    <td>
                                        <h5>{{ $item->delivery_type_id }}</h5>
                                    </td>
                                    <td>
                                        <h5>{{ $item->status }}</h5>
                                    </td>
                                    <td>
                                        <h5>Rp.{{ number_format( $item->total_amount, 0) }}</h5>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection
