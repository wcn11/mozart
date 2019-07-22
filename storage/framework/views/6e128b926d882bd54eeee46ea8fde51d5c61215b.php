<?php $__env->startSection('main-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <div class="col text-right mb-3 mt-3">

        <button class="btn btn-dark btn-modal-tambah-pelajaran"> <i class="fab fa-leanpub"></i> Tambah mata pelajaran</button>
        <button class="btn btn-info btn-edit-kuota" data-toggle="modal" data-target="#modal-edit-kuota"><i class="fas fa-book"></i> Edit Kuota Kelas</button>

    </div>
    
<!-- DataTales Exame -->
<div class="card shadow mb-4 animated bounceInDown">
    <div class="card-header py-3 text-center">
        <h6 class="m-0 font-weight-bold text-primar bounce animated">Tabel pelajaran</h6>
    </div>
    <div class="card-body">

            <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <?php $__currentLoopData = $mp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="nav-item nav-link" id="nav-<?php echo e($m->mentor_ke_mapel->kode_mapel); ?>-tab" data-toggle="tab" role="tab" > <?php echo e($m->mentor_ke_mapel->nama_pelajaran); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                        <?php $__currentLoopData = $mp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade" id="nav-<?php echo e($m->mentor_ke_mapel->kode_mapel); ?>" role="tabpanel" aria-labelledby="nav-<?php echo e($m->mentor_ke_mapel->kode_mapel); ?>-tab">



                                <div class="container p-3 text-center">
                                    <a href="#" data-id="<?php echo e($m->mentor_ke_mapel->kode_mapel); ?>" class="btn btn-outline-success btn-excel"><i class="fas fa-file-excel"></i> EXCEL</a>
                                    <button href="#" data-id="<?php echo e($m->mentor_ke_mapel->kode_mapel); ?>" data-nama="<?php echo e($m->mentor_ke_mapel->nama_pelajaran); ?>" class="btn btn-outline-danger btn-hapus-pelajaran animated bounceInUp"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    <button href="#" data-id="<?php echo e($m->mentor_ke_mapel->kode_mapel); ?>" data-nama="<?php echo e($m->mentor_ke_mapel->nama_pelajaran); ?>"  class="btn btn-outline-secondary btn-edit-kuota animated bounceInUp"><i class="fas fa-edit"></i> Edit kuota</button>
                                </div>

                                <div class="table-responsive w-100 animated bounceInUp">
                                    <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                                        <thead>
                                            <tr style="text-align:center;">
                                                <th>Murid</th>
                                                <th>Materi</th>
                                                <th>Soal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr class="text-center">
                                                    <td>
                                                        <?php if(empty($m->mp_ke_ms)): ?>
                                                            0 Murid
                                                        <?php else: ?>
                                                            <?php echo e($m->mp_ke_ms->count()); ?> Murid
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if(empty($m->mp_mtri)): ?>
                                                            0 Materi
                                                        <?php else: ?>
                                                            <?php echo e($m->mp_mtri->count()); ?> Materi
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if(empty($m->mp_js)): ?>
                                                            0 Soal
                                                        <?php else: ?>
                                                            <?php echo e($m->mp_js->count()); ?> Soal
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>


    </div>
</div>
</div>

<div class="modal fade modal-mapel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body">

                <form class="form-update" method="post" action="#">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="exameInputEmail1">Kuota <span class="judul-kuota"></span> <span id="pesan_error" class="text-danger"></span></label>
                        <input type="hidden" class="kode_mapel" >
                        <input type="hidden" class="js" >
                        <input type="number" name="kuota" class="form-control kuota" max="150">

                    </div>
                </form>

            </div>
            <div class="modal-footer text-right">
                    <button type="button" class="btn btn-primary btn-update">Update</button>
            </div>
          </div>
        </div>
      </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>

<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>
<!-- Page level plugins -->
<script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    $(document).ready(function(){
        $("#nav-tab .nav-item:first-child").addClass("active show");
        $(".tab-content .tab-pane:first-child").addClass("active show");
    });

    // $(function(){

        // $(".btn-edit-kuota").click(function(){
        //     $(".js").val("");
        //     $(".kuota").val("");
        //     $(".modal-header").text("");
        //     $(".kode_mapel").val("");

        //     var id = $(this).attr("data-id");
        //     var nama = $(this).attr("data-nama");
        //     var kuota = $(this).attr("data-kuota");
        //     var js = $(this).attr("data-js");

        //     $(".js").val(js);
        //     $(".kuota").val(kuota);
        //     $(".kuota").attr("value", kuota);
        //     $(".kuota").attr("min", js);
        //     $(".modal-header").text(nama);
        //     $(".judul-kuota").text(nama);
        //     $(".kode_mapel").val(id);
        //     $(".modal-mapel").modal("show");

        // });

        // $(".btn-update").click(function(){
        //     var js = $(".js").val();
        //     var kuota = $(".kuota").val();
        //     var kode_mapel = $(".kode_mapel").val();

        //     if(kuota == "" || kuota == 0){
        //         $("#pesan_error").html("Tidak boleh kosong!").show().fadeOut(3000);
        //         return false;
        //     }else if(kuota < js){
        //         $("#pesan_error").html("Tidak boleh dibawah angka jumlah siswa saat ini!").show().fadeOut(5000);
        //         return false;
        //     }else{
        //         $(".form-update").attr("action", "<?php echo e(url('mentor/pelajaran/update/kuota/')); ?>" + "/" + kode_mapel);
        //         $(".form-update").submit();
        //     }
        // });

        // $(".kuota").keypress(function(e) {
        //     //if the letter is not digit then display error and don't type anything
        //     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //         //display error message
        //         $("#pesan_error").html("Hanya Angka!").show().fadeOut(3000);
        //         return false;
        //     }
        // });

        // $(".btn-tutup").click(function(){
        //     $(".modal-kuota-update").modal("hide");
        // });

        // $(".btn-edit").click(function(){
        //     var id = $(this).attr("data-id");
        //     var nama = $(this).attr("data-nama");
        //     var kuota = $(this).attr("data-kuota");
        //     var js = $(this).attr("data-js");

        //     $(".kuota").val(kuota);
        //     $(".form-update-kuota").attr("action", "<?php echo e(url('mentor/pelajaran/update/kuota/')); ?>" + "/" + id);
        //     $(".judul-modal2").text("");
        //     $(".judul-modal2").append(nama);
        //     $("[name='js']").val("");
        //     $("[name='js']").val(js);
        //     $(".kuota").attr("min", js);

        //     $(".modal-kuota-update").modal("show");
        // });

        // $(".kuota").keypress(function(e) {
        //     //if the letter is not digit then display error and don't type anything
        //     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //         //display error message
        //         $("#pesan_error").html("Hanya Angka!").show().fadeOut("slow");
        //         return false;
        //     }
        // });

        // $(".btn-update").click(function(){
        //     var kuota = $("[name='kuota']").val();
        //     var js = $("[name='js']").val();

        //     if(kuota == ""){
        //         $("#pesan_error").html("Tidak boleh kosong!").show().fadeOut(5000);
        //         return false;
        //     }else if(kuota < js){
        //         $("#pesan_error").html("Tidak boleh dibawah jumlah siswa saat ini!").show().fadeOut(5000);
        //     }else{
        //         $(".form-update-kuota").submit();
        //     }
        // });


/////////////////////////////////////////////////////

        // $(".btn-update-nama-mapel").click(function(){
        //     $(".form-update-mapel").submit();
        // });

    //     $(".btn-edit-pelajaran").click(function(){
    //         $(".edit_nama_mapel").text($(this).attr("data-nama"));
    //         $("[name='edit_nama_mapel']").val($(this).attr("data-nama"));
    //         $("[name='kode_mapel']").val($(this).attr("data-id"));
    //         $("#modal-edit-pelajaran").modal("show");
    //     });

    //     var kode_mapel = $("#nav-tab a:first-child").attr("data-id");

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     $.ajax({
    //         type: "post",
    //         url: "<?php echo e(url('/mentor/pelajaran/ambil_data')); ?>",
    //         data: {
    //             kode_mapel: kode_mapel
    //         },
    //         success: function(hasil){
    //             $(".materi").text(hasil.materi + " materi");
    //             $(".soal").text(hasil.soal + " soal");
    //         }
    //     });

    //     $(".btn-modal-tambah-pelajaran").click(function(){
    //         $("#modal-pelajaran").modal('show');
    //     });

    //     $("#nav-tab a:first-child").addClass("active");

    //     $(".tab-content .tab-pane:first-child").addClass('active show');

    //     $(".btn-tambah-pelajaran").click(function(){
    //         $(".form-tambah-mapel").submit();
    //     });

    //     $(".nav-item").click(function(){
    //         var kode_mapel = $(this).attr("data-id");

    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });

    //         $.ajax({
    //             type: "post",
    //             url: "<?php echo e(url('/mentor/pelajaran/ambil_data')); ?>",
    //             data: {
    //                 kode_mapel: kode_mapel
    //             },
    //             success: function(hasil){
    //                 $(".btn-pdf").attr("href", "<?php echo e(url('mentor/pelajaran/cetak')); ?>" + "/" + kode_mapel);

    //                 $(".materi").text(hasil.materi + " materi");
    //                 $(".soal").text(hasil.soal + " materi");
    //             }
    //         });
    //     });

    //     $(".btn-hapus-pelajaran").click(function(){
    //         var id = $(this).attr("data-id");

    //         Swal.fire({
    //             title: 'Apakah anda yakin ?',
    //             text: "Seluruh data yang terkait dengan pelajaran ini akan sepenuhnya dihapus!",
    //             type: 'warning',
    //             showCancelButton: true,
    //             confirmButtonColor: '#3085d6',
    //             cancelButtonColor: '#d11',
    //             confirmButtonText: 'Hapus!',
    //             cancelButtonText: 'Batal',
    //             animation: false,
    //             customClass: {
    //                 popup: 'animated shake'
    //             }
    //             }).then((result) => {
    //                 if (result.value) {

    //                     var id = $(this).attr("data-id");

    //                     $.ajaxSetup({
    //                         headers: {
    //                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                         }
    //                     });

    //                     $.ajax({
    //                         type: "post",
    //                         url: "<?php echo e(url('mentor/pelajaran/hapus/')); ?>" + "/" + id,
    //                         success: function(hasil){
    //                             console.log(hasil);
    //                             location.reload();
    //                         }
    //                     });
    //                 }
    //             })
    //     });
    // });

</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('mentor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Documents/TUGAS AKHIR/mozart-elearning/resources/views/mentor/pages/mapel/index.blade.php ENDPATH**/ ?>