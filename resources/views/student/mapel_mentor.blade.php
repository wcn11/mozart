@extends('student.layouts.app') @section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h3 mb-2 text-gray-800">Daftar Mata Pelajaran Mentor</p>
    <p class="mb-4">Pilih mata pelajaran utuk dapat mulai belajar</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Daftar Mentor</h6>
        </div>
        <div class="card-body">
            <div class="row">


                    <table class="table table-borderless">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody class="data-mapel">
                            @empty($mentor)
                                <tr class="text-center">
                                    <td colspan="3">Belum membuat materi</td>
                                </tr>

                            @else
                                @foreach($mentor->m_ke_mp as $m_key => $m)
                                    <tr>
                                        <td>{{ $m_key + 1 }}</td>
                                        <td>{{ $m->mp_ke_mapel->nama_pelajaran }}</td>
                                        <td>
                                            @if($m->mp_ke_ms->count() >0)
                                                @if($m->mp_ke_ms->count() <= $m->kuota)
                                                    {{-- <a href="{{ route('mentor.ambil_kelas', [$mentor->id_mentor, $m->kode_mentor_pelajaran]) }}"><button class="btn btn-info"><i class="fas fa-inbox"></i> Ambil Kelas</button></a> --}}
                                                    @foreach($m->mp_ke_ms as $s)
                                                        @if($s->id_student == Auth::guard('student')->user()->id_student)
                                                            <a href="{{ route('student.unfollow', $s->kode_mentor_student) }}"><button class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Tinggalkan</button></a>
                                                        @else
                                                            <a href="{{ route('student.ambil_kelas', [$mentor->id_mentor, $m->kode_mentor_pelajaran]) }}"><button class="btn btn-info"><i class="fas fa-inbox"></i> Ambil Kelas</button></a>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <button class="btn btn-danger"><i class="fas fa-sign-out"></i> Penuh</button>
                                                @endif
                                            @else
                                                <a href="{{ route('student.ambil_kelas', [$mentor->id_mentor, $m->kode_mentor_pelajaran]) }}"><button class="btn btn-info"><i class="fas fa-inbox"></i> Ambil Kelas</button></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            @endempty
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-mentor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Pilihan</th>
                          </tr>
                        </thead>
                        <tbody class="data-mapel">
                            {{-- <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr> --}}
                        </tbody>
                      </table>
          </div>
        </div>
      </div>

@endsection

@section('scriptcss')
<style>

    .profil{
        min-height: 150%;
    }

</style>
@endsection

@section('scriptjs')
{{-- <script src="{{ asset('swatchbook/js/modernizr.custom.79639.js') }}"></script>
<script src="{{ asset('swatchbook/js/jquery.swatchbook.js') }}"></script> --}}


@if (Session::has("tambah_kelas"))
<script>
    Swal.fire({
        title: 'Berhasil',
        type: "success",
        text: "Anda mengikuti mentor",
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
        type: "info",
        text: "Anda telah keluar kelas",
        animation: false,
        customClass: {
            popup: 'animated shake'
        }
    });
</script>
@endif
@endsection