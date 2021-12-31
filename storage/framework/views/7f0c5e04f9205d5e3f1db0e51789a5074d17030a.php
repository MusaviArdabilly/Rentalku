
<?php $__env->startSection('title', 'Rentalku'); ?>
<?php $__env->startSection('content'); ?>
                
        <div class="min-vh-100-80 position-relative p-3 p-md-5 m-md-3 bg-warning overflow-hidden row align-items-center">
            <div class="">
                <div class="addons3"></div>
                <div class="addons4"></div>
                <div class="my-auto d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-md-between">
                    
                    <div class="col-12 col-md-4 shadow">
                        <div class="card">
                            <div class="card-body h-100">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="<?php echo e(asset("storageImages/profile/$userdata->picture")); ?>" alt="Admin" class="profile-picture">
                                    <div class="my-4">
                                        <h4 class="mt-1"><?php echo e($userdata->name); ?></h4>
                                        <p class="text-secondary mb-1"><?php echo e($userdata->username); ?></p>
                                        <p class="text-muted font-size-sm mb-4"><?php echo e($userdata->email); ?></p>
                                        <a href="<?php echo e(url('/u/edit/'.auth()->user()->username)); ?>" class="btn btn-outline-secondary">Ubah</a>
                                        <?php if( $userdata->role == 'user' ): ?>
                                        <a href="<?php echo e(url('/u/join/'.auth()->user()->id)); ?>" class="btn btn-secondary">Gabung Menjadi Agen</a>
                                        <?php else: ?>
                                        <a href="<?php echo e(url('/admin/dashboard')); ?>" class="btn btn-secondary">Halaman Agen</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 shadow my-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                    <h6 class="mb-0">Nama</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo e($userdata->name); ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <h6 class="mb-0">Username</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo e($userdata->username); ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo e($userdata->email); ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <h6 class="mb-0">Nomor Telepon</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo e($userdata->phone_number); ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <h6 class="mb-0">Alamat</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary text-capitalize">
                                    <?php if(isset($location)): ?>
                                    <?php echo e(strtolower($location->street) .' - '. strtolower($location->village->name) .' - '. strtolower($location->district->name) .' - '. strtolower($location->regency->name) .' - '. strtolower($location->province->name)); ?>

                                    <?php endif; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <h6 class="mb-0">NIK</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo e($userdata->nik); ?>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Bergabung Sejak</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo e($userdata->created_at->format('d-m-Y')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    
                </div>
            </div>
        </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NoFiles\Project\Web\Laravel\Rentalku\resources\views/user/profil/profil.blade.php ENDPATH**/ ?>