@extends('layout.adminlayout')
@section('title', 'Mobil')
@section('content')

<script type="text/javascript">
  document.getElementById('mobil').classList.add('active');
</script>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Kendaraan</h1>
                    <p class="mb-4">Digunakan untuk menyimpan Master Data kendaraan pada setiap agen sehingga lebih mudah untuk mengelola data transaksi, pajak, perawatan dan iklan.</p> <!--<div class="my-5"></div>-->
                    
                    <div>
                        <a href="/admin/mobil/tambah" type="button" class="btn btn-primary mb-4">Tambah kendaraan</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <div class="my-auto">
                                <h5 class="font-weight-bold text-primary">Data Kendaraan</h5>
                            </div>
                            
                            <form method='GET' action="{{ url('/admin/mobil') }}">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control bg-white border-0 small" placeholder="Cari..."
                                        aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- <div class="d-flex flex-row">
                                <label class="my-auto mr-3 font-weight-bold">Urutkan</label>
                                <div class="dropdown">
                                    <select name="urutkan" class="btn btn-primary dropdown-toggle" aria-label="Default select example">
                                        <option value="license_plate">Plat Nomor</option>
                                        <option selected value="brand" selected=selected>Merk</option>
                                        <option value="type">Tipe</option>
                                        <option value="color">Warna</option>
                                        <option value="transamision">Transmisi</option>
                                        <option value="chair_amount">Jml Kursi</option>
                                        <option value="fuel_type">Bahan Bakar</option>
                                        <option value="price">Harga</option>
                                        <option value="tax_payment_date">Bayar Pajak</option>
                                        <option value="license_plate_type">Plat Nomor</option>
                                        <option class="rounded-bottom" value="license_plate_expiration_date">Plat Nomor Kadaluarsa</option>
                                    </select>
                                </div>
                            </div> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="50px" class="text-center">#</th>
                                            <th>Plat Nomor</th>
                                            <th>Merk</th>
                                            <th>Tipe</th>
                                            <th>Warna</th>
                                            <th>Transamisi</th>
                                            <th>Jml Kursi</th>
                                            <th>Bahan Bakar</th>
                                            <th>Harga</th>
                                            <th>Bayar Pajak</th>
                                            <th>Plat Nomor</th>
                                            <th>Plat Nomor Kadaluarsa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="50px" class="text-center">#</th>
                                            <th>Plat Nomor</th>
                                            <th>Merk</th>
                                            <th>Tipe</th>
                                            <th>Warna</th>
                                            <th>Transamisi</th>
                                            <th>Jml Kursi</th>
                                            <th>Bahan Bakar</th>
                                            <th>Harga</th>
                                            <th>Bayar Pajak</th>
                                            <th>Plat Nomor</th>
                                            <th>Plat Nomor Kadaluarsa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="">
                                        @forelse($vehicles as $key => $vehicle)
                                        <tr>
                                            <td class="text-center">{{ $vehicles->firstItem()+$key }}</td>
                                            <td>{{ $vehicle->license_plate }}</td>
                                            <td>{{ $vehicle->brand }}</td>
                                            <td>{{ $vehicle->type }}</td>
                                            <td>{{ $vehicle->color }}</td>
                                            <td>{{ $vehicle->transmision }}</td>
                                            <td>{{ $vehicle->chair_amount }}</td>
                                            <td>{{ $vehicle->fuel_type }}</td>
                                            <td>@currency($vehicle->price)</td>
                                            <td>{{ $vehicle->tax_payment_date }}</td>
                                            <td>{{ $vehicle->license_plate_type }}</td>
                                            <td>{{ $vehicle->license_plate_expiration_date }}</td>
                                            <td><a href="{{ url('admin/mobil/ubah/'.$vehicle->id) }}">Ubah</a> | <a href="{{ url('admin/mobil/hapus/'.$vehicle->id) }}" onclick="return confirm('Anda ingin menghapus data Mobil dengan plat nomor {{ $vehicle->license_plate}}?')">Hapus</a></td>
                                        </tr>
                                        @empty
                                        <tr>
                                        <td colspan="13" class="text-center">Data Tidak Ditemukan</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                            {{ $vehicles->links() }}

                </div>

@endsection