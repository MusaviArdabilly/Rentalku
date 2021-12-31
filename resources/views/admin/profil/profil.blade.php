@extends('layout.adminlayout')
@section('title', 'Agen Rentalku')
@section('content')

<script type="text/javascript">
  document.getElementById('profil').classList.add('active');
</script>
                
        <div class="min-vh-100-70 position-relative p-3 p-md-5 m-md-3 bg-warnings overflow-hidden justify-content-center rounded">
                <!-- <div class="addons3"></div>
                <div class="addons5"></div> -->
                <div class="d-inline m">
                    <h2 class="text-center my-4 font-weight-bold text-dark">Profil Perusahaan</h2>
                    <div class="d-flex align-items-center justify-content-center my-auto">
                        <div class="col-md-4 ">
                            <div class="card">
                                <div class="card-body shadow">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{ asset("storageImages/profile/".$userdata->picture) }}" alt="Admin" class="profile-picture">
                                        <div class="my-3">
                                            <h4 class="font-weight-bold">{{ $corporation->name }}</h4>
                                            <p class="text-secondary mb-3 text-capitalize">{{ strtolower($corp_location->regency->name) }}</p>
                                            <a href="{{ url('/a/edit/'.auth()->user()->id) }}" class="btn btn-outline-secondary">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-body shadow">
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Nama Perusahaan</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{ $corporation->name }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Alamat</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary text-capitalize">
                                        {{ strtolower($corp_location->regency->name) }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Deskripsi</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{ $corporation->description }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Whatsapp</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        +62 {{ $corporation->whatsapp }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Status</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{ $corporation->status }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Bergabung Sejak</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{ $corporation->created_at->format('d-m-Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>


@endsection