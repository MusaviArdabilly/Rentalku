@extends('layout.adminlayout')
@section('title', 'Rentalku - Edit Profil Perusahaan')
@section('content')

<script type="text/javascript">
    document.getElementById('profil').classList.add('active');
  </script>
                  
          <div class="min-vh-100-70 position-relative bg-warnings overflow-hidden justify-content-center rounded">
                  <!-- <div class="addons3"></div>
                  <div class="addons5"></div> -->
                  <div class="d-inline">
                      <h2 class="text-center my-4 font-weight-bold text-dark">Profil Perusahaan</h2>
                      <div class="d-flex align-items-center justify-content-center my-auto">
                          <div class="col-md-7">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" action="{{ url('/a/postedit/'.auth()->user()->id) }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class=" d-flex flex-column align-items-center text-center mb-1">
                                                        <img id="imgprev" src="{{ url('img/profile/'.$userdata->picture) }}" alt="Admin" class="profile-picture">
                                                        <input type="file" id="uploadprofile" name="picture" onchange="loadFile(event)"/>
                                                        <a href="" id="uploadprofile_link" aria-label="Change Profile Picture" class="p-2 h6 font-weight-bold">Change Image</a>
                                                    </div>
                                                    <hr> 
                                                </div>
                                                <div class="col-sm-3 pt-2">
                                                    <h6 class="mb-0">Nama Perusahaan</h6>
                                                </div>
                                                <div class=" col-sm-9 text-secondary">
                                                    <input type="text" class="form-control-plaintext" name="name" value="{{ $corporation->name }}">
                                                    <hr class="my-1">
                                                </div>
                                            </div>
                                            <div class="row h-50">
                                                <div class="col-sm-3 pt-2">
                                                    <h6 class="mb-0">Alamat</h6>
                                                </div>
                                                <div class=" col-sm-9 text-secondary">
                                                    <input type="text" class="form-control-plaintext text-capitalize" name="address" value="{{ strtolower($location->regency->name) }}" disabled>
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
                                                <div class="col">
                                                    <div class=" col-sm-9 text-secondary form-row">
                                                        <input type="text" class="form-control-plaintext col-2" value="+62" disabled>
                                                        <input type="text" class="form-control-plaintext col-10" name="whatsapp" value="{{ $corporation->whatsapp }}" required>
                                                    </div>
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

                                            <!-- {{ Form::open() }} -->
                                            <!-- <div class="form-group"> -->
                                                <!-- <label class="fw-normal">Alamat : [{{ $location->street .' - '. $location->village->name .' - '. $location->district->name .' - '. $location->regency->name .' - '. $location->province->name }}]</label> -->
                                                <!-- <select class="form-control-plaintext" name="provinces" id="provinces"> -->
                                                    <!-- <option value="0" disable="true" selected="true">Pilih Provinsi</option> -->
                                                    <!-- @foreach ($provinces as $key => $value) -->
                                                        <!-- <option value="{{$value->id}}">{{ $value->name }}</option> -->
                                                    <!-- @endforeach -->
                                                <!-- </select> -->
                                                <!-- <hr class="my-1"> -->
                                            <!--  -->
                                                <!-- <select class="form-control-plaintext" name="regencies" id="regencies"> -->
                                                    <!-- <option value="0" disable="true" selected="true">Pilih Kota</option> -->
                                                <!-- </select> -->
                                                <!-- <hr class="my-1"> -->
                                            <!--  -->
                                                <!-- <select class="form-control-plaintext" name="districts" id="districts"> -->
                                                    <!-- <option value="0" disable="true" selected="true">Pilih Kecamatan</option> -->
                                                <!-- </select> -->
                                                <!-- <hr class="my-1"> -->
                                            <!--  -->
                                                <!-- <select class="form-control-plaintext" name="villages" id="villages"> -->
                                                    <!-- <option value="0" disable="true" selected="true">Pilih Desa</option> -->
                                                <!-- </select> -->
                                                <!-- <hr class="my-1"> -->
                                                <!--  -->
                                                <!-- <input type="textarea" class="ps-sm-1 form-control-plaintext" name="street" value="{{$location->street}}" placeholder="Jl. Bunga Mawar"> -->
                                                <!-- <hr class="my-1"> -->
                                            <!-- </div> -->
                                            <!-- {{ Form::close() }} -->
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
  

                <div class="row">
                    <div class="col-md-4 shadow">
                        
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