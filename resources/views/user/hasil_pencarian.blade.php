@extends('layout.userlayout')
@section('title', 'Rentalku')
@section('content')
                

            <div class="overflow-hidden p-3 p-md-3 m-md-3 bg-warning text-center rounded position-relative">
                <h1 class="display-4 fw-bold">Rentalku</h1>
                <div class="addons1"></div>
                <div class="addons2"></div>
            </div>

            <div class=" position-relative p-3 p-md-5 m-md-3">
                <form method='GET' action="{{ url('/search') }}" autocomplete="off">
                    <div class="row p-4 p-md-5 mx-auto rounded bg-light shadow z-index-1">
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <label class="text-secondary">
                                Lokasi
                            </label>
                            <div class="col-sm-12">
                                <select name="search" class="form-select text-capitalize" required="">
                                    @foreach($locations as $location)
                                            <option value="{{ strtolower($location->regency->name) }}">{{ strtolower(str_replace('KABUPATEN','KAB.',$location->regency->name)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-2">
                            <label class="text-secondary">
                                Tanggal Mulai
                            </label>
                            <div class="col-sm-12">
                                <input name="" type="text" class="form-control datepicker" id="input4" value="{{ $start_date }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-2">
                            <label class="text-secondary">
                                Waktu Mulai
                            </label>
                            <div class="col-sm-12">
                                <input name="" type="text" class="form-control timepicker" id="input4" value="{{ $start_time }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-2">
                            <label class="text-secondary">
                                Tanggal Selesai
                            </label>
                            <div class="col-sm-12">
                                <input name="" type="text" class="form-control datepicker" id="input4" value="{{ $finish_date }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-2">
                            <label class="text-secondary">
                                Waktu Selesai
                            </label>
                            <div class="col-sm-12">
                                <input name="" type="text" class="form-control timepicker" id="input4" value="{{ $finish_time }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-1">
                            <label class="text-secondary">
                                &nbsp;
                            </label>
                            <div class="col-sm-12">
                                <a href="/hasil-pencarian">
                                    <button type="submit" class="btn btn-warning" onclick="myFunction()">Cari</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="position-relative p-3 p-md-5 m-md-3">
                @if (count($products) > 0)
                <div class="mx-auto rounded my-4">                
                    <div class="row d-flex justify-content-between">
                            @foreach($products as $product)
                        <div class="col-6 col-md-6 col-lg-4">
                            <div class="col-12 shadow-sm rounded bg-light mb-2">
                                <img class="card-img-top" src="{{ asset("storageImages/product/".$product->picture) }}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-title">{{ $product->title }}</p>
                                    <h5 class="fw-bold font-monospace">@currency($product->price)</h5>
                                    <p class="card-text text-secondary">{{ $product->vehicle->transmision }} | {{ $product->vehicle->fuel_type }} | Plat {{ $product->vehicle->license_plate_type }} </p>
                                    <div class="d-flex justify-content-end">
                                        <a href="https://wa.me/+62{{ $product->corporation->whatsapp }}" class="btn btn-success" target="_blank"><i class="fa fa-whatsapp">&nbsp;</i>Hubungi Agen</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
                @else
            </div>

            <div class="row col-md-9 align-items-center mx-auto rounded mt-4 text-center min-vh-100-422 ">  
                <h4 class="">Lokasi yang anda cari belum ada agen rental yang mendaftar </h4>
            </div>

            @endif
            

@endsection