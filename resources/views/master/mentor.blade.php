@extends('master.layouts.app')

@section('main-content')

    <div class="container-fluid">
        <div class="row">

                <div class="col-md-12 m-2">
                    <h2 class="text-center">Daftar Seluruh Mentor</h2>

                        <div class="card w-100 text-white border-0" style="">
                            <div class="card-body" style="border:1px solid green; border-radius:10px;">

                                <div class="input-group-prepend w-100 mb-2">
                                    <span class="input-group-text bg-dark text-white label-card">
                                                        <img src="https://img.icons8.com/color/48/000000/school-director.png" class="icon-colored"> Mentor</span>
                                </div><br>
                                <div class="table-responsive">
                                <table id="tabel" class="table table-striped table-bordered table-hover table-bordered" style="width:100%">
                                    <thead class="text-dark">
                                        <tr class="text-center">
                                            <th>Profil</th>
                                            <th>ID Mentor</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Mapel</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Kuota</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-dark">
                                        @foreach($mentor as $m)
                                        <tr>
                                            <td class="w-25"><img src="{{ url("images/".$m->foto) }}" class="profil rounded"></td>
                                            <td>{{ $m->id_mentor }}</td>
                                            <td>{{ $m->name }}</td>
                                            <td>{{ $m->email }}</td>
                                            <td>
                                                @if(empty($m->m_ke_mp->mp_ke_mapel))
                                                Mentor belum membuat pelajaran
                                                @else
                                                    <ul>
                                                        @foreach ($m->m_ke_mp->mp_ke_mapel as $p)
                                                            <li>{{ $p->nama_pelajaran }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </td>
                                            <td>{{ $m->created_at }}</td>
                                            <td>{{ $m->m_ke_mp[0]->kuota }}</td>
                                            <td>
                                                <button data-id="{{ $m->id_mentor }}" class="btn btn-danger btn-hapus">
                                                    <i class="fas fa-trash-alt"></i> hapus</a>
                                                </button>
                                                <form action="{{ route('master.delete_mentor', $m->id_mentor) }}" class="form-{{ $m->id_mentor }}" method="post">
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
                text: "Seluruh data berdasarkan mentor ini akan terhapus sepenuhnya!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
                }).then((result) => {
                    if (result.value) {
                        $(".form-" + id).submit();

                        Swal.fire(
                        'Terhapus!',
                        'Berhasil menghapus mentor.',
                        'success'
                        )
                    }
                })
        });
    </script>

    {{-- @if (Session::has("mentor_terhapus"))
        <script>
            Swal.fire(
                        'Terhapus!',
                        'Berhasil menghapus mentor.',
                        'success'
                        )
        </script>
    @endif --}}
@endsection