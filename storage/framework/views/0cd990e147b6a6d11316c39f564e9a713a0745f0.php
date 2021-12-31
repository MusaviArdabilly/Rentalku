
<?php $__env->startSection('title', 'Ubah Data Produk'); ?>
<?php $__env->startSection('content'); ?>

<script type="text/javascript">
  document.getElementById('produk').classList.add('active');
</script>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Produk</h1>
                    <p class="mb-4">Produk dapat berupa bla bla bla.</p>

                    <!-- DataTales Example -->
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <div class="my-auto">
                                <h5 class="my-0 font-weight-bold text-primary">Ubah Produk</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <form class="user" method="POST" action="<?php echo e(url('/admin/produk/ubah/post/'.$product->id)); ?>" autocomplete="off" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                    <div class="d-flex justify-content-center my-3">
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="form-group row">
                                                <label for="input4" class="col-sm-3 col-form-label">Gambar</label>
                                                <img src="<?php echo e(asset("storageImages/product/".$product->picture)); ?>" width="100px" class="mb-3" >
                                                <div class="col-sm-9">
                                                    <input name="picture" type="file" class="" id="input4">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input2" class="col-sm-3 col-form-label">Mobil</label>
                                                <div class="col-sm-9">
                                                    <select name="id_vehicle" class="form-control" required="">
                                                        <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($vehicle->id); ?>" <?php if($vehicle->id == $product->vehicle->id): ?> selected='selected' <?php endif; ?>><?php echo e($vehicle->id); ?> . <?php echo e($vehicle->brand); ?> | <?php echo e($vehicle->license_plate); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input4" class="col-sm-3 col-form-label">Judul Produk</label>
                                                <div class="col-sm-9">
                                                    <input name="title" type="text" class="form-control" id="input4" value="<?php echo e($product->title); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input5" class="col-sm-3 col-form-label">Deskripsi</label>
                                                <div class="col-sm-9">
                                                    <input name="description" type="text" class="form-control" id="input5" value="<?php echo e($product->description); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input7" class="col-sm-3 col-form-label">Harga</label>
                                                <div class="col-sm-9">
                                                    <input name="price" type="text" class="form-control" id="input7" value="<?php echo e($product->price); ?>">
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NoFiles\Project\Web\Laravel\Rentalku\resources\views/admin/produk/ubah_produk.blade.php ENDPATH**/ ?>