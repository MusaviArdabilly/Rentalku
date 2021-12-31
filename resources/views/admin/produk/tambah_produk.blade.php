@extends('layout.adminlayout')
@section('title', 'Tambah Data Produk')
@section('content')

<script type="text/javascript">
  document.getElementById('produk').classList.add('active');
</script>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Produk</h1>
                    <p class="mb-4">Produk dapat berupa bla bla bla.</p>

                    <!-- DataTales Example -->
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <div class="my-auto">
                                <h5 class="my-auto font-weight-bold text-primary">Tambah Produk</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <form class="user" method="POST" action="{{ url('/admin/produk/tambah/post') }}" enctype="multipart/form-data" autocomplete="off">
                                {{ csrf_field() }}
                                    <div class="d-flex justify-content-center my-3">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group row">
                                                <label for="input4" class="col-sm-3 col-form-label">Gambar</label>
                                                <div class="col-sm-9">
                                                    <input name="picture" type="file" class="" id="input4">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input2" class="col-sm-3 col-form-label">Mobil</label>
                                                <div class="col-sm-9">
                                                    <select name="id_vehicle" class="form-control" required="">
                                                        @foreach($vehicles as $vehicle)
                                                            <option value="{{ $vehicle->id }}">{{$vehicle->brand}} | {{$vehicle->license_plate}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input5" class="col-sm-3 col-form-label">Judul Produk</label>
                                                <div class="col-sm-9">
                                                    <input name="title" type="text" class="form-control" id="input5">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input7" class="col-sm-3 col-form-label">Deskripsi</label>
                                                <div class="col-sm-9">
                                                    <input name="description" type="text" class="form-control" id="input7">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input7" class="col-sm-3 col-form-label">Harga</label>
                                                <div class="col-sm-9">
                                                    <input name="price" type="number" class="form-control" id="input7">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center row mb-2">
                                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

@endsection