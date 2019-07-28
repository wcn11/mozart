@extends('master.layouts.app')

@section('main-content')

    <div class="container-fluid">
        <div class="row">

                <div class="col-md-12 m-2">

                        <div class="card w-100 text-white border-0" style="">
                            <div class="card-body" style="border:1px solid green;border-radius:10px;">

                                <div class="input-group-prepend w-100 mb-2">
                                    <span class="input-group-text bg-dark text-white label-card">
                                                        <img src="https://img.icons8.com/color/48/000000/e-learning.png" class="icon-colored"> Materi</span>
                                </div><br>
                                <table id="tabel" class="table table-striped table-bordered table-hover table-bordered text-black" style="width:100%">
                                    <thead class="text-dark">
                                        <tr class="text-center">
                                            <th>Cover</th>
                                            <th>Kode Materi</th>
                                            <th>Mentor</th>
                                            <th>Pelajaran</th>
                                            <th>Judul materi</th>
                                            <th>Materi</th>
                                            <th>Dibuat</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-dark">
                                        @foreach($materi as $m)
                                        <tr>
                                            <td class="w-25"><img src="{{ url("images/cover_materi/".$m->cover) }}" class="profil rounded"></td>
                                            <td>{{ $m->kode_materi }}</td>
                                            <td>{{ $m->materi_ke_mentor["name"] }}</td>
                                            <td> {{ $m->pelajaran['nama_pelajaran'] }}
                                            </td>
                                            <td>{{ $m->judul_materi }}</td>
                                            <td>
                                                <a class="btn btn-success" href="{{ route('master.baca_materi', Crypt::encrypt($m->kode_materi)) }}"><i class="fas fa-book-reader"></i> lihat materi</a>
                                                <a class="btn btn-info" href="{{ route('mentor.download_materi', $m->kode_materi) }}"><i class="fas fa-file-pdf"></i> download<br></a>
                                            </td>
                                            <td>{{ $m->dibuat }}
                                            </td>
                                            <td>
                                                <button data-id="{{ $m->kode_materi }}" class="btn btn-danger btn-hapus"><i class="fas fa-trash"> Hapus</i></button>
                                                <form action="{{ route('master.delete_materi', $m->kode_materi) }}" method="post" class="form-{{ $m->kode_materi }}">
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>

        </div>
    </div>
@endsection

@section('scriptcss')
    <style>
    .label-card {
	border-radius: 10px;
	border: 0px;
}
.profil{
    width: 100%;
}
.col-md-6{
    color: black;
}
    </style>
@endsection

@section('scriptjs')
    <script>
        $(document).ready( function () {
            $('#tabel').DataTable();
            $('#tabel_std').DataTable();
        } );

        $(".btn-hapus").click(function(){
            var id = $(this).attr("data-id");
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Materi tidak akan bisa dikembalikan!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
                }).then((result) => {
                    if (result.value) {
                        $(".form-" + id).submit();

                    }
                })
        });
    </script>

    @if (Session::has("materi_terhapus"))
        <script>
            Swal.fire(
                        'Terhapus!',
                        'Berhasil menghapus materi.',
                        'success'
                        )
        </script>
    @endif
@endsection