@extends('student.layouts.app')

@section('main-content')

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar soal</h1>
        {{--  <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
                class="badge badge-danger">mengeluarkan</span> murid anda.</p>  --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info text-center"></h6>
            </div>
            <div class="card-body container-utama overflow-auto" style="min-height:390px;">
                {{--  <div class="row ">  --}}

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    @foreach($mentor->m_ke_mp as $m_key => $m_value)
                                        <a class="nav-item nav-link" id="nav-{{ $m_value->kode_mentor_pelajaran }}-tab" data-toggle="tab" href="#nav-{{ $m_value->kode_mentor_pelajaran }}">{{ $m_value->mp_ke_mapel->nama_pelajaran }}</a>
                                    @endforeach
                                </div>
                              </nav>
                              <div class="tab-content" id="nav-tabContent p-4">
                                  @foreach ($mentor->m_ke_mp as $m_key => $m_value)
                                    <div class="tab-pane fade" id="nav-{{ $m_value->kode_mentor_pelajaran }}" role="tabpanel">

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="tabel-{{ $m_key }}">
                                                <thead>
                                                    <tr style="text-align:center;">
                                                            <th>Judul Soal</th>
                                                            <th><sup>Jumlah</sup> Soal</th>
                                                            <th>Pelajaran</th>
                                                            <th>waktu</th>
                                                            <th><sup>Status</sup> Waktu</th>
                                                            <th><sup>Status</sup> Mengerjakan</th>
                                                            <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        @if(empty($soal))
                                                        <tr>
                                                            <td colspan="6" style="text-align:center;">Mentor belum membuat soal</td>
                                                        </tr>
                                                    @else
                                                    @for ($i = 0; $i < count($soal); $i++)
                                                    <tr style="text-align:center;" class="data-soal-{{ $i }}" data-id="{{ $soal[$i]['kode_judul_soal'] }}">
                                                        <td style="width: 35%; text-align:left;">{{ $soal[$i]['judul'] }}</td>
                                                        <td>{{ $soal[$i]['jumlah_soal'] }}</td>
                                                        <td>{{ $soal[$i]['pelajaran']['nama_pelajaran'] }}</td>
                                                        <td>{{ $soal[$i]['tanggal_mulai'] }} - {{ $soal[$i]['tanggal_selesai'] }}</td>
                                                        <td>{{ $status_batas[$i]['status'.$i] }}</td>
                                                        @if($status_batas[$i]['status'.$i] == "lewat" && $status_mengerjakan[$i]['status'.$i] == "belum")
                                                            <td>
                                                                <span class="badge badge-danger">Tidak Mengerjakan</span>
                                                            </td>

                                                            <td>
                                                                <span class="badge badge-danger">Tidak Mengerjakan</span>
                                                            </td>
                                                        @elseif($status_batas[$i]['status'.$i] == "lewat" && $status_mengerjakan[$i]['status'.$i] == "selesai")
                                                            <td>
                                                                <span class="badge badge-success">Selesai</span>
                                                            </td>

                                                            <td>
                                                                <a class="btn btn-outline-info" href="{{ route('student.soal_nilai_cetak', $soal[$i]['kode_judul_soal']) }}"> <i class="fas fa-print"></i> Cetak</a>
                                                            </td>zzz
                                                        @elseif($status_batas[$i]['status'.$i] == "waktunya" && $status_mengerjakan[$i]['status'.$i] == "belum")
                                                            <td>
                                                                <span class="badge badge-warning">Waktunya</span>
                                                            </td>
                                                            <td>
                                                                <?php $id = Crypt::encrypt($soal[$i]['kode_judul_soal']); ?>

                                                                <form method="get" action="{{ route('student.soal_mengerjakan', [$id, $id_param = $id]) }}">
                                                                    <button class="btn btn-info text-white" >Kerjakan</button>
                                                                </form>
                                                            </td>
                                                        @elseif($status_batas[$i]['status'.$i] == "waktunya" && $status_mengerjakan[$i]['status'.$i] == "selesai")
                                                            <td>
                                                                <span class="badge badge-success">Selesai</span>
                                                            </td>
                                                            <td>
                                                                <?php $id = Crypt::encrypt($soal[$i]['kode_judul_soal']); ?>
                                                                <a class="btn btn-outline-info" href="{{ route('student.soal_nilai_cetak', $soal[$i]['kode_judul_soal']) }}"> <i class="fas fa-print"></i> Cetak</a>
                                                            </td>
                                                        @elseif($status_batas[$i]['status'.$i] == "Belum waktunya")
                                                            <td><span class="badge badge-secondary">Belum waktunya</span></td>
                                                            <td><span class="badge badge-secondary">Belum waktunya</span></td>
                                                        @endif
                                                    </tr>
                                                    @endfor
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                {{--  </div>  --}}
        </div>
    </div>

@endsection

@section('scriptcss')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
</style>
@endsection

@section('scriptjs')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function(){
        $("#tabel").DataTable();

        $(".nav-tabs .nav-item:first-child").addClass("active");
        $(".tab-content .tab-pane:first-child").addClass("active show");
    });

</script>
@endsection
