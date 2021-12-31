@extends('layout.adminlayout')
@section('title', 'Pajak')
@section('content')

<script type="text/javascript">
  document.getElementById('pajak').classList.add('active');
</script>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pajak</h1>
                    <p class="mb-4">Dapat digunakan untuk mencatat pajak pada setiap kendaraan rental.</p>
                    
                    <div>
                        <a href="/admin/pajak/tambah" type="button" class="btn btn-primary mb-4">Tambah Pajak</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="my-auto font-weight-bold text-primary">Data Pajak</h6>
                            
                            <form method='GET' action="{{ url('/admin/pajak') }}">
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
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="50px" class="text-center">#</th>
                                            <th>Mobil</th>
                                            <th>Plat Nomor</th>
                                            <th>Tangal Pembayaran</th>
                                            <th>Pengeluaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="50px" class="text-center">#</th>
                                            <th>Mobil</th>
                                            <th>Plat Nomor</th>
                                            <th>Tangal Pembayaran</th>
                                            <th>Pengeluaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="">
                                        @forelse($taxs as $key => $tax)
                                        <tr>
                                            <td class="align-middle text-center">{{ $taxs->firstItem()+$key }}</td>
                                            <td class="align-middle">{{ $tax->vehicle->brand }} . {{ $tax->vehicle->type }}</td>
                                            <td class="align-middle">{{ $tax->vehicle->license_plate }}</td>
                                            <td class="align-middle">{{ $tax->payment_date }}</td>
                                            <td class="align-middle">@currency($tax->cost)</td>
                                            <td><a href="{{ url('admin/pajak/ubah/'.$tax->id) }}">Ubah</a> | <a href="{{ url('admin/pajak/hapus/'.$tax->id) }}" onclick="return confirm('Anda ingin menghapus data Pajak Mobil dengan plat nomor {{ $tax->vehicle->license_plate }} ?')">Hapus</a></td>
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

                </div>
                <!-- /.container-fluid -->

@endsection