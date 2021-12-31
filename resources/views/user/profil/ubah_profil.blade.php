@extends('layout.userlayout')
@section('title', 'Rentalku')
@section('content')
                
        <div class="min-vh-100-80 position-relative p-3 p-md-5 m-md-3 bg-warning overflow-hidden row align-items-center">
            <div class="addons1"></div>
            <div class="addons2"></div>
            <div class="">
                {{-- <div class="d-flex justify-content-center "> --}}
                <div class="d-flex flex-column flex-sm-row  justify-content-between ">
                
                    <div class="col-sm-12 col-md-3 my-auto">
                        <div class="card shadow">
                            <div class="card-header">
                              <b>Avatar</b> 
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ url('/u/postedit/'.auth()->user()->username) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class=" d-flex flex-column align-items-center text-center mb-1">
                                        <img id="imgprev" src="{{ asset("storageImages/profile/$userdata->picture") }}" alt="Admin" class="profile-picture">
                                        {{-- <img id="imgprev" src="{{ asset("storage/app/public/images/profile/$userdata->picture") }}" alt="Admin" class="profile-picture"> --}}
                                        {{-- <img id="imgprev" src="{{ url('img/profile/'.$userdata->picture) }}" alt="Admin" class="profile-picture"> --}}
                                        <input type="file" id="uploadprofile" name="picture" onchange="loadFile(event)"/>
                                        <a href="" id="uploadprofile_link" aria-label="Change Profile Picture" class="p-2 h6 mt-2">Ganti Gambar</a>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button id="btn-submit-ava" type="submit" class="btn btn-secondary mt-2">Simpan</button>
                                </div>
                                </form>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-8 my-2">
                        <div class="card shadow">
                            <div class="card-header py-0 px-0 border-bottom-0">
                                <ul class="nav nav-tabs mt-0" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link ms-2 active" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button" role="tab" aria-controls="profil" aria-selected="true">Profil</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="alamat-tab" data-bs-toggle="tab" data-bs-target="#alamat" type="button" role="tab" aria-controls="alamat" aria-selected="false">Alamat</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">Password</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="profil-tab">
                                        <form method="POST" action="{{ url('/u/postedit/'.auth()->user()->username) }}">
                                        {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="fw-normal">Nama</label>
                                                <input type="text" class="ps-sm-1 form-control-plaintext" name="name" value="{{ $userdata->name }}" required>
                                                <hr class="my-1">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="fw-normal">Username</label>
                                                <input type="text" class="ps-sm-1 form-control-plaintext" name="username" value="{{ $userdata->username }}" required>
                                                <hr class="my-1">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="fw-normal">Email</label>
                                                <input type="text" class="ps-sm-1 form-control-plaintext" name="email" value="{{ $userdata->email }}" required>
                                                <hr class="my-1">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="fw-normal">No. Telp</label>
                                                <input type="text" class="ps-sm-1 form-control-plaintext" name="phone_number" value="{{ $userdata->phone_number }}" required>
                                                <hr class="my-1">
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="fw-normal">NIK</label>
                                                @if(isset($userdata->nik))
                                                <input type="text" class="ps-sm-1 form-control-plaintext bg-light" name="nik" value="{{ $userdata->nik }}" readonly>
                                                @else
                                                <input type="text" class="ps-sm-1 form-control-plaintext" name="nik" value="{{ $userdata->nik }}">
                                                @endif
                                                <hr class="my-1">
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-secondary mt-3">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="alamat" role="tabpanel" aria-labelledby="alamat-tab">
                                        <form method="POST" action="{{ url('/u/postedit/'.auth()->user()->username) }}">
                                        {{ csrf_field() }}
                                        {{ Form::open() }}
                                            <div class="form-group">
                                                <div class="card mb-3">
                                                    <div class="card-header">
                                                        Alamat
                                                    </div>
                                                    <div class="card-body text-capitalize">
                                                        @if(isset($location)) {{ strtolower($location->street) .' - '. strtolower($location->village->name) .' - '. strtolower($location->district->name) .' - '. strtolower($location->regency->name) .' - '. strtolower($location->province->name) }}@endif
                                                    </div>
                                                </div>
                                                {{-- <label class="fw-normal">Alamat : <br> @if(isset($location)) [{{ $location->street .' - '. $location->village->name .' - '. $location->district->name .' - '. $location->regency->name .' - '. $location->province->name }}]@endif</label>                 --}}
                                                <select class="form-control-plaintext mt-3" name="provinces" id="provinces">
                                                    <option value="0" disable="true" selected="true">Pilih Provinsi</option>
                                                    @foreach ($provinces as $key => $value)
                                                        <option value="{{$value->id}}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                                <hr class="my-1">
        
                                                <select class="form-control-plaintext mt-3" name="regencies" id="regencies">
                                                    <option value="0" disable="true" selected="true">Pilih Kota</option>
                                                </select>
                                                <hr class="my-1">
        
                                                <select class="form-control-plaintext mt-3" name="districts" id="districts">
                                                    <option value="0" disable="true" selected="true">Pilih Kecamatan</option>
                                                </select>
                                                <hr class="my-1">
        
                                                <select class="form-control-plaintext mt-3" name="villages" id="villages">
                                                    <option value="0" disable="true" selected="true">Pilih Desa</option>
                                                </select>
                                                <hr class="my-1">
                                                
                                                <input type="textarea" class="ps-sm-1 form-control-plaintext mt-3" name="street" value="@if(isset($location)) {{$location->street}} @endif" placeholder="Jl. Bunga Mawar">
                                                <hr class="my-1">
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-secondary mt-3">Simpan</button>
                                            </div>
                                            {{ Form::close() }}
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                        <form method="POST" action="{{ url('/u/postedit/'.auth()->user()->username) }}">
                                        {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="fw-normal">Password Lama</label>
                                                <input type="password" class="ps-sm-1 form-control-plaintext" name="old_password" required>
                                                <hr class="my-1">
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-sm-12 col-md-6 form-group">
                                                    <label class="fw-normal">Password Baru</label>
                                                    <input type="password" class="ps-sm-1 form-control-plaintext" name="password" required>
                                                    <hr class="my-1">
                                                </div>
                                                <div class="col-sm-12 col-md-6 form-group">
                                                    <label class="fw-normal">Ulangi Password Baru</label>
                                                    <input type="password" class="ps-sm-1 form-control-plaintext" name="password_confirmation" required>
                                                    <hr class="my-1">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-secondary mt-3">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-6 shadow">
                        <div class="card ">
                            <div class="card-body">
                                <form method="POST" action="{{ url('/u/postedit/'.auth()->user()->username) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="row">
                                        <div class=" d-flex flex-column align-items-center text-center mb-1">
                                            <img id="imgprev" src="{{ url('img/profile/'.$userdata->picture) }}" alt="Admin" class="profile-picture">
                                            <input type="file" id="uploadprofile" name="picture" onchange="loadFile(event)"/>
                                            <a href="" id="uploadprofile_link" aria-label="Change Profile Picture" class="p-2 h6">Change Image</a>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="form-group">
                                        <label class="fw-normal">Nama</label>
                                        <input type="text" class="ps-sm-1 form-control-plaintext" name="name" value="{{ $userdata->name }}">
                                        <hr class="my-1">
                                    </div>
                                    <div class="form-group">
                                        <label class="fw-normal">Username</label>
                                        <input type="text" class="ps-sm-1 form-control-plaintext" name="username" value="{{ $userdata->username }}">
                                        <hr class="my-1">
                                    </div>
                                    <div class="form-group">
                                        <label class="fw-normal">Email</label>
                                        <input type="text" class="ps-sm-1 form-control-plaintext" name="email" value="{{ $userdata->email }}">
                                        <hr class="my-1">
                                    </div>
                                    <div class="form-group">
                                        <label class="fw-normal">No. Telp</label>
                                        <input type="text" class="ps-sm-1 form-control-plaintext" name="phone_number" value="{{ $userdata->phone_number }}">
                                        <hr class="my-1">
                                    </div>
                                    <div class="form-group">
                                        <label class="fw-normal">NIK</label>
                                        @if(isset($userdata->nik))
                                        <input type="text" class="ps-sm-1 form-control-plaintext" name="nik" value="{{ $userdata->nik }}" disabled>
                                        @else
                                        <input type="text" class="ps-sm-1 form-control-plaintext" name="nik" value="{{ $userdata->nik }}">
                                        @endif
                                        <hr class="my-1">
                                    </div>

                                    {{ Form::open() }}
                                    <div class="form-group">
                                        <label class="fw-normal">Alamat : @if(isset($location)) [{{ $location->street .' - '. $location->village->name .' - '. $location->district->name .' - '. $location->regency->name .' - '. $location->province->name }}]@endif</label>
                                        <select class="form-control-plaintext" name="provinces" id="provinces">
                                            <option value="0" disable="true" selected="true">Pilih Provinsi</option>
                                            @foreach ($provinces as $key => $value)
                                                <option value="{{$value->id}}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        <hr class="my-1">

                                        <select class="form-control-plaintext" name="regencies" id="regencies">
                                            <option value="0" disable="true" selected="true">Pilih Kota</option>
                                        </select>
                                        <hr class="my-1">

                                        <select class="form-control-plaintext" name="districts" id="districts">
                                            <option value="0" disable="true" selected="true">Pilih Kecamatan</option>
                                        </select>
                                        <hr class="my-1">

                                        <select class="form-control-plaintext" name="villages" id="villages">
                                            <option value="0" disable="true" selected="true">Pilih Desa</option>
                                        </select>
                                        <hr class="my-1">
                                        
                                        <input type="textarea" class="ps-sm-1 form-control-plaintext" name="street" value="@if(isset($location)) {{$location->street}} @endif" placeholder="Jl. Bunga Mawar">
                                        <hr class="my-1">
                                    </div>
                                    {{ Form::close() }}

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-secondary mt-4">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div> --}}
            </div>
        </div>


@endsection