<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><img src="https://img.icons8.com/color/48/000000/todo-list.png" style="width:30px;"> Daftar Materi</h1>
     <p class="mb-4">Anda dapat membaca dan print materi.<br><small class="text-danger">Video tidak akan tampil jika dicetak</small></p>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h6 class="m-0 font-weight-bold text-dark"><i class="fas fa-book-reader"></i> Materi</h6>
        </div>
        <div class="card-body container-utama text-left">

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <?php if(empty($mentor->m_ke_mp->count())): ?>
                                Belum membuat mata pelajaran
                            <?php else: ?>
                                <?php $__currentLoopData = $mentor->m_ke_mp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="nav-item nav-link" id="nav-<?php echo e($m->kode_mentor_pelajaran); ?>-tab" data-toggle="tab" href="#nav-<?php echo e($m->kode_mentor_pelajaran); ?>" role="tab" aria-controls="nav-<?php echo e($m->kode_mentor_pelajaran); ?>" aria-selected="true"><?php echo e($m->mp_ke_mapel->nama_pelajaran); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">

                        <?php $__currentLoopData = $mentor->m_ke_mp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_key => $m_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade p-2" id="nav-<?php echo e($m_value->kode_mentor_pelajaran); ?>" role="tabpanel" aria-labelledby="nav-<?php echo e($m_value->kode_mentor_pelajaran); ?>-tab">

                                    <div class="row">

                                            <?php $__currentLoopData = $m_value->mp_ke_materi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            

                                                <div class="col-md-3">
                                                    <div class="card materi rounded">
                                                        <a href="<?php echo e(route('student.materi_read', $m->kode_materi)); ?> ">
                                                            <img src="<?php echo e(url('/images/cover_materi/'.$m->cover)); ?>" alt="John" style="width:100%"  data-toggle="tooltip" data-placement="top" title="<?php echo e($m->judul_materi); ?>">
                                                            <p class="title p-2" data-toggle="tooltip" data-placement="top" title="<?php echo e($m->judul_materi); ?>"><?php echo e($m->judul_materi); ?></p>
                                                        </a>

                                                        <p>
                                                            <p class="badge badge-info"><?php echo e($m->dibuat); ?></p>
                                                            <a href="<?php echo e(route('student.materi_read', $m->kode_materi)); ?>"><button class="baca rounded"><img src="https://img.icons8.com/color/48/000000/reading-ebook.png" style="width:30px;"> Baca</button></a>
                                                        </p>
                                                    </div>
                                                </div>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>


        </div>
    </div>

</div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.1/cropper.min.css">
<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('tooltip/css/animate.css')); ?>">

<style>
.container-utama{
    height: auto;
}
.materi {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 14px;
}
.title{
    white-space: nowrap;
  width: 100%;
  overflow: hidden;
  text-overflow: ellipsis;
}

.baca {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.baca:hover, a:hover {
  opacity: 0.7;
}

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>

<script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <script>
        $("document").ready(function(){
            $(".nav-tabs .nav-item:first-child").addClass("active");
            $(".tab-content .tab-pane:first-child").addClass("active show");
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/TA/mozart-elearning/resources/views/student/daftar_materi.blade.php ENDPATH**/ ?>