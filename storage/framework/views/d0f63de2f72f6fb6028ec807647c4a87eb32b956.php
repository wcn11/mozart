<?php $__env->startSection('main-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <div class="col text-right mb-3 mt-3">

        <button class="btn btn-dark btn-tambah"> <i class="fab fa-leanpub"></i> Tambah mata pelajaran</button>
        

    </div>
    
<!-- DataTales Exame -->
<div class="card shadow mb-4 animated bounceInDown">
    <div class="card-header py-3 text-center">
        <h6 class="m-0 font-weight-bold text-primar bounce animated">Tabel pelajaran</h6>
    </div>
    <div class="card-body">

            <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <?php $__currentLoopData = $mentor->m_ke_mp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button class="nav-item nav-link" href="#nav-<?php echo e($m->kode_mentor_pelajaran); ?>" id="nav-<?php echo e($m->kode_mentor_pelajaran); ?>-tab" data-toggle="tab" role="tab" > <?php echo e($m->mp_ke_mapel->nama_pelajaran); ?></button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                        <?php $__currentLoopData = $mentor->m_ke_mp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade" id="nav-<?php echo e($m->kode_mentor_pelajaran); ?>" role="tabpanel" aria-labelledby="nav-<?php echo e($m->kode_mentor_pelajaran); ?>-tab">

                                <p class="p-2">Jumlah murid saat ini = <?php echo e($m->mp_ke_ms->count()); ?> / <?php echo e($m->kuota); ?></p>
                                <div class="container p-3 text-center">
                                    
                                    <button data-id="<?php echo e($m->kode_mentor_pelajaran); ?>" data-nama="<?php echo e($m->mp_ke_mapel->nama_pelajaran); ?>" class="btn btn-outline-danger btn-hapus-pelajaran animated bounceInUp"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    <button data-id="<?php echo e($m->kode_mentor_pelajaran); ?>" class="btn btn-outline-secondary btn-edit animated bounceInUp"><i class="fas fa-edit"></i> Edit kuota</button>

                                    <form class="form-hapus-<?php echo e($m->kode_mentor_pelajaran); ?>" action="<?php echo e(route('mentor.hapus_mapel', $m->kode_mentor_pelajaran)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="kmp" value="<?php echo e($m->kode_mentor_pelajaran); ?>">
                                    </form>

                                    <div class="edit-kuota-<?php echo e($m->kode_mentor_pelajaran); ?> edit-kuota p-2">

                                            <form class="form-group form-update-kuota-<?php echo e($m->kode_mentor_pelajaran); ?>" action="<?php echo e(route('mentor.edit_kuota')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                
                                                <input type="hidden" value="<?php echo e($m->mp_ke_ms->count()); ?>" name="jsc" class="jsc-<?php echo e($m->kode_mentor_pelajaran); ?>" data-jsc="<?php echo e($m->mp_ke_ms->count()); ?>">
                                                <div class="form-group justify-content-center">
                                                    <input type="hidden" name="kode_mp" value="<?php echo e($m->kode_mentor_pelajaran); ?>">
                                                    <label for="exampleInputEmail1">Kuota</label><br>
                                                    <span id="pesan_error-<?php echo e($m->kode_mentor_pelajaran); ?>" class="text-danger"></span>
                                                    <input type="number" name="kuota_baru" data-id="<?php echo e($m->kode_mentor_pelajaran); ?>" min="<?php echo e($m->mp_ke_ms->count()); ?>" max="150" value="<?php echo e($m->kuota); ?>" class="form-control text-center w-100 kuota-baru-<?php echo e($m->kode_mentor_pelajaran); ?>" aria-describedby="emailHelp">
                                                </div>
                                                <button type="button" class="btn btn-primary btn-update-kuota" data-id="<?php echo e($m->kode_mentor_pelajaran); ?>"><i class="fas fa-upload"></i> Update</button>
                                            </form>
                                    </div>
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
                                                    <td><?php echo e($m->mp_ke_ms->count()); ?> Murid</td>
                                                    <td><?php echo e($m->mp_ke_materi->count()); ?> Materi</td>
                                                    <td><?php echo e($m->mp_ke_js->count()); ?></td>
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


      <div class="modal fade modal-tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header text-center">
                    Tambah Mata Pelajaran (Mapel)
                </div>
                <div class="modal-body">

                    <form class="form-group" method="post" action="<?php echo e(route('mentor.tambah_mapel')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group w-100">
                            <br>
                                <select name="mapel" class="form-control">
                                    <?php $__currentLoopData = $mapel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($mp->kode_mapel); ?>"><?php echo e($mp->nama_pelajaran); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                        </div>
                </div>
                <div class="modal-footer text-right">
                        <button type="submit" class="btn btn-dark"><i class="fas fa-plus"></i> Tambah</button>
                </div>
            </form>
              </div>
            </div>
          </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>

<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<style>
.edit-kuota{
    display: none;
}
</style>

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


        $(".btn-tambah").click(function(){
            $(".modal-tambah").modal('show');
        });

        $(".btn-edit").click(function(){
            var kode = $(this).attr('data-id');
            // var js = $(this).attr('data-js');

            $(".edit-kuota-" + kode).toggle(1000);
        });

        $(".btn-update-kuota").click(function(){
            var kode = $(this).attr("data-id");

            var js = $(".jumlah-kuota-" + kode).val();
            var jsc = $(".jsc-" + kode).val();
            var kuota = $(".kuota-baru-" + kode).val();
            var jsc = $(".jsc-" + kode).val();

            if(kuota < jsc){
                Swal.fire({
                    title: "Gagal",
                    text: "Kuota tidak boleh dibawah jumlah student (murid) saat ini !",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: true,
                    confirmButtonText: "mengerti",
                    animation: false,
                    customClass: {
                        popup: "animated shake"
                    }
                });
            }else{
                $(".form-update-kuota-" + kode).submit();
            }
        });

        $("[name='kuota_baru']").keypress(function(e) {
            //if the letter is not digit then display error and don't type anything
            var kode = $(this).attr("data-id");
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#pesan_error-" + kode).html("Hanya Angka!").show().fadeOut(5000);
                return false;
            }
        });

            $(".btn-hapus-pelajaran").click(function(){
            var id = $(this).attr("data-id");
            var nama = $(this).attr("data-nama");

            Swal.fire({
                title: 'Apakah anda yakin ?',
                html: "Seluruh data yang terkait dengan pelajaran <span class='text-danger font-weight-bold'>" + nama +  "</span> akan sepenuhnya dihapus!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d11',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal',
                animation: false,
                customClass: {
                    popup: 'animated shake'
                }
                }).then((result) => {
                    if (result.value) {

                        $(".form-hapus-" + id).submit();

                    }
                })
    });

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


<?php if(Session::get('pelajaran_dihapus')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        "berhasil menghapus mata pelajaran",
        'success'
    )

</script>
<?php endif; ?>

<?php if(Session::has('kuota_berhasil')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        "berhasil mengupdate kuota",
        'success'
    )

</script>
<?php endif; ?>


<?php if(Session::has('sudah_ada')): ?>
<script>
    Swal.fire({
        title: "Gagal",
        text: "Pelajaran telah anda ambil!",
        type: "error",
        showCancelButton: false,
        showConfirmButton: true,
        confirmButtonText: "Mengerti",
        animation: false,
        customClass: {
            popup: "animated shake"
        }
    });
</script>
<?php endif; ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('mentor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/TA/mozart-elearning/resources/views/mentor/pages/mapel/index.blade.php ENDPATH**/ ?>