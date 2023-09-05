@extends('layout.admin')
@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Setting</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Product</a></li>
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
                                <h4 class="card-title">Product</h4>
                                <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#modalCreate">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama</th>
                                            <th>Description</th>
                                            <th>Kategory</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($product as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <img style="object-fit: cover;"
                                                        src="{{ asset('storage/images/' . $item->image) }}" alt="Image"
                                                        width="200" height="200">
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->category_id }}</td>
                                                <td>{{ number_format($item->stock, 0) }}</td>
                                                <td>Rp.{{ number_format($item->price, 0) }}</td>
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

    <div class="modal fade bd-example-modal-lg" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Product</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('product.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" class="form-control" name="description" placeholder="Deskripsi" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori Id</label>
                            <input type="text" class="form-control" name="category_id" placeholder="Kategori Id"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" class="form-control" name="stock" placeholder="Stok" required>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" name="price" placeholder="Harga" required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($product as $data)
        <div class="modal fade bd-example-modal-lg" id="modalEdit{{ $data->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('product.update', $data->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" value="{{ $data->name }}" class="form-control" name="name"
                                    placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" value="{{ $data->description }}" class="form-control"
                                    name="description" placeholder="Deskripsi" required>
                            </div>
                            <div class="form-group">
                                <label>Kategori Id</label>
                                <input type="text" value="{{ $data->category_id }}" class="form-control"
                                    name="category_id" placeholder="Kategori Id" required>
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" value="{{ $data->stock }}" class="form-control" name="stock"
                                    placeholder="Stok" required>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" value="{{ $data->price }}" class="form-control" name="price"
                                    placeholder="Harga" required>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <div class="form-group">
                                    <img style="object-fit: cover;" src="{{ asset('storage/images/' . $data->image) }}"
                                        alt="Gambar" width="200" height="200">
                                </div>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($product as $data)
        <div class="modal fade bd-example-modal-lg" id="modalHapus{{ $data->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Product</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="GET" action="{{ route('product.delete', $data->id) }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <h5>Apakah anda ingin menghapus data ini?</h5>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
