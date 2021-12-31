
<?php $__env->startSection('title', 'Rentalku'); ?>
<?php $__env->startSection('content'); ?>
                

            <div class="overflow-hidden p-3 p-md-3 m-md-3 bg-warning text-center rounded position-relative">
                <h1 class="display-4 fw-bold">Rentalku</h1>
                <div class="addons1"></div>
                <div class="addons2"></div>
            </div>

            <div class=" position-relative p-3 p-md-5 m-md-3">
                <form method='GET' action="<?php echo e(url('/search')); ?>" autocomplete="off">
                    <div class="row p-4 p-md-5 mx-auto rounded bg-light shadow z-index-1">
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <label class="text-secondary">
                                Lokasi
                            </label>
                            <div class="col-sm-9">
                                <select name="search" class="form-select" required="">
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
                            <div class="col-sm-9">
                                <input name="" type="text" class="form-control datepicker" id="input4" value="<?php echo e($start_date); ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-2">
                            <label class="text-secondary">
                                Waktu Mulai
                            </label>
                            <div class="col-sm-9">
                                <input name="" type="text" class="form-control timepicker" id="input4" value="<?php echo e($start_time); ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-2">
                            <label class="text-secondary">
                                Tanggal Selesai
                            </label>
                            <div class="col-sm-9">
                                <input name="" type="text" class="form-control datepicker" id="input4" value="<?php echo e($finish_date); ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-2">
                            <label class="text-secondary">
                                Waktu Selesai
                            </label>
                            <div class="col-sm-9">
                                <input name="" type="text" class="form-control timepicker" id="input4" value="<?php echo e($finish_time); ?>">
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
                <?php if(count($products) > 0): ?>
                <div class="mx-auto rounded my-4">                
                    <div class="row d-flex justify-content-between">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="col-12 shadow-sm rounded bg-light">
                                <img class="card-img-top" src="<?php echo e(asset("storageImages/product/".$product->picture)); ?>" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-title"><?php echo e($product->title); ?></p>
                                    <h5 class="fw-bold font-monospace">Rp. <?php echo number_format($product->price, 0, ',', '.'); ?></h5>
                                    <p class="card-text text-secondary"><?php echo e($product->vehicle->transmision); ?> | <?php echo e($product->vehicle->fuel_type); ?> | Plat <?php echo e($product->vehicle->license_plate_type); ?> </p>
                                    <div class="d-flex justify-content-end">
                                        <a href="https://wa.me/+62<?php echo e($product->corporation->whatsapp); ?>" class="btn btn-success" target="_blank"><i class="fa fa-whatsapp">&nbsp;</i>Hubungi Agen</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php else: ?>
            </div>

            <div class="row col-md-9 align-items-center mx-auto rounded mt-4 text-center min-vh-100-422 ">  
                <h4 class="">Lokasi yang anda cari belum ada agen rental yang mendaftar </h4>
            </div>

            <?php endif; ?>
            

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NoFiles\Project\Web\Laravel\Rentalku\resources\views/user/hasil_pencarian.blade.php ENDPATH**/ ?>