
<?php $__env->startSection('title', 'Rentalku - Produk'); ?>
<?php $__env->startSection('content'); ?>

<script type="text/javascript">
  document.getElementById('produk').classList.add('active');
</script>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Produk</h1>
                    <p class="mb-4">Produk dapat berupa Iklan yang akan di tampilkan pada halaman utama sehingga orang akan mudah mencari produk yang kalian iklankan.</p>
                    
                    <div>
                        <a href="/admin/produk/tambah" type="button" class="btn btn-primary mb-4">Tambah Produk</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <div class="my-auto">
                                <h5 class="font-weight-bold text-primary">Data Produk</h5>
                            </div>
                            
                            <form method='GET' action="<?php echo e(url('/admin/produk')); ?>">
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
                                            <th>Foto</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="50px" class="text-center">#</th>
                                            <th>Foto</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="">
                                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($products->firstItem()+$key); ?></td>
                                            <!-- <td><?php echo e($product->foto); ?></td> -->
                                            <td><img src="<?php echo e(asset("storageImages/product/".$product->picture)); ?>" width="60px"/></td>
                                            <td><?php echo e($product->title); ?></td>
                                            <td><?php echo e($product->description); ?></td>
                                            <td>Rp. <?php echo number_format($product->price, 0, ',', '.'); ?></td>
                                            <td><a href="<?php echo e(url('admin/produk/ubah/'.$product->id)); ?>">Ubah</a> | <a href="<?php echo e(url('admin/produk/hapus/'.$product->id)); ?>" onclick="return confirm('Anda ingin menghapus data Produk dengan judul: <?php echo e($product->title); ?>?')">Hapus</a></td>
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
                            <?php echo e($products->links()); ?>


                </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NoFiles\Project\Web\Laravel\Rentalku\resources\views/admin/produk/produk.blade.php ENDPATH**/ ?>