@extends('layout.adminlayout')
@section('title', 'Ubah Data Pajak')
@section('content')

<script type="text/javascript">
  document.getElementById('pajak').classList.add('active');
</script>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pajak</h1>
                    <p class="mb-4">Pajak dapat berupa bla bla bla.</p>

                    <!-- DataTales Example -->
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <div class="my-auto">
                                <h5 class="my-0 font-weight-bold text-primary">Ubah Pajak</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <form class="user" method="POST" action="{{ url('/admin/perawatan/ubah/post/'.$maintenance->id) }}" autocomplete="off">
                                {{ csrf_field() }}
                                    <div class="d-flex justify-content-center my-3">
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="form-group row">
                                                <label for="input2" class="col-sm-3 col-form-label">Mobil</label>
                                                <div class="col-sm-9">
                                                    <select name="id_vehicle" class="form-control" required="">
                                                        @foreach($vehicles as $vehicle)
                                                            <option value="{{ $vehicle->id }}" @if($vehicle->id == $maintenance->vehicle->id) selected='selected' @endif>{{$vehicle->id}} . {{$vehicle->brand}} | {{$vehicle->license_plate}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input4" class="col-sm-3 col-form-label">Perawatan</label>
                                                <div class="col-sm-9">
                                                    <input name="maintenance" type="text" class="form-control picker" id="input4" value="{{ $maintenance->maintenance }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input4" class="col-sm-3 col-form-label">Tanggal Perawatan</label>
                                                <div class="col-sm-9">
                                                    <input name="maintenance_date" type="text" class="form-control picker" id="input4" value="{{ $maintenance->maintenance_date }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input7" class="col-sm-3 col-form-label">Pengeluaran</label>
                                                <div class="col-sm-9">
                                                    <input name="cost" type="text" class="form-control" id="input7" value="{{ $maintenance->cost }}">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center row mb-2">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

@endsection