
<?php $__env->startSection('title', 'Rentalku'); ?>
<?php $__env->startSection('content'); ?>

            <div class="min-vh-100-136 position-relative p-3 p-md-5 m-md-3 bg-warning overflow-hidden">
                <div class="addons1"></div>
                <div class="addons2"></div>

                    <div class="position-relative">
                    
                        <div class="col-md-9 p-lg-5 mx-auto my-2 text-center mb-5">
                            <h1 class="display-4 fw-bold">Rentalku</h1>
                            <p class="lead fw-normal mt-4">Rentalku tersedia untuk membantu memudahkan Anda untuk menyewa mobil untuk keperluan liburan, pernikahan atau kebutuhan bisnis.</p>
                            
                            <!-- <p class="lead fw-normal">Rentalku merupakan wadah yang memungkinkan para pelaku usaha rental kendaraan tingkat kecil dan menengah untuk merambah ke dunia maya.</p> -->
                            
                        </div>
                        
                        <form method='GET' action="<?php echo e(url('/search')); ?>" autocomplete="off">
                            <div class="row p-4 p-md-5 mx-auto rounded bg-light shadow z-index-1">
                                <div class="col-sm-12 col-md-12 col-lg-3">
                                    <label class="text-secondary">
                                        Lokasi
                                    </label>
                                    <div class="col-sm-12">
                                        <select name="search" class="form-select text-capitalize" required="">
                                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(strtolower($location->regency->name)); ?>"><?php echo e(strtolower($location->regency->name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-2">
                                    <label class="text-secondary">
                                        Tanggal Mulai
                                    </label>
                                    <div class="col-sm-12">
                                        <input name="start_date" type="text" class="form-control datepicker" id="input4">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-2">
                                    <label class="text-secondary">
                                        Waktu Mulai
                                    </label>
                                    <div class="col-sm-12">
                                        <input name="start_time" type="text" class="form-control timepicker" id="input4">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-2">
                                    <label class="text-secondary">
                                        Tanggal Selesai
                                    </label>
                                    <div class="col-sm-12">
                                        <input name="finish_date" type="text" class="form-control datepicker" id="input4">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-2">
                                    <label class="text-secondary">
                                        Waktu Selesai
                                    </label>
                                    <div class="col-sm-12">
                                        <input name="finish_time" type="text" class="form-control timepicker" id="input4">
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
            </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NoFiles\Project\Web\Laravel\Rentalku\resources\views/user/index.blade.php ENDPATH**/ ?>