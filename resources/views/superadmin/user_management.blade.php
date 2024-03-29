@extends('layout.adminlayout')
@section('title', 'Rentalku - Admin')
@section('content')

<script type="text/javascript">
  document.getElementById('manage_user').classList.add('active');
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
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>Whatsapp</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="50px" class="text-center">#</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>Whatsapp</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="">
                                        @forelse($userdata as $key => $user)
                                        <tr>
                                            <td class="text-center">{{ $userdata->firstItem()+$key }}</td>
                                            <td><img src="{{ asset("storageImages/profile/".$user->picture) }}" width="60px"/></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone_number }}</td>
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
                            {{ $userdata->links() }}

                </div>

@endsection