<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.75, shrink-to-fit=no">

        <title>@yield('title')</title>

        <!-- Tab Icon -->
        <link rel="icon" href="{{ asset("storageImages/mlogo.png") }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/additional.css') }}" rel="stylesheet">
    
        <!-- Date Time Picker -->
        <link href="{{ asset('css/jquery.datetimepicker.min.css') }}" rel="stylesheet">

    </head>
    <body>
        <header class=" sticky-top navbar-dark bg-dark py-1">
            <nav class="container d-flex justify-content-between">
                <a class="text-light py-2 justify-content-star" href="/" aria-label="Rentalku">
                <img src="{{ asset("storageImages/mlogo.png") }}" width="24">
                </a>
                <div class="my-auto ">
                    @if (Auth::guest())
                    <a class="text-light py-2 me-4 d-md-inline-block text-decoration-none" href="/login">Login</a>
                    <a class="text-light py-2 d-md-inline-block text-decoration-none" href="/register">Register</a>
                    @else
                    <div class="ml-auto">
                        <ul class="navbar-nav ml-md-0">
                            <li class="nav-item dropdown">
                                <a class="text-light nav-link dropdown-toggle mr-2x" id="userDropdown" href="#" role="button" data-toggle="dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user fw">&nbsp;</i>
                                    <span>
                                        {{ auth()->user()->username }}
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-dark dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="text-light dropdown-item" href="{{ url('/u/'.auth()->user()->username) }}">Profil</a>
                                    <!-- <a class="dropdown-item" href="/admin/dashboard">Admin</a> -->
                                    <a class="text-light dropdown-item" href="/logout">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
            </nav>
        </header>

        <main>

            @yield('content')

        </main>

        <footer class="bg-dark text-center text-lg-start">
        <!-- Copyright -->
            <div class="text-center p-3 text-light">
                © 2021 
                <a class="text-decoration-none text-white" href="https://www.instagram.com/msvbill/">Musavi Ardabilly</a>
            </div>
        <!-- Copyright -->
        </footer>

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>

        <!-- Custom js for hide upload button-->
        <script src="{{ asset('js/hide_upload_button.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Popper  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Date Picker  -->
        <script src="{{ asset('vendor/jquery/jquery.datetimepicker.full.min.js') }}"></script>
        <script>
        $(function () {
            $('.datepicker').datetimepicker({
                timepicker: false,
                datepicker: true,
                format: 'd-m-Y',
                // value: '22-08-2021'
            })
            $('.timepicker').datetimepicker({
                timepicker: true,
                datepicker: false,
                format: 'H:i',
                // value: '22-08-2021'
            })
        });
        </script>

        <!-- Custom image preview -->
        <script>
        var loadFile = function(event) {
            var reader = new FileReader();
                reader.onload = function(){
                var output = document.getElementById('imgprev');
                output.src = reader.result;
                };
            reader.readAsDataURL(event.target.files[0]);
        $("#btn-submit-ava").show()
        };

        if(onload == null){
            $("#btn-submit-ava").hide();
        }
        </script>

        <script>
        $('input[type=file][name="picture[]"]').change(function(){
            var hasNoFiles = this.files.length == 0;
            $(this).closest('form') /* Select the form element */
            .find('input[type=submit]') /* Get the submit button */
            .prop('disabled', hasNoFiles); /* Disable the button. */
        });
        </script>

        <!-- Alamat AJAX -->
        <script src="{{ asset('js/alamat.js') }}"></script>
        
    </body>
</html>