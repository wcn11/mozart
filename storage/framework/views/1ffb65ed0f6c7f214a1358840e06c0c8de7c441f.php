<?php $__env->startSection('main-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span class="badge badge-danger">mengeluarkan</span> murid anda.</p>
    <div class="col text-right mb-3 mt-3">

        
    </div>


    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <?php $__currentLoopData = $mentor->m_ke_mp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_key => $m_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="nav-item nav-link" id="nav-<?php echo e($m_value->kode_mentor_pelajaran); ?>-tab" data-toggle="tab" href="#nav-<?php echo e($m_value->kode_mentor_pelajaran); ?>"><?php echo e($m_value->mp_ke_mapel->nama_pelajaran); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent p-4">
          <?php $__currentLoopData = $mentor->m_ke_mp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_key => $m_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="tab-pane fade" id="nav-<?php echo e($m_value->kode_mentor_pelajaran); ?>" role="tabpanel">

                <div class="p-2 text-center">
                    <button type="button" class="btn btn-info btn-buat-soal m-3" data-id="<?php echo e($m_value->kode_mentor_pelajaran); ?>"><i class="fas fa-plus"></i> Buat soal</button>
                </div>

                <div class="card shadow mb-4 form-buat-soal">

                        <div class="card-body">
                            <div class="table-responsive w-100" style="overflow:hidden;">


                                <form class="form form-tambah-soal-<?php echo e($m_value->kode_mentor_pelajaran); ?>" action="<?php echo e(route('mentor.question_create_title')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="kode_mentor_pelajaran" value="<?php echo e($m_value->kode_mentor_pelajaran); ?>">
                                    <div class="form-group">
                                        <label for="judul">Judul Soal<span class="text-danger">*</span></label>
                                        <input type="text" name="judul" class="form-control judul-<?php echo e($m_value->kode_mentor_pelajaran); ?>" value="<?php echo e(old('judul')); ?>" placeholder="contoh : Quiz pengenalan ekologi sistem pangan" required>
                                        <div class="invalid-feedback invalid-judul">
                                                Harap isi judul soal.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kode_mapel">Mata Pelajaran<span class="text-danger">*</span></label>
                                        <br>
                                        <span class="badge badge-success p-2"><?php echo e($m_value->mp_ke_mapel->nama_pelajaran); ?></span>
                                        <input type="hidden" name="kode_mapel" value="<?php echo e($m_value->kode_mapel); ?>" class="kode_mapel-<?php echo e($m_value->kode_mentor_pelajaran); ?>">

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jumlah soal<span class="text-danger">*</span></label>
                                        <span id="pesan_error" class="text-danger"></span>
                                        <input type="number" name="jumlah_soal" class="form-control jumlah_soal-<?php echo e($m_value->kode_mentor_pelajaran); ?>" min="5" max="20" value="5" id="jumlah_soal">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Waktu mengerjakan<span class="text-danger">*</span></label>
                                        <span id="pesan_error_waktu" class="text-danger"></span>
                                        <br>
                                        <p class="font-italic text-grey">Masukkan Waktu, Tanggal mulai dan batas waktu</p>

                                        <div class="row">
                                            <div class="input-group mb-2 col-xs-12 col-sm-6 col-md-3" data-toggle="tooltip" data-placement="top" title="Tanggal mulai">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-info text-white"> <i class="fas fa-calendar-alt"></i></div>
                                                </div>
                                                <input type="date" name="tanggal_mulai" class="form-control tanggal_mulai-<?php echo e($m_value->kode_mentor_pelajaran); ?>" placeholder="tanggal mulai" required><br>

                                            </div>

                                            <div class="input-group mb-2 col-xs-12 col-sm-6 col-md-3" data-toggle="tooltip" data-placement="top" title="Jam mulai">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-info text-white"> <i class="fas fa-clock"></i></div>
                                                </div>
                                                <input type="text" name="jam_mulai" class="form-control clockpicker jam_mulai-<?php echo e($m_value->kode_mentor_pelajaran); ?>" data-placement="bottom" placeholder="waktu mulai" data-autoclose="true" readonly required>
                                            </div>

                                            <div class="input-group mb-2 col-xs-12 col-sm-6 col-md-3" data-toggle="tooltip" data-placement="top" title="Tanggal selesai">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-info text-white"> <i class="fas fa-calendar-day"></i></div>
                                                </div>
                                                <input type="date" name="tanggal_selesai" class="form-control tanggal_selesai-<?php echo e($m_value->kode_mentor_pelajaran); ?>" placeholder="tanggal selesai" required>
                                            </div>

                                            <div class="input-group mb-2 col-xs-12 col-sm-6 col-md-3" data-toggle="tooltip" data-placement="top" title="Jam selesai">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-info text-white"> <i class="fas fa-stopwatch"></i></div>
                                                </div>
                                                <input type="text" name="jam_selesai" class="form-control clockpicker jam_selesai-<?php echo e($m_value->kode_mentor_pelajaran); ?>" data-placement="bottom" placeholder="waktu selesai" data-autoclose="true" readonly required>
                                            </div>
                                        </div>
                                        <button class="btn btn-info btn-tambah-soal" type="button" data-id="<?php echo e($m_value->kode_mentor_pelajaran); ?>"><i class="fas fa-plus"></i> submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tabel-<?php echo e($m_key); ?>">
                        <thead>
                            <tr style="text-align:center;">
                                <th>Judul</th>
                                <th>Pelajaran</th>
                                <th><sup>Jumlah </sup>Soal</th>
                                <th><sup>Tanggal </sup>Mulai</th>
                                <th><sup>Tanggal </sup>Selesai</th>
                                <th>Dibuat</th>
                                <th>Diupdate</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $m_value->mp_ke_js; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mpks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-center">
                                    <td><?php echo e($mpks->judul); ?></td>
                                    <td><?php echo e($mpks->mapel_ke_soal->nama_pelajaran); ?></td>
                                    <td><?php echo e($mpks->jumlah_soal); ?></td>
                                    <td><?php echo e($mpks->tanggal_mulai); ?></td>
                                    <td><?php echo e($mpks->tanggal_selesai); ?></td>
                                    <td><?php echo e($mpks->dibuat); ?></td>
                                    <td><?php echo e($mpks->diupdate); ?></td>
                                    <td>
                                        <a class="btn btn-warning btn-edit" href="<?php echo e(route('mentor.soal_edit',$mpks->kode_judul_soal)); ?>"><i class="fas fa-eye"></i> edit</a>
                                        <button class="btn btn-danger btn-hapus" data-id="<?php echo e($mpks->kode_judul_soal); ?>"><i class="fas fa-trash"></i> hapus</button>
                                        <button class="btn btn-success btn-modal-edit-judul" data-id="<?php echo e($mpks->kode_judul_soal); ?>"><i class="fas fa-tint-slash"></i> edit judul</button>
                                        <form action="<?php echo e(route('mentor.hapus_soal', $mpks->kode_judul_soal)); ?>" class="form-hapus-<?php echo e($mpks->kode_judul_soal); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
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





<div class="modal fade bd-example-modal-xl modal-hapus" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title"
                        style="font-size: 15px; text-align:center; font-weight:bold; text-transform:capitalize;"></h5>
                </div>
                <button type="button" class="close btn-tutup" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus soal ini ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-konfirmasi"
                    onclick="event.preventDefault();document.getElementById('form-hapus').submit();"
                    data-dismiss="modal">Hapus</button>
                <button type="button" class="btn btn-info btn-tutup" data-dismiss="modal">Tutup</button>
                <form id="form-hapus" action="#" method="post">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    </div>
</div>



    <div class="modal fade modal-edit-judul" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header judul-edit">
              </div>
              <div class="modal-body">

            <form class="form form-update-judul" action="<?php echo e(route('mentor.question_update_title')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="kode_judul_soal">
                        <div class="form-group">
                            <label for="judul">Judul Soal<span class="text-danger">*</span></label>
                            <input type="text" name="judul_update" class="form-control" required>
                            <div class="invalid-feedback invalid-judul">
                                    Harap isi judul soal.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kode_mapel">Mata Pelajaran<span class="text-danger">*</span></label>
                            <select class="form-control" name="kode_mentor_pelajaran_update"  value="<?php echo e(old('kode_mapel_update')); ?>" required>
                                <?php $__currentLoopData = $mentor->m_ke_mp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($p->kode_mentor_pelajaran); ?>"><?php echo e($p->mp_ke_mapel->nama_pelajaran); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah soal<span class="text-danger">*</span></label>
                            <span id="pesan_error" class="text-danger"></span>
                            <input type="number" name="jumlah_soal_update" readonly class="form-control" min="5" max="20" value="5" id="jumlah_soal">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Waktu mengerjakan<span class="text-danger">*</span></label>
                            <span id="pesan_error_waktu" class="text-danger"></span>
                            <br>
                            <p class="font-italic text-grey">Masukkan Waktu, Tanggal mulai dan batas waktu</p>

                            <div class="row">
                                <div class="input-group mb-2 col-xs-12 col-sm-6 col-md-3" data-toggle="tooltip" data-placement="top" title="Tanggal mulai">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-info text-white"> <i class="fas fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="date" name="tgl_mulai_update" class="form-control" placeholder="tanggal mulai" required>

                                </div>

                                <div class="input-group mb-2 col-xs-12 col-sm-6 col-md-3" data-toggle="tooltip" data-placement="top" title="Jam mulai">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-info text-white"> <i class="fas fa-clock"></i></div>
                                    </div>
                                    <input type="text" name="jam_mulai_update" class="form-control clockpicker" data-placement="bottom" placeholder="waktu mulai" data-autoclose="true" readonly required>
                                </div>

                                <div class="input-group mb-2 col-xs-12 col-sm-6 col-md-3" data-toggle="tooltip" data-placement="top" title="Tanggal selesai">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-info text-white"> <i class="fas fa-calendar-day"></i></div>
                                    </div>
                                    <input type="date" name="tanggal_selesai_update" class="form-control" placeholder="tanggal selesai" required>
                                </div>

                                <div class="input-group mb-2 col-xs-12 col-sm-6 col-md-3" data-toggle="tooltip" data-placement="top" title="Jam selesai">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-info text-white"> <i class="fas fa-stopwatch"></i></div>
                                    </div>
                                    <input type="text" name="jam_selesai_update" class="form-control clockpicker" data-placement="bottom" placeholder="waktu selesai" readonly data-autoclose="true" required>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-info text-right btn-update-title">Update</button>
                    </form>
                </div>
          </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>

<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/jquery-clockpicker.min.css')); ?>" rel="stylesheet">
<style>
    .clockpicker-popover{
        z-index: 9999;
    }

    .form-control:disabled, .form-control[readonly] {
	background-color: white;
	opacity: 1;
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
<script src="<?php echo e(asset('js/jquery-clockpicker.min.js')); ?>"></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker(
        // {
        // afterHide: function() {
        //         console.log($("[name='jam_mulai']").val());
        //     }
        // }
    );
    </script>
<script>

    $(document).ready(function() {

        var jumlah_soal = $("[name='jumlah_soal']").val();

        for(var e = 0; e < jumlah_soal; e++){
            $("#tabel-"+ e).DataTable();
        }

        $(".nav-tabs .nav-item:first-child").addClass("active");
        $(".tab-content .tab-pane:first-child").addClass("active show");

        $(".btn-update-title").click(function(){

            var judul = $("[name='judul_update']").val();
            var tanggal_mulai = $("[name='tgl_mulai_update']").val();
            var tanggal_selesai = $("[name='tanggal_selesai_update']").val();
            var jam_mulai = $("[name='jam_mulai_update']").val();
            var jam_selesai = $("[name='jam_selesai_update']").val();

            if(judul == ""){
                $($("[name='judul_update']")).addClass("is-invalid");

                Swal.fire({
                    title: "Judul Kosong",
                    text: "Harap tetapkan judul soal!",
                    showConfirmButton: true,
                    showCancelButton: false,
                    confirmButtonText: "Mengerti",
                    confirmButtonColor: "#dc3545",
                    type: "warning",
                    animation: false,
                    customClass: {
                        popup: "animated shake"
                    }
                });

                }else if(tanggal_mulai == ""){

                    $($("[name='tgl_mulai_update']")).addClass("is-invalid");
                    Swal.fire({
                        title: "Tanggal Mulai Kosong",
                        text: "Harap tetapkan tanggal mulai soal!",
                        showConfirmButton: true,
                        showCancelButton: false,
                        confirmButtonText: "Mengerti",
                        confirmButtonColor: "#dc3545",
                        type: "warning",
                        animation: false,
                        customClass: {
                            popup: "animated shake"
                        }
                    });

                }else if(tanggal_selesai == ""){
                    $($("[name='tanggal_selesai_update']")).addClass("is-invalid");
                    Swal.fire({
                        title: "Tanggal Selesai Kosong",
                        text: "Harap tetapkan tanggal selesai soal!",
                        showConfirmButton: true,
                        showCancelButton: false,
                        confirmButtonText: "Mengerti",
                        confirmButtonColor: "#dc3545",
                        type: "warning",
                        animation: false,
                        customClass: {
                            popup: "animated shake"
                        }
                    });

                }else if(jam_mulai == ""){

                    $($("[name='jam_mulai_update']")).addClass("is-invalid");

                    Swal.fire({
                        title: "Jam Mulai Kosong",
                        text: "Harap tetapkan jam mulai soal!",
                        showConfirmButton: true,
                        showCancelButton: false,
                        confirmButtonText: "Mengerti",
                        confirmButtonColor: "#dc3545",
                        type: "warning",
                        animation: false,
                        customClass: {
                            popup: "animated shake"
                        }
                    });

                }else if(jam_selesai == ""){

                    $($("[name='jam_selesai_update']")).addClass("is-invalid");
                    Swal.fire({
                        title: "Jam Selesai Kosong",
                        text: "Harap tetapkan jam selesai soal!",
                        showConfirmButton: true,
                        showCancelButton: false,
                        confirmButtonText: "Mengerti",
                        confirmButtonColor: "#dc3545",
                        type: "warning",
                        animation: false,
                        customClass: {
                            popup: "animated shake"
                        }
                    });

            }else{
                $($("[name='judul_update']")).removeClass("is-invalid");
                $(".form-update-judul").submit();
            }
        });

        $(".btn-tambah-soal").click(function(){
            var kode = $(this).attr("data-id");
            var judul = $(".judul-" + kode).val();
            var jam_mulai = $(".jam_mulai-" + kode).val();
            var jam_selesai = $(".jam_selesai-" + kode).val();
            var tanggal_mulai = $(".tanggal_mulai-" + kode).val();
            var tanggal_selesai = $(".tanggal_selesai-" + kode).val();

            //cek jika field masih kosong
            if(jam_mulai == ""){
                $("[name='jam_mulai']").addClass("is-invalid");
                Swal.fire({
                    title: "Jam Mulai Kosong",
                    text: "Harap tetapkan jam mulai soal!",
                    showConfirmButton: true,
                    showCancelButton: false,
                    confirmButtonText: "Mengerti",
                    confirmButtonColor: "#dc3545",
                    type: "warning",
                    animation: false,
                    customClass: {
                        popup: "animated shake"
                    }
                });

            }else if(jam_selesai == ""){
                $("[name='jam_selesai']").addClass("is-invalid");
                Swal.fire({
                    title: "Jam Selesai Kosong",
                    text: "Harap tetapkan jam selesai soal!",
                    showConfirmButton: true,
                    showCancelButton: false,
                    confirmButtonText: "Mengerti",
                    confirmButtonColor: "#dc3545",
                    type: "warning",
                    animation: false,
                    customClass: {
                        popup: "animated shake"
                    }
                });

            }else if(judul == ""){
                $("[name='judul']").addClass("is-invalid");
                Swal.fire({
                    title: "Judul Soal Kosong",
                    text: "Harap isi judul soal!",
                    showConfirmButton: true,
                    showCancelButton: false,
                    confirmButtonText: "Mengerti",
                    confirmButtonColor: "#dc3545",
                    type: "warning",
                    animation: false,
                    customClass: {
                        popup: "animated shake"
                    }
                });
            }else if(tanggal_mulai == ""){
                $("[name='tanggal_mulai']").addClass("is-invalid");
                Swal.fire({
                    title: "Tanggal Mulai Kosong",
                    text: "Harap isi tanggal mulai soal!",
                    showConfirmButton: true,
                    showCancelButton: false,
                    confirmButtonText: "Mengerti",
                    confirmButtonColor: "#dc3545",
                    type: "warning",
                    animation: false,
                    customClass: {
                        popup: "animated shake"
                    }
                });
            }else if(tanggal_selesai == ""){
                $("[name='tanggal_selesai']").addClass("is-invalid");
                Swal.fire({
                    title: "Tanggal Selesai Kosong",
                    text: "Harap isi tanggal selesai soal!",
                    showConfirmButton: true,
                    showCancelButton: false,
                    confirmButtonText: "Mengerti",
                    confirmButtonColor: "#dc3545",
                    type: "warning",
                    animation: false,
                    customClass: {
                        popup: "animated shake"
                    }
                });
            }else{
                $("[name='jam_mulai']").removeClass("is-invalid");
                $("[name='jam_selesai']").removeClass("is-invalid");
                $("[name='judul']").removeClass("is-invalid");
                $("[name='tanggal_mulai']").removeClass("is-invalid");
                $("[name='tanggal_selesai']").removeClass("is-invalid");
                $(".form-tambah-soal-" + kode).submit();
            }
        });

        $(".btn-modal-edit-judul").click(function(){
            var id = $(this).attr("data-id");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "<?php echo e(url('mentor/soal/datapersoal')); ?>",
                data: {
                    id: id
                },
                success: function(hasil){
                    $("[name='kode_judul_soal']").val(hasil.kode_judul_soal);
                    $(".judul-edit").text(hasil.judul);
                    $("[name='judul_update']").val(hasil.judul);
                    $("[value='" + hasil.kode_mentor_pelajaran +"']").attr("selected", "selected");
                    $("[name='kode_mapel_update']").val(hasil.kode_mentor_pelajaran);
                    $("[name='jumlah_soal']").val(hasil.jumlah_soal);
                    $("[name='tgl_mulai_update']").val(hasil.tanggal_mulai.substring(0, 10));
                    $("[name='tanggal_selesai_update']").val(hasil.tanggal_selesai.substring( 0, 10));
                    $("[name='jam_mulai_update']").val(hasil.tanggal_mulai.substring(11, 16));
                    $("[name='jam_selesai_update']").val(hasil.tanggal_selesai.substring(11, 16));
                    $(".modal-edit-judul").modal("show");
                }
            });
        });

        // $("[name='tanggal_mulai']").on("change", function(){
        //     var tanggal_mulai = $("[name='tanggal_mulai']").val();
        //     var tahun = tanggal_mulai.substring(0,4);
        //     var bulan = tanggal_mulai.substring(5,7);
        //     var hari = tanggal_mulai.substring(8,11);
        //     $(this).val(tahun);
        // });

        $('[data-toggle="tooltip"]').tooltip()

        $('#tabel').DataTable();

        $(".form-buat-soal").hide();

        $("#jumlah_soal").keypress(function(e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#pesan_error").html("Hanya Angka!").show().fadeOut("slow");
                return false;
            }
        });

        $("#jumlah_waktu").keypress(function(e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#pesan_error_waktu").html("Hanya Angka!").show().fadeOut("slow");
                return false;
            }
        });

        $(".btn-buat-soal").click(function() {
            $(".form-buat-soal").toggle(1000);
            $(this).addClass("btn-buat-soal-tutup");
        });

        $(".btn-hapus").click(function(){
            var id = $(this).attr("data-id");
            // $("[name='kode_js']").val("");
            // $("[name='kode_js']").val(id);
            // $(".form-hapus").attr("href", "<?php echo e(url('mentor/soal/hapus/')); ?>" + "/" + id);
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Seluruh data terhadap soal ini akan terhapus!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus!'
                }).then((result) => {
                if (result.value) {
                    $(".form-hapus-" + id).submit();
                }
                });
        });

    });
</script>

<?php if(Session::get('berhasil_update_judul')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'berhasil mengupdate judul soal!',
        'success'
    )

</script>
<?php endif; ?>

<?php if(Session::get('hapus_soal')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah berhasil menghapus soal!',
        'success'
    )

</script>
<?php endif; ?>

<?php if(Session::get('buat_soal')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah berhasil menambahkan soal!',
        'success'
    )

</script>
<?php endif; ?>

<?php if(Session::get('update_soal')): ?>
<script>
    Swal.fire(
        'Berhasil!',
        'Berhasil update soal!',
        'success'
    )
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mentor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/TA/mozart-elearning/resources/views/mentor/pages/question/index.blade.php ENDPATH**/ ?>