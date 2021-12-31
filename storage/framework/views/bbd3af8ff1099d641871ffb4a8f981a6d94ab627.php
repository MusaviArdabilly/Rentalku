
<?php $__env->startSection('title', 'Ubah Data Mobil'); ?>
<?php $__env->startSection('content'); ?>

<script type="text/javascript">
  document.getElementById('mobil').classList.add('active');
</script>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Kendaraan</h1>
                    <p class="mb-4">Kendaraan dapat berupa bla bla bla.</p>

                    <!-- DataTales Example -->
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <div class="my-auto">
                                <h5 class="my-0 font-weight-bold text-primary">Ubah Kendaraan</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <form class="user" method="POST" action="<?php echo e(url('/admin/mobil/ubah/post/'.$vehicle->id)); ?>">
                                <?php echo e(csrf_field()); ?>

                                    <div class="d-flex justify-content-center my-3">
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="form-group row">
                                                <label for="input1" class="col-sm-3 col-form-label">Jenis Kendaraan</label>
                                                <div class="col-sm-9">
                                                    <!-- <input name="vehicle" type="text" class="form-control" id="input1">     -->
                                                    <select name="vehicle" class="custom-select custom-select form-control" id="input1">
                                                        <option selected value="car">Mobil</option>
                                                        <option disabled value="bike">Motor</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input2" class="col-sm-3 col-form-label">Plat Nomor</label>
                                                <div class="col-sm-9">
                                                    <input name="license_plate" type="text" class="form-control" id="input2" value="<?php echo e($vehicle->license_plate); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input3" class="col-sm-3 col-form-label">Merk</label>
                                                <div class="col-sm-9">
                                                    <input name="brand" type="text" class="form-control" id="input3" value="<?php echo e($vehicle->brand); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input4" class="col-sm-3 col-form-label">Tipe</label>
                                                <div class="col-sm-9">
                                                    <input name="type" type="text" class="form-control" id="input4" value="<?php echo e($vehicle->type); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input5" class="col-sm-3 col-form-label">Warna</label>
                                                <div class="col-sm-9">
                                                    <input name="color" type="text" class="form-control" id="input5" value="<?php echo e($vehicle->color); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input6" class="col-sm-3 col-form-label">Transamisi</label>
                                                <div class="col-sm-9">
                                                    <!-- <input name="transmision" type="text" class="form-control" id="input6"> -->
                                                    <select name="transmision" class="custom-select custom-select form-control" id="input6">
                                                        <option value="Manual" selected>Manual</option>
                                                        <option value="Automatic">Automatic</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input7" class="col-sm-3 col-form-label">Jumlah Kursi</label>
                                                <div class="col-sm-9">
                                                    <input name="chair_amount" type="text" class="form-control" id="input7" value="<?php echo e($vehicle->chair_amount); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input8" class="col-sm-3 col-form-label">Bahan Bakar</label>
                                                <div class="col-sm-9">
                                                    <!-- <input name="fuel_type" type="text" class="form-control" id="input8"> -->
                                                    <select name="fuel_type" class="custom-select custom-select form-control" id="input1">
                                                        <option value="Bensin" selected>Bensin</option>
                                                        <option value="Solar">Solar</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input9" class="col-sm-3 col-form-label">Harga Kendaraan</label>
                                                <div class="col-sm-9">
                                                    <input name="price" type="text" class="form-control" id="input9" value="<?php echo e($vehicle->price); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input10" class="col-sm-3 col-form-label">Tanggal Tenggang Pajak</label>
                                                <div class="col-sm-9">
                                                    <input name="tax_payment_date" type="text" class="form-control picker" id="input10" value="<?php echo e($vehicle->tax_payment_date); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input11" class="col-sm-3 col-form-label">Jenis Plat Nomor</label>
                                                <div class="col-sm-9">
                                                    <!-- <input name="license_plate_type" type="text" class="form-control" id="input11"> -->
                                                    <select name="license_plate_type" class="custom-select custom-select form-control" id="input1">
                                                        <option value="ganjil" selected>Ganjil</option>
                                                        <option value="genap">Genap</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input12" class="col-sm-3 col-form-label">Plat Nomor Kadaluarsa</label>
                                                <div class="col-sm-9">
                                                    <input name="license_plate_expiration_date" type="text" class="form-control picker" id="input12" value="<?php echo e($vehicle->license_plate_expiration_date); ?>">
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
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NoFiles\Project\Web\Laravel\Rentalku\resources\views/admin/kendaraan/ubah_kendaraan.blade.php ENDPATH**/ ?>