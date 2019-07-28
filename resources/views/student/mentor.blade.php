@extends('student.layouts.app') @section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        {{-- <h1 class="h3 mb-2 text-gray-800">Mentor yang anda ikuti</h1> --}}
        {{--  <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
                class="badge badge-danger">mengeluarkan</span> murid anda.</p>  --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-center">
                <h6 class="m-0 font-weight-bold text-dark">Pilih mentor untuk melihat daftar materi</h6>
            </div>
            <div class="card-body container-utama overflow-auto" style="min-height:390px;">
                <div class="row justify-content-center">
                    @foreach ($mentor as $m)

                    <a href="{{ route('student.mapel_mentor', $m->id_mentor) }}"><div class="flip-card p-2 m-2" data-toggle="tooltip" data-placement="top" title="{{ $m->name }}">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img class="rounded" src="{{ url('/images/'.$m->foto) }}" alt="{{ $m->name }}" style="width:100%;height:100%;">

                                    <div class="nama bg-white rounded" style="width:88%;">
                                        <p class="text-dark text-capitalize text-left m-2">{{ $m->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    @endforeach
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scriptcss')
<style>

        .nama {
            position: absolute;
            bottom: 8px;
            left: 16px;
        }
        .badge-keterangan{
            position: absolute;
            bottom: 25%;
        }

        .flip-card {
            background-color: transparent;
            width: 300px;
            height: 300px;
            perspective: 1000px;
        }

        .flip-card-inner {
            position: relative;
            width: 90%;
            height: 90%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
        }

        .flip-card-front {
            background-color: #bbb;
            color: black;
        }

        .flip-card-back {
            background-color: #2980b9;
            color: white;
            transform: rotateY(180deg);
        }
    </style>
@endsection

@section('scriptjs')
{{-- <script src="{{ asset('swatchbook/js/modernizr.custom.79639.js') }}"></script>
<script src="{{ asset('swatchbook/js/jquery.swatchbook.js') }}"></script> --}}
<script>

    $(document).ready(function(){

        $(".mentor").click(function(){
            var id = $(this).attr("data-id");

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            // $.ajax({
            //     type: "post",
            //     url: "{{ url('student/mentor/ambildata') }}",
            //     data: {
            //         id_mentor: id
            //     },
            //     success: function(hasil) {

            //         for(var i = 0; i < hasil.length; i++){
            //             $(".data-mapel").append(
            //                 "<tr>" +
            //                     "<td>" + hasil.nama_mapel-> + "</td>" +
            //                     "<td>" +
            //                         "<button class='btn btn-success'><i class='fas fa-plus'></i> Ambil kelas</button>" +
            //                     "</td>" +
            //                 "</tr>"
            //             );
            //         }
            //         $(".modal-mentor").modal("show");
            //         console.log(hasil.length);
            //     }
            // })
        });

        // $("#v-pills-tab a:first-child").addClass("show active");
        // $("#v-pills-tabContent div:first-child").addClass("show active");

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

    //     $.ajax({
    //         type: "post",
    //         url: "{{ url('student/mentor/ambildata') }}",
    //         success: function(hasil){
    //             for(var i = 0; i < hasil.length; i++){

    //                 $(".btn-ikuti-" + hasil[i]['id_mentor']).hide();
    //                 $(".badge-ikuti-" + hasil[i]['id_mentor']).hide();

    //                 $(".btn-diikuti-" + hasil[i]['id_mentor']).show();
    //                 $(".badge-diikuti-" + hasil[i]['id_mentor']).show();

    //                 $(".btn-unfollow-" + hasil[i]['id_mentor']).show();
    //             }
    //         }
    //     });

    //     $.ajax({
    //         type: "post",
    //         url: "{{ url('student/mentor/ambildatafull') }}",
    //         success: function(hasil){
    //             for(var i = 0; i < hasil.length; i++){
    //                 // console.log(hasil[i]['kuota-kini']);
    //                 $(".kuota-kini-" + hasil[i]['id_mentor']).text(hasil[i]['kuota-kini']);
    //                 if(hasil[i]['kuota-kini'] >= hasil[i]['kuota'])
    //                 {
    //                     $(".status-penuh-" + hasil[i]['id_mentor']).show();
    //                     $(".badge-penuh-" + hasil[i]['id_mentor']).show();
    //                     $(".btn-penuh-" + hasil[i]['id_mentor']).show();

    //                     $(".btn-ikuti-" + hasil[i]['id_mentor']).hide();
    //                     $(".btn-diikuti-" + hasil[i]['id_mentor']).hide();
    //                 }else{
    //                     $(".status-tersedia-" + hasil[i]['id_mentor']).show();
    //                 }
    //             }
    //         }
    //     });



    // $(".btn-unfollow").click(function(){
    //     var id_mentor = $(this).attr("data-id");
    //     var nama_mentor = $(this).attr("data-nama");
    //     Swal.fire({
    //         title: 'Apakah anda yakin?',
    //         text: 'Seluruh data pelajaran anda berdasarkan mentor "' + nama_mentor + '" akan dihapus seluruhnya dan data anda tidak dapat dikembalikan.',
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#d33',
    //         cancelButtonColor: '#343a40',
    //         confirmButtonText: '<i class="fas fa-sign-out-alt"> Berhenti mengikuti</i>',
    //         cancelButtonText: '<i class="fas fa-chalkboard-teacher"> Tetap mengikuti</i>',
    //         animation: false,
    //         customClass: {
    //             popup: "animated shake"
    //         }
    //         }).then((result) => {
    //             if (result.value) {
    //                 $(".form-unfollow-" + id_mentor).submit();
    //             }
    //         })
    // });

    // $(".thumbnail").click(function() {
    //     var id = $(this).attr("data-id");

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     $.ajax({
    //         type: "post",
    //         url: "{{ url('student/mentor/ambildata') }}",
    //         data: {
    //             id_mentor: id
    //         },
    //         success: function(hasil) {
    //             $(".modal-mentor").modal("show");
    //         }
    //     });
    });
</script>

@if (Session::has("berhasil_mengikuti"))
<script>
    Swal.fire({
        title: 'Berhasil',
        type: "success",
        text: "Anda berhasil mengikuti mentor {{ Session::get("
        berhasil_mengikuti ") }}",
        animation: false,
        customClass: {
            popup: 'animated tada'
        }
    });
</script>
@endif

@if (Session::has("berhasil_unfollow"))
<script>
    Swal.fire({
        title: 'Berhasil',
        type: "success",
        text: "Anda berhenti mengikuti mentor {{ Session::get('berhasil_unfollow') }}",
        animation: false,
        customClass: {
            popup: 'animated tada'
        }
    });
</script>
@endif
@endsection