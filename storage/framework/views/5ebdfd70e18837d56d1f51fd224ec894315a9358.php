<?php $__env->startSection('main-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
            class="badge badge-danger">mengeluarkan</span> murid anda.</p>
    <div class="col text-right mb-3 mt-3">


    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
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

            <input type="hidden" value="<?php echo e($mentor->m_ke_mp->count()); ?>" name="jumlah_materi">
            <div class="tab-content" id="nav-tabContent">
                <?php $__currentLoopData = $mentor->m_ke_mp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_key => $m_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade p-2" id="nav-<?php echo e($m_value->kode_mentor_pelajaran); ?>" role="tabpanel" aria-labelledby="nav-<?php echo e($m_value->kode_mentor_pelajaran); ?>-tab">
                        <div class="w-100 text-center m-2">
                            <form action="<?php echo e(route('mentor.tambah_materi')); ?>" class="form" method="get">
                                    <input type="hidden" name="kode_mapel" value="<?php echo e($m_value->kode_mapel); ?>">
                                    <input type="hidden" name="kmp" value="<?php echo e($m_value->kode_mentor_pelajaran); ?>">
                                
                                <button type="submit" class="btn btn-dark text-right"><i class="fas fa-plus"></i> Tambah materi</button>
                            </form>
                            
                        </div>

                            <div class="table-responsive w-100">
                                <table class="table table-bordered" id="tabel-<?php echo e($m_key); ?>" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align:center;">
                                            <th>Cover</th>
                                            <th>Judul Materi</th>
                                            <th>Materi</th>
                                            <th>Pelajaran</th>
                                            <th>Dibuat</th>
                                            <th>Terakhir Update</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $m_value->mp_ke_materi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-center">
                                                <td>
                                                    <div class="p-1 cover">
                                                        <img src="<?php echo e(url('/images/cover_materi/'.$m2->cover)); ?>" class="gambar border-secondary border w-100 border-0">
                                                    </div>
                                                </td>
                                                <td><?php echo e($m2->judul_materi); ?></td>
                                                <td>
                                                    <button class="btn btn-info btn-lihat" data-id="<?php echo e($m2->kode_materi); ?>"><i class="fas fa-eye"></i> Lihat materi</button>
                                                    <div class="m-1"></div>
                                                    <a href="<?php echo e(route('mentor.download_materi', $m2->kode_materi)); ?>" target="_blank" class="btn btn-success btn-cetak"><i class="fas fa-file-pdf"></i> Cetak Materi<br><small>Video tidak akan tampil</small></a>
                                                </td>
                                                <td><?php echo e($m2->mapel_ke_materi->nama_pelajaran); ?></td>
                                                <td><?php echo e($m2->dibuat); ?></td>
                                                <td><?php echo e($m2->diupdate); ?></td>
                                                <td>
                                                    <div class="p-1">
                                                        <a class="btn btn-warning" href="<?php echo e(route('mentor.edit_materi', $m2->kode_materi)); ?>"><i class="fas fa-edit"></i> edit</a>
                                                        <button class="btn btn-danger btn-hapus" data-id="<?php echo e($m2->kode_materi); ?>"><i class="fas fa-edit"></i> hapus</button>
                                                    </div>
                                                    <form class="form-hapus-<?php echo e($m2->kode_materi); ?>" action="<?php echo e(route('mentor.hapus_materi')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="kode_materi">
                                                    </form>
                                                </td>
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



<div class="modal fade modal-materi" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h5 class="modal-title"
                        style="font-size: 15px; text-align:center; font-weight:bold; text-transform:capitalize;"></h5>
                </div>
                <button type="button" class="close btn-tutup" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body isi-materi">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-tutup" data-dismiss="modal">Tutup</button>

            </div>
        </div>
    </div>
</div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>

<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<style>
    .container-hapus:hover, .container-edit:hover{
        background-color: ivory;
        cursor: pointer;
    }

    .gambar{
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

        $(".nav-tabs .nav-item:first-child").addClass("active");
        $(".tab-content .tab-pane:first-child").addClass("active show");

        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function() {
        readURL(this);
    });


        for(var c = 0; c < $("[name='jumlah_materi']").val(); c++){
            $("#tabel-" + c).DataTable();
        }

        $(".btn-lihat").click(function(){
            var id = $(this).attr("data-id");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "<?php echo e(url('mentor/materi/ambildata')); ?>" + "/" + id,
                data: {
                    kode_materi: id
                },
                success:function(hasil){
                    $(".modal-title").text("");
                    $(".isi-materi").html("");
                    $(".modal-title").text(hasil.judul_materi);
                    $(".isi-materi").html(hasil.materi);
                }
            });
        });

        $(".btn-hapus").click(function(){

            var id = $(this).attr("data-id");
            $("[name='kode_materi']").val(id);

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data materi tidak akan bisa dikembalikan!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#343a40',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        $(".form-hapus-"+id).submit();
                    }
                })
        });

        $(".btn-edit").click(function(){
            var id = $(this).attr("data-id");

            console.log(id);

            $(".form-edit-" + id).submit();

        });

        $('#tabel').DataTable();

        $(".btn-lihat").click(function () {
            var judul = $(this).attr("data-judul");
            var materi = $(this).attr("data-materi");
            $(".modal-dialog").removeClass("modal-xs");
            $(".modal-materi").modal({ backdrop: "static" });
            $(".modal-title").append(judul);
            $(".modal-body").append(materi);
        });
        $(".btn-tutup").click(function () {
            $(".modal-title").text("");
            $(".modal-body").text("");
        });
    });
</script>

<?php if(Session::get('success_upload_materi')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah menambahkan materi baru!',
        'success'
    )
</script>
<?php endif; ?>

<?php if(Session::get('success_update_materi')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah mengupdate materi!',
        'success'
    )
</script>
<?php endif; ?>

<?php if(Session::get('hapus_materi')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah menghapus materi!',
        'success'
    )
</script>


<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mentor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/TA/mozart-elearning/resources/views/mentor/pages/materi/daftar_materi.blade.php ENDPATH**/ ?>