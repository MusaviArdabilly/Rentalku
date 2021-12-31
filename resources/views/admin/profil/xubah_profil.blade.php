@extends('layout.adminlayout')
@section('title', 'Rentalku - Edit Profil Perusahaan')
@section('content')
                
        <div class="min-vh-100-80 position-relative p-3 p-md-5 m-md-3 bg-warnings overflow-hidden row align-items-center">
                <!-- <div class="addons1"></div>
                <div class="addons2"></div> -->
                <div class="">
                    <div class="d-flex justify-content-center ">
                    
                    <div class="col-md-4 shadow">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ url('/a/postedit/'.auth()->user()->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="row">
                                        
                                        <div class=" d-flex flex-column align-items-center text-center mb-1">
                                            <img id="imgprev" src="{{ url('img/profile/'.$userdata->picture) }}" alt="Admin" class="profile-picture">
                                            <input type="file" id="uploadprofile" name="picture" onchange="loadFile(event)"/>
                                            <a href="" id="uploadprofile_link" aria-label="Change Profile Picture" class="p-2 h6">Change Image</a>
                                        </div>
                                        <hr> 

                                        <div class="col-sm-3 pt-2">
                                            <h6 class="mb-0">Nama Rental</h6>
                                        </div>
                                        <div class=" col-sm-9 text-secondary">
                                            <input type="text" class="form-control-plaintext" name="name" value="{{ $corporation->name }}">
                                            <hr class="my-1">
                                        </div>
                                    </div>
                                    <div class="row h-50">
                                        <div class="col-sm-3 pt-2">
                                        <h6 class="mb-0">Alamat Rental</h6>
                                        </div>
                                        <div class=" col-sm-9 text-secondary">
                                            <input type="text" class="form-control-plaintext" name="address" value="{{ $corporation->address }}">
                                            <hr class="my-1">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                        <h6 class="mb-0">Deskripsi</h6>
                                        </div>
                                        <div class=" col-sm-9 text-secondary">
                                            <input type="text" class="form-control-plaintext" name="description" value="{{ $corporation->description }}">
                                            <hr class="my-1">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                        <h6 class="mb-0">Whatsapp</h6>
                                        </div>
                                        <div class=" col-sm-9 text-secondary">
                                            <input type="text" class="form-control-plaintext" name="whatsapp" value="{{ $corporation->whatsapp }}">
                                            <hr class="my-1">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                        <h6 class="mb-0">Status</h6>
                                        </div>
                                        <div class=" col-sm-9 text-secondary">
                                            <select name="status" class="form-control-plaintext" required="">
                                                    <option value="Buka">Buka</option>
                                                    <option value="Tutup">Tutup</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr class="mb-0 w-75 mx-auto">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-secondary mt-4">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom image preview -->
        <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
            var output = document.getElementById('imgprev');
            output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
        </script>


@endsection