@extends('layout.authlayout')
@section('title', 'Rentalku - Register')
@section('content')

        <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Rentalku!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ url('/postregister') }}">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <input name="username" type="text" class="form-control form-control-user" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input id="password" name="password" type="password" class="form-control form-control-user" placeholder="Password" onkeyup='check()';>
                                </div>
                                <div class="form-group">
                                    <input id="confirm_password" name="password" type="password" class="form-control form-control-user" placeholder="Ulangi Password" onkeyup='check()';>
                                </div>
                                <span id='message'></span>
                                <!-- @if($message = Session::get('errors'))
                                <div class="alert alert-danger text-center bg-danger border-3 border-danger text-white">
                                    {{ $message }}
                                </div>
                                @endif -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <button class="btn btn-md btn-warning btn-block" type="submit" id="submit">Daftar</button>
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small" href="/login">Sudah punya akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>


@endsection