
<?php $__env->startSection('title', 'Perawatan'); ?>
<?php $__env->startSection('content'); ?>

<script type="text/javascript">
  document.getElementById('perawatan').classList.add('active');
</script>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Perawatan</h1>
                    <p class="mb-4">Dapat digunakan untuk mencatat perawatan yang telah dilakukan pada setiap kendaraan rental</p>
                    
                    <div>
                        <a href="/admin/perawatan/tambah" type="button" class="btn btn-primary mb-4">Tambah Perawatan</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="my-auto font-weight-bold text-primary">Data Perawatan</h6>
                            
                            <form method='GET' action="<?php echo e(url('/')); ?>">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control bg-white border-0 small" placeholder="Cari..."
                                        aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="50px" class="text-center">#</th>
                                            <th>Tanggal Perawatan</th>
                                            <th>Mobil</th>
                                            <th>Plat Nomor</th>
                                            <th>Perawatan</th>
                                            <th>Pengeluaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="50px" class="text-center">#</th>
                                            <th>Tanggal Perawatan</th>
                                            <th>Mobil</th>
                                            <th>Plat Nomor</th>
                                            <th>Perawatan</th>
                                            <th>Pengeluaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="">
                                        <?php $__empty_1 = true; $__currentLoopData = $maintenances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $maintenance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo e($maintenances->firstItem()+$key); ?></td>
                                            <td class="align-middle"><?php echo e($maintenance->maintenance_date); ?></td>
                                            <td class="align-middle"><?php echo e($maintenance->vehicle->brand); ?> . <?php echo e($maintenance->vehicle->type); ?></td>
                                            <td class="align-middle"><?php echo e($maintenance->vehicle->license_plate); ?></td>
                                            <td class="align-middle"><?php echo e($maintenance->maintenance); ?></td>
                                            <td class="align-middle">Rp. <?php echo number_format($maintenance->cost, 0, ',', '.'); ?></td>
                                            <td><a href="<?php echo e(url('admin/perawatan/ubah/'.$maintenance->id)); ?>">Ubah</a> | <a href="<?php echo e(url('admin/perawatan/hapus/'.$maintenance->id)); ?>" onclick="return confirm('Anda ingin menghapus data Perawatan Mobil dengan plat nomor <?php echo e($maintenance->vehicle->license_plate); ?> ?')">Hapus</a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                        <td colspan="13" class="text-center">Data Tidak Ditemukan</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NoFiles\Project\Web\Laravel\Rentalku\resources\views/admin/pengeluaran/perawatan/perawatan.blade.php ENDPATH**/ ?>