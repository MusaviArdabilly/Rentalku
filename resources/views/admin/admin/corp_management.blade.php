@extends('layout.adminlayout')
@section('title', 'Rentalku - Admin')
@section('content')

<script type="text/javascript">
  document.getElementById('admin').classList.add('active');
</script>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Agen Rental</h1>
                    <p class="mb-4">Agen Rental dapat berupa bla bla bla.</p>
                    
                    <!-- <div>
                        <a href="/admin/produk/tambah" type="button" class="btn btn-primary mb-4">Tambah Produk</a>
                    </div> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <div class="my-auto">
                                <h5 class="font-weight-bold text-primary">Data Agen Rental</h5>
                            </div>
                            
                            <form method='GET' action="{{ url('/admin/produk') }}">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control bg-white border-0 small" placeholder="Search for..."
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
                                            <th>Nama Perusahaan</th>
                                            <th>Whatsapp</th>
                                            <th>Verifikasi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="50px" class="text-center">#</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Whatsapp</th>
                                            <th>Verifikasi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="">
                                        @forelse($listcorp as $key => $corp)
                                        <tr>
                                            <td class="text-center">{{ $listcorp->firstItem()+$key }}</td>
                                            <td>{{ $corp->name }}</td>
                                            <td>{{ $corp->whatsapp }}</td>
                                            <td>{{ $corp->verify }}</td>
                                            <td>{{ $corp->status }}</td>
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
                            {{ $listcorp->links() }}

                </div>

@endsection