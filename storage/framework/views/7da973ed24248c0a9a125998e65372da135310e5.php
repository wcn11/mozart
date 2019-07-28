<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Murid</h1>
    <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
            class="badge badge-danger">mengeluarkan</span> murid anda.</p>
            <div class="text-right">

                
            </div>
    <div class="p-2"></div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        

        <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <?php $__currentLoopData = $mentor->m_ke_mp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="nav-item nav-link" id="nav-<?php echo e($m->kode_mentor_pelajaran); ?>-tab" data-toggle="tab" href="#nav-<?php echo e($m->kode_mentor_pelajaran); ?>" ><?php echo e($m->mp_ke_mapel->nama_pelajaran); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </div>
              </nav>

              <div class="card-body">


              <div class="tab-content" id="nav-tabContent">
                  <?php $__currentLoopData = $mentor->m_ke_mp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade" id="nav-<?php echo e($m->kode_mentor_pelajaran); ?>" data-id="<?php echo e($m->kode_mentor_pelajaran); ?>">
                        <div class="table-responsive">
                            <p>Kuota kelas : <?php echo e($m->mp_ke_ms->count()); ?> / <?php echo e($m->kuota); ?></p>
                            <button class="btn btn-info text-right btn-edit" data-id="<?php echo e($m->kode_mentor_pelajaran); ?>" data-kuota-sekarang="<?php echo e($m->kuota); ?>" data-jumlah-student="<?php echo e($m->mp_ke_ms->count()); ?>"><i class="fas fa-restroom"></i> Edit Kuota Kelas</button>

                            <button class="btn btn-danger text-right btn-hapus" data-id="<?php echo e($m->kode_mentor_pelajaran); ?>"><i class="fas fa-restroom"></i> Hapus Kelas</button></<button>

                            <form action="<?php echo e(route('mentor.hapus_mapel')); ?>" class="form-hapus" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="kmp">
                            </form>

                            <div class="p-2"></div>
                            <table class="table table-table-hover table-bordered" id="tabel-<?php echo e($m->kode_mentor_pelajaran); ?>">
                                <thead>
                                    <tr>
                                        <th>Profil</th>
                                        <th>ID Student</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tanggal Mengikuti</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $m->mp_ke_ms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">
                                            
                                            <td class="w-25">
                                                <div class="profil justify-content-center">
                                                    <img src="<?php echo e(url('/images/'.$ms->s_ke_ms->foto)); ?>" class="rounded text-center gambar border-success border w-100 border-20">
                                                </div>
                                            </td>
                                            <td><?php echo e($ms->s_ke_ms->id_student); ?></td>
                                            <td><?php echo e($ms->s_ke_ms->name); ?></td>
                                            <td><?php echo e($ms->s_ke_ms->email); ?></td>
                                            <td><?php echo e($ms->tanggal_mengikuti); ?></td>
                                            <td>
                                                <button class="btn btn-info btn-keluarkan" data-id="<?php echo e($ms->kode_mentor_pelajaran); ?>"><i class="fas fa-outdent"></i> Keluarkan</button>
                                            </td>
                                            <form action="<?php echo e(route('mentor.student_destroy')); ?>" class="form-keluarkan-<?php echo e($ms->kode_mentor_pelajaran); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="kode_mengikuti" value="<?php echo e($ms->kode_mengikuti); ?>">
                                            </form>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
    </div>
</div>


<div class="modal fade modal-kuota" tabindex="-1" role="dialog" aria-labelledby="modal-kuota" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
            <div class="w-100 p-2 mb-3">

                <form class="form-kuota" action="<?php echo e(route('mentor.update_kuota')); ?>" method="post">

                    <?php echo csrf_field(); ?>
                    <input name="kmp" type="hidden">
                    <input type="hidden" name="jumlah_student"> <span id="pesan_error" class="text-danger"></span>
                    <input type="number" min="1" name="kuota" class="form-control kuota" value="0" id="input-kuota" placeholder="Kuota Kelas" required>
                    <div class="text-kuota d-none">
                        Harap isi kuota kelas
                    </div>

                </form>
            </div>
        </div>
        <div class="modal-footer">
                <button class="btn btn-info btn-update-kuota">Update</button>
                <button class="btn btn-dark" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>


<div class="modal fade modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-kuota" aria-hidden="true">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-body">
            <div class="w-100 p-2 mb-3">

                <form class="form-tambah" action="<?php echo e(route('mentor.tambah_mapel')); ?>" method="post">

                    <?php echo csrf_field(); ?>
                    <select class="form-control" name="mapel">
                        <?php $__currentLoopData = $mapel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($m->kode_mapel); ?>"> <?php echo e($m->nama_pelajaran); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

            </div>
        </div>
        <div class="modal-footer">
                <button class="btn btn-info btn-update"><i class="fas fa-plus"></i> Tambah</button>
                <button class="btn btn-dark" data-dismiss="modal">Batal</button>
            </form>
        </div>
    </div>
    </div>
</div>

<input type="hidden" value="<?php echo e($mentor->m_ke_mp->count()); ?>" class="jumlah_mapel">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">

<style>
    .gambar {
        width: 100%;
        height: auto;
        /* min-height: 200px; */
        text-align: center;
    }
    .profil{
        width: 60%;
        text-align: center !important;
    }
    .sorting_1{
        width: 20%;
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
    $(document).ready(function () {

        $(".btn-hapus").click(function(){
            var id = $(this).attr("data-id");
            $("[name='kmp']").val(id);

            Swal.fire({
                title: 'Peringatan!',
                text: 'Seluruh data berdasarkan pelajaran ini akan dihapus keseluruhan dan tidak dapat dikembalikan!',
                type:'warning',
                confirmButtonText: "Hapus",
                confirmButtonColor: "red",
                cancelButtonColor: "#343a40",
                showCancelButton: true,
                cancelButtonText: "Batal",
                animation: false,
                customClass: {
                    popup: "animated shake"
                }
            }).then((result) => {
                if(result.value){
                    $(".form-hapus").submit();
                }
            });
        });

        $(".btn-edit").click(function(){
            var id = $(this).attr("data-id");
            var kuota = $(this).attr("data-kuota-sekarang");
            var jumlah_student = $(this).attr("data-jumah-student");

            $("[name='kmp']").val(id);
            $("[name='jumlah_student']").val(jumlah_student);
            $(".kuota").val(kuota);
            $(".modal-kuota").modal("show");
        });

        $(".btn-update-kuota").click(function(){
            var js = $("[name='jumlah_student']").val();
            var kuota = $(".kuota").val();
            if(kuota < js){
                $("#pesan_error").html("Kuota tidak boleh dibawah jumlah student saat ini!").show().fadeOut("slow");
                return false;
            }else{
                $(".form-kuota").submit();
            }
        });

        $(".kuota").keypress(function(e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#pesan_error").html("Hanya Angka!").show().fadeOut("slow");
                return false;
            }
        });

        $(".btn-tambah").click(function(){
            $(".modal-tambah").modal("show");
        });

        // var kode = $(".tab-content .tab-pane:first-child").attr("data-id");
        // var jumlah_mapel = $(".jumlah_mapel").val();

        // for(var a = 0; a < jumlah_mapel; a++){
        //     $("#tabel-" + kode).DataTable();
        // }

        $(".btn-keluarkan").click(function(){
            var kode = $(this).attr("data-id");

            Swal.fire({
                title: 'Peringatan!',
                text: 'Seluruh data berdasarkan student ini akan dihapus keseluruhan dan tidak dapat dikembalikan!',
                type:'warning',
                confirmButtonText: "Keluarkan",
                confirmButtonColor: "red",
                cancelButtonColor: "#343a40",
                showCancelButton: true,
                cancelButtonText: "Batal",
                animation: false,
                customClass: {
                    popup: "animated shake"
                }
            }).then((result) => {
                if(result.value){
                    $(".form-keluarkan-" + kode).submit();
                }
            });
        });

        $("#nav-tab .nav-item:first-child").addClass("active");
        $(".tab-content .tab-pane:first-child").addClass("active show");

        $(".btn-kuota").click(function(){
            var kuota = $(this).attr("data-id");
            $(".modal-kuota").modal("show");
            $(".input-kuota").val(kuota);
        });

        $(".btn-update").click(function(){
            var kuota = $(".input-kuota").val();
            if(kuota == ""){
                $(this).addClass("is-invalid");
            }else{
                $(".form-kuota").submit();
            }
        });

        $("#tabel").DataTable();

        $(".btn-delete").click(function () {

            var id = $(this).attr("data-id");
            Swal.fire({
                title: 'Apakah anda yakin',
                text: "Seluruh data anda yang terkait dengan murid ini akan dihapus seluruhnya! Data anda tidak dapat dikembalikan!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Keluarkan!',
                }).then((result) => {
                if (result.value) {
                    $(".form-keluar-" + id).submit();
                }
            });

    });
});

</script>

<?php if($pesan_hapus = Session::get('berhasil_unfollow')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda berhasil mengeluarkan seorang murid!',
        'success'
    )

</script>
<?php endif; ?>

<?php if(Session::has('berhasil_update_kuota')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Berhasil update jumlah kuota kelas!',
        'success'
    )

</script>
<?php endif; ?>

<?php if(Session::has('berhasil_dikeluarkan')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Berhasil mengeluarkan murid!',
        'success'
    )

</script>
<?php endif; ?>


<?php if(Session::has('gagal_update_kuota')): ?>
<script>
    Swal.fire({
        title: 'Gagal!',
        text: 'Kuota kelas tidak boleh kurang dari jumlah murid yang sedang mengikuti anda!',
        type:'error',
        confirmButtonText: "Mengerti",
        confirmButtonColor: "#343a40",
        animation: false,
        customClass: {
            popup: "animated shake"
        }
    }
    )

</script>
<?php endif; ?>


<?php if(Session::has('berhasil_mp')): ?>
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Berhasil menghapus kelas!',
        type:'success',
        confirmButtonText: "Mengerti",
        confirmButtonColor: "#343a40",
        animation: false,
        customClass: {
            popup: "animated jello"
        }
    }
    )

</script>
<?php endif; ?>

<?php if(Session::has('sudah_ada')): ?>
<script>
    Swal.fire({
        title: 'Gagal!',
        text: 'Kelas telah diambil!',
        type:'error',
        confirmButtonText: "Mengerti",
        confirmButtonColor: "#343a40",
        animation: false,
        customClass: {
            popup: "animated shake"
        }
    }
    )

</script>
<?php endif; ?>

<?php if(Session::has('berhasil_tambah')): ?>
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Kelas ditambah!',
        type:'success',
        confirmButtonText: "Oke",
        confirmButtonColor: "#343a40",
        animation: false,
        customClass: {
            popup: "animated jello"
        }
    }
    )

</script>
<?php endif; ?>

<?php if(Session::has('pelajaran_dihapus')): ?>
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Kelas dihapus!',
        type:'success',
        confirmButtonText: "Oke",
        confirmButtonColor: "#343a40",
        animation: false,
        customClass: {
            popup: "animated jello"
        }
    }
    )

</script>
<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('mentor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/TA/mozart-elearning/resources/views/mentor/pages/student/index.blade.php ENDPATH**/ ?>