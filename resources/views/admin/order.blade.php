@extends('layout.admin')
@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Setting</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Order</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Order</h4>
                            </div>

                            <br/>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success')}}
                                </div>
                            @endif
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Order</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Delivery</th>
                                            <th>Status</th>
                                            <th>Total Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($order as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->order_date }}</td>
                                                <td>{{ $item->payment_method_id }}</td>
                                                <td>{{ $item->delivery_type_id }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $item->total_amount }}</td>
                                                <td>
                                                    <span>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#modalEdit{{ $item->id }}" data-placement="top"
                                                            title="Edit">
                                                            <i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </a>
                                                        &nbsp;
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#modalHapus{{ $item->id }}"
                                                            data-placement="top" title="Delete">
                                                            <i class="fa fa-trash color-danger"></i>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
