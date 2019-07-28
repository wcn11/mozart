<?php $__env->startSection('main-content'); ?>

    <div class="container">
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mentor</div>
                            <div class="row no-gutters align-items-center">
                              <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo e($std[0]->m_ke_ms->count()); ?></div>
                              </div>
                            </div>
                          </div>
                          <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/school-director.png">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="table-responsive">
                  <table class="table table-bordered" id="tabel">
                    <thead>
                      <tr>
                        <th> Judul Soal</th>
                        <th> Mentor </th>
                        <th>Mata Pelajaran</th>
                        <th>Tanggal Selesai</th>
                        <th>Nilai</th>
                        <th>Pilihan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $nilai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($n->js_ke_n->judul); ?></td>
                            <td><?php echo e($n->js_ke_n->kjs_ke_mentor[0]->name); ?></td>
                            <td><?php echo e($n->js_ke_n->mapel_ke_soal->nama_pelajaran); ?></td>
                            <td><?php echo e($n->tanggal_selesai); ?></td>
                            <td><?php echo e($n->nilai); ?></td>
                            <td>
                              <a href="<?php echo e(route('student.soal_nilai_cetak', $n->js_ke_n->kode_judul_soal)); ?>"><button class="btn btn-info"><i class="fas fa-file-pdf"></i> print</button></a>
                            </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </div>
                  



                

                </div>
            </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/fh-3.1.4/r-2.2.2/sl-1.3.0/datatables.min.css"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/fh-3.1.4/r-2.2.2/sl-1.3.0/datatables.min.js"></script>

    <script>
    $(document).ready(function() {
    $('#tabel').DataTable();
} );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/TA/mozart-elearning/resources/views/student/home.blade.php ENDPATH**/ ?>