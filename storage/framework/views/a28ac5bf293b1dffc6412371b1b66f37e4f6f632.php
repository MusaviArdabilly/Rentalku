
<?php $__env->startSection('title', 'Rentalku - Login'); ?>
<?php $__env->startSection('content'); ?>


        <!-- Outer Row -->
        <div class="row justify-content-center">

            <!-- <div class="col-xl-10 col-lg-12 col-md-9"> -->
            <div class="col-xl-5 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 bg-light">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Rentalku</h1>
                                    </div>
                                    <form class="user" method="POST" action="<?php echo e(url('/postlogin')); ?>">
                                    <?php echo e(csrf_field()); ?>

                                        <div class="form-group">
                                            <input name="username" type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <?php if($message = Session::get('errors')): ?>
                                        <div class="alert alert-danger text-center bg-danger border-3 border-danger text-white">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php endif; ?>
                                        <button class="btn btn-md btn-warning btn-block" type="submit" id="submit">Login</button>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="small" href="/register">Belum punya akun? Daftar!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.authlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NoFiles\Project\Web\Laravel\Rentalku\resources\views/authentication/login.blade.php ENDPATH**/ ?>