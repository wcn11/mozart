 <?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h3 mb-2 text-gray-800">Daftar Mata Pelajaran Mentor</p>
    <p class="mb-4">Pilih mata pelajaran utuk dapat mulai belajar</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Daftar Mentor</h6>
        </div>
        <div class="card-body">
            <div class="row">


                    <table class="table table-borderless">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody class="data-mapel">
                            <?php if(empty($mentor)): ?>
                                <tr class="text-center">
                                    <td colspan="3">Belum membuat materi</td>
                                </tr>

                            <?php else: ?>
                                <?php $__currentLoopData = $mentor->m_ke_mp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_key => $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($m_key + 1); ?></td>
                                        <td><?php echo e($m->mp_ke_mapel->nama_pelajaran); ?></td>
                                        <td>
                                            <?php if($m->mp_ke_ms->count() >0): ?>
                                                <?php if($m->mp_ke_ms->count() <= $m->kuota): ?>
                                                    
                                                    <?php $__currentLoopData = $m->mp_ke_ms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($s->id_student == Auth::guard('student')->user()->id_student): ?>
                                                            <a href="<?php echo e(route('student.unfollow', $s->kode_mentor_student)); ?>"><button class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Tinggalkan</button></a>
                                                        <?php else: ?>
                                                            <a href="<?php echo e(route('student.ambil_kelas', [$mentor->id_mentor, $m->kode_mentor_pelajaran])); ?>"><button class="btn btn-info"><i class="fas fa-inbox"></i> Ambil Kelas</button></a>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <button class="btn btn-danger"><i class="fas fa-sign-out"></i> Penuh</button>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('student.ambil_kelas', [$mentor->id_mentor, $m->kode_mentor_pelajaran])); ?>"><button class="btn btn-info"><i class="fas fa-inbox"></i> Ambil Kelas</button></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php endif; ?>
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-mentor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Pilihan</th>
                          </tr>
                        </thead>
                        <tbody class="data-mapel">
                            
                        </tbody>
                      </table>
          </div>
        </div>
      </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
<style>

    .profil{
        min-height: 150%;
    }

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>



<?php if(Session::has("tambah_kelas")): ?>
<script>
    Swal.fire({
        title: 'Berhasil',
        type: "success",
        text: "Anda mengikuti mentor",
        animation: false,
        customClass: {
            popup: 'animated tada'
        }
    });
</script>
<?php endif; ?>

<?php if(Session::has("berhasil_unfollow")): ?>
<script>
    Swal.fire({
        title: 'Berhasil',
        type: "info",
        text: "Anda telah keluar kelas",
        animation: false,
        customClass: {
            popup: 'animated shake'
        }
    });
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/TA/mozart-elearning/resources/views/student/mapel_mentor.blade.php ENDPATH**/ ?>