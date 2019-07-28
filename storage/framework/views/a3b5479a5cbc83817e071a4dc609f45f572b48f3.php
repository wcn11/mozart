<?php $__env->startSection('main-content'); ?>

 <!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        

        <!-- DataTales Example -->
            <button class="btn btn-info" data-toggle="modal" data-target=".modal-tambah"><i class="fas fa-plus"></i> Tambah Pelajaran</button>
        <div class="card shadow mb-4">
            <div class="table-responsive">
                <table class="table table-hover table-border">
                    <thead>
                        <tr class="text-center">
                            <th>Nama Mapel</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $mapel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">
                                <td><?php echo e($m->nama_pelajaran); ?></td>
                                <td>
                                    <button class="btn btn-danger btn-hapus" data-id="<?php echo e($m->kode_mapel); ?>"><i class="fas fa-trash"></i> hapus</button>
                                    <button class="btn btn-warning btn-edit" data-id="<?php echo e($m->kode_mapel); ?>" data-nama="<?php echo e($m->nama_pelajaran); ?>"><i class="fas fa-edit"></i> edit</button>
                                    <form class="form-hapus-<?php echo e($m->kode_mapel); ?>" action="<?php echo e(route('master.hapus_mapel',$m->kode_mapel)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade modal-tambah" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">

                <form class="p-2" action="<?php echo e(route('master.tambah_mapel')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama mata pelajaran</label>
                        <input type="text" name="mapel" class="form-control" placeholder="Mata pelajaran">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade modal-edit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">

                <form class="p-2" action="<?php echo e(route('master.update_mapel')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" name="kode_mapel">
                        <label for="exampleInputEmail1">Nama mata pelajaran</label>
                        <input type="text" name="mapel" class="form-control" placeholder="Mata pelajaran">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Update</button>
                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>
    <script>

        $(".btn-edit").click(function(){
            var id = $(this).attr("data-id");
            var nama = $(this).attr("data-nama");

            $("[name='kode_mapel']").val(id);
            $("[name='mapel']").val(nama);
            $(".modal-edit").modal("show");

        });
        $(".btn-hapus").click(function(){
            var id= $(this).attr("data-id");

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                $(".form-hapus-"+id).submit();
            }
            })
        });
    </script>

<?php if(Session::has('mapel_terhapus')): ?>
<script>

    Swal.fire({
    title: 'Berhasil',
    text: "Berhasil menghapus mapel!",
    type: 'success',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'oke',
    }).then((result) => {
    if (result.value) {
        $(".form-hapus-"+id).submit();
    }
    })
</script>
<?php endif; ?>

<?php if(Session::has('berhasil_tambah')): ?>
<script>

    Swal.fire({
    title: 'Berhasil',
    text: "Berhasil menambah mapel!",
    type: 'success',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'oke',
    });
</script>
<?php endif; ?>

<?php if(Session::has('mapel_update')): ?>
<script>

    Swal.fire({
    title: 'Berhasil',
    text: "Berhasil update mapel!",
    type: 'success',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'oke',
    });
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/TA/mozart-elearning/resources/views/master/mapel.blade.php ENDPATH**/ ?>