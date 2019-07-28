@extends('mentor.layouts.app')


@section('main-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <div class="col text-right mb-3 mt-3">

        <button class="btn btn-dark btn-tambah"> <i class="fab fa-leanpub"></i> Tambah mata pelajaran</button>
        {{-- <button class="btn btn-info btn-edit-kuota" data-toggle="modal" data-target="#modal-edit-kuota"><i class="fas fa-book"></i> Edit Kuota Kelas</button> --}}

    </div>
    {{-- data-target="#modal-pelajaran" data-toggle="modal" --}}
<!-- DataTales Exame -->
<div class="card shadow mb-4 animated bounceInDown">
    <div class="card-header py-3 text-center">
        <h6 class="m-0 font-weight-bold text-primar bounce animated">Tabel pelajaran</h6>
    </div>
    <div class="card-body">

            <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach ($mentor->m_ke_mp as $m)
                            <button class="nav-item nav-link" href="#nav-{{ $m->kode_mentor_pelajaran }}" id="nav-{{ $m->kode_mentor_pelajaran }}-tab" data-toggle="tab" role="tab" > {{ $m->mp_ke_mapel->nama_pelajaran }}</button>
                        @endforeach
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                        @foreach ($mentor->m_ke_mp as $m)
                            <div class="tab-pane fade" id="nav-{{ $m->kode_mentor_pelajaran }}" role="tabpanel" aria-labelledby="nav-{{ $m->kode_mentor_pelajaran }}-tab">

                                <p class="p-2">Jumlah murid saat ini = {{ $m->mp_ke_ms->count() }} / {{ $m->kuota }}</p>
                                <div class="container p-3 text-center">
                                    {{-- <a href="#" data-id="{{ $m->mentor_ke_mapel->kode_mapel }}" class="btn btn-outline-success btn-excel"><i class="fas fa-file-excel"></i> EXCEL</a> --}}
                                    <button data-id="{{ $m->kode_mentor_pelajaran }}" data-nama="{{ $m->mp_ke_mapel->nama_pelajaran }}" class="btn btn-outline-danger btn-hapus-pelajaran animated bounceInUp"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    <button data-id="{{ $m->kode_mentor_pelajaran }}" class="btn btn-outline-secondary btn-edit animated bounceInUp"><i class="fas fa-edit"></i> Edit kuota</button>

                                    <form class="form-hapus-{{ $m->kode_mentor_pelajaran }}" action="{{ route('mentor.hapus_mapel', $m->kode_mentor_pelajaran) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="kmp" value="{{ $m->kode_mentor_pelajaran }}">
                                    </form>

                                    <div class="edit-kuota-{{ $m->kode_mentor_pelajaran }} edit-kuota p-2">

                                            <form class="form-group form-update-kuota-{{ $m->kode_mentor_pelajaran }}" action="{{ route('mentor.edit_kuota') }}" method="POST">
                                                @csrf
                                                {{-- <input type="hidden" value="{{  }}" name="js" class="jumlah-kuota-{{ $m->kode_mentor_pelajaran }}" data-kuota="{{ $m->kuota }}"> --}}
                                                <input type="hidden" value="{{ $m->mp_ke_ms->count() }}" name="jsc" class="jsc-{{ $m->kode_mentor_pelajaran }}" data-jsc="{{ $m->mp_ke_ms->count() }}">
                                                <div class="form-group justify-content-center">
                                                    <input type="hidden" name="kode_mp" value="{{ $m->kode_mentor_pelajaran }}">
                                                    <label for="exampleInputEmail1">Kuota</label><br>
                                                    <span id="pesan_error-{{ $m->kode_mentor_pelajaran }}" class="text-danger"></span>
                                                    <input type="number" name="kuota_baru" data-id="{{ $m->kode_mentor_pelajaran }}" min="{{ $m->mp_ke_ms->count() }}" max="150" value="{{ $m->kuota }}" class="form-control text-center w-100 kuota-baru-{{ $m->kode_mentor_pelajaran }}" aria-describedby="emailHelp">
                                                </div>
                                                <button type="button" class="btn btn-primary btn-update-kuota" data-id="{{ $m->kode_mentor_pelajaran }}"><i class="fas fa-upload"></i> Update</button>
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
                                                    <td>{{ $m->mp_ke_ms->count() }} Murid</td>
                                                    <td>{{ $m->mp_ke_materi->count() }} Materi</td>
                                                    <td>{{ $m->mp_ke_js->count()}}</td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
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
                    @csrf
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

                    <form class="form-group" method="post" action="{{ route('mentor.tambah_mapel') }}">
                        @csrf
                        <div class="form-group w-100">
                            <br>
                                <select name="mapel" class="form-control">
                                    @foreach ($mapel as $mp)
                                        <option value="{{ $mp->kode_mapel }}">{{ $mp->nama_pelajaran }}</option>
                                    @endforeach
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



@endsection

@section('scriptcss')

<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
.edit-kuota{
    display: none;
}
</style>

@endsection

@section('scriptjs')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
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
        //         $(".form-update").attr("action", "{{ url('mentor/pelajaran/update/kuota/') }}" + "/" + kode_mapel);
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
        //     $(".form-update-kuota").attr("action", "{{ url('mentor/pelajaran/update/kuota/') }}" + "/" + id);
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
    //         url: "{{ url('/mentor/pelajaran/ambil_data') }}",
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
    //             url: "{{ url('/mentor/pelajaran/ambil_data') }}",
    //             data: {
    //                 kode_mapel: kode_mapel
    //             },
    //             success: function(hasil){
    //                 $(".btn-pdf").attr("href", "{{ url('mentor/pelajaran/cetak') }}" + "/" + kode_mapel);

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
    //                         url: "{{ url('mentor/pelajaran/hapus/') }}" + "/" + id,
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
{{--
@if(Session::get('berhasil_tambah_mapel'))
<script>
    Swal.fire(
        'Berhasil!',
        "berhasil menambahkan mata pelajaran",
        'success'
    )

</script>
@endif

@if(Session::get('pelajaran_dihapus'))
<script>
    Swal.fire(
        'Berhasil!',
        "berhasil menghapus mata pelajaran",
        'success'
    )

</script>
@endif

@if(Session::has('berhasil_update_mapel'))
<script>
    Swal.fire(
        'Berhasil!',
        "berhasil mengupdate mata pelajaran",
        'success'
    )

</script>
@endif
@if(Session::has('pelajaran_kosong'))
<script>
    Swal.fire({
        title: "Tambah Mata Pelajaran",
        text: "Sebelum anda melanjutkan, anda diharuskan menambahkan minimal 1 mata pelajaran",
        type: "warning",
        showCancelButton: false,
        showConfirmButton: true,
        confirmButtonText: "Mengerti",
        animation: false,
        customClass: {
            popup: "animated bounce"
        }
    });
</script>
{{Session::forget("pelajaran_kosong")}}
@endif --}}

@if(Session::get('pelajaran_dihapus'))
<script>
    Swal.fire(
        'Berhasil!',
        "berhasil menghapus mata pelajaran",
        'success'
    )

</script>
@endif

@if(Session::has('kuota_berhasil'))
<script>
    Swal.fire(
        'Berhasil!',
        "berhasil mengupdate kuota",
        'success'
    )

</script>
@endif


@if(Session::has('sudah_ada'))
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
@endif



@endsection