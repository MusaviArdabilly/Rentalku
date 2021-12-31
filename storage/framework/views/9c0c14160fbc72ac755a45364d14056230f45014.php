
<?php $__env->startSection('title', 'Transaksi'); ?>
<?php $__env->startSection('content'); ?>

<script type="text/javascript">
  document.getElementById('transaksi').classList.add('active');
</script>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
                    <p class="mb-4">Transaksi merupakan sebuah sistem yang menjalankan dan mencatat transaksi rutin harian yang diperlukan untuk menjalankan bisnis.</p>
                    
                    <div>
                        <a href="/admin/transaksi/tambah" type="button" class="btn btn-primary mb-4">Tambah Transaksi</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="my-auto font-weight-bold text-primary">Data Transaksi</h6>
                            
                            <form method='GET' action="<?php echo e(url('/admin/transaksi')); ?>">
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
                                            <th>Mobil</th>
                                            <th>Plat Nomor</th>
                                            <th>Waktu Mulai</th>
                                            <th>Waktu Selesai</th>
                                            <th>Waktu Pengembalian</th>
                                            <th>Pendapatan</th>
                                            <th>Konfirmasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="50px" class="text-center">#</th>
                                            <th>Mobil</th>
                                            <th>Plat Nomor</th>
                                            <th>Waktu Mulai</th>
                                            <th>Waktu Selesai</th>
                                            <th>Waktu Pengembalian</th>
                                            <th>Pendapatan</th>
                                            <th>Konfirmasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="">
                                        <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo e($transactions->firstItem()+$key); ?></td>
                                            <td class="align-middle"><?php echo e($transaction->schedule->vehicle->brand); ?> . <?php echo e($transaction->schedule->vehicle->type); ?></td>
                                            <td class="align-middle"><?php echo e($transaction->schedule->vehicle->license_plate); ?></td>
                                            <td class="align-middle"><?php echo e($transaction->schedule->time_start); ?></td>
                                            <td class="align-middle"><?php echo e($transaction->schedule->time_finish); ?></td>
                                            <td class="align-middle"><?php echo e($transaction->schedule->time_return); ?></td>
                                            <td class="align-middle">Rp. <?php echo number_format($transaction->income, 0, ',', '.'); ?></td>
                                            <td class="text-center">
                                            <?php if( $transaction->schedule->time_return == null): ?>
                                                <a class="btn btn-primary btn-sm" href="<?php echo e(url('admin/transaksi/selesai/'.$transaction->id)); ?>" onclick="return confirm('Anda yakin untuk menyelesaikan data transaksi Mobil <?php echo e($transaction->schedule->vehicle->brand); ?> dengan plat nomor <?php echo e($transaction->schedule->vehicle->license_plate); ?> ?')">Selesai</a>
                                            <?php else: ?> 
                                                <button disabled class="btn btn-primary btn-sm">Selesai</button>
                                            <?php endif; ?>
                                            </td>
                                            <td><a href="<?php echo e(url('admin/transaksi/ubah/'.$transaction->id)); ?>">Ubah</a> | <a href="<?php echo e(url('admin/transaksi/hapus/'.$transaction->id)); ?>" onclick="return confirm('Anda ingin menghapus data Transaksi Mobil dengan plat nomor <?php echo e($transaction->schedule->vehicle->license_plate); ?> ?')">Hapus</a></td>
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
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NoFiles\Project\Web\Laravel\Rentalku\resources\views/admin/pemasukan/transaksi.blade.php ENDPATH**/ ?>