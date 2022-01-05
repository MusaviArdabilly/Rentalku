
<?php $__env->startSection('title', 'Agen Rentalku'); ?>
<?php $__env->startSection('content'); ?>

<script type="text/javascript">
  document.getElementById('profil').classList.add('active');
</script>
                
        <div class="min-vh-100-70 position-relative p-3 p-md-5 m-md-3 bg-warnings overflow-hidden justify-content-center rounded">
                <!-- <div class="addons3"></div>
                <div class="addons5"></div> -->
                <div class="d-inline m">
                    <h2 class="text-center my-4 font-weight-bold text-dark">Profil Perusahaan</h2>
                    <div class="d-flex flex-column flex-sm-row  align-items-center justify-content-center my-auto">
                        <div class="col-12 col-md-4">
                            <div class="card">
                                <div class="card-body shadow">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="<?php echo e(asset("storageImages/profile/".$userdata->picture)); ?>" alt="Admin" class="profile-picture">
                                        <div class="my-3">
                                            <h4 class="font-weight-bold"><?php echo e($corporation->name); ?></h4>
                                            <p class="text-secondary mb-3 text-capitalize"><?php echo e(strtolower($corp_location->regency->name)); ?></p>
                                            <a href="<?php echo e(url('/a/edit/'.auth()->user()->id)); ?>" class="btn btn-outline-secondary">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-7 my-2">
                            <div class="card">
                                <div class="card-body shadow">
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Nama Perusahaan</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo e($corporation->name); ?>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Alamat</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary text-capitalize">
                                        <?php echo e(strtolower($corp_location->regency->name)); ?>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Deskripsi</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo e($corporation->description); ?>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Whatsapp</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        +62 <?php echo e($corporation->whatsapp); ?>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Status</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo e($corporation->status); ?>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Bergabung Sejak</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo e($corporation->created_at->format('d-m-Y')); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NoFiles\Project\Web\Laravel\Rentalku\resources\views/admin/profil/profil.blade.php ENDPATH**/ ?>