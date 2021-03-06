@extends('student.layouts.app')

@section('main-content')

    <div class="container">
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mentor</div>
                            <div class="row no-gutters align-items-center">
                              <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $std[0]->m_ke_ms->count() }}</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/school-director.png">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="table-responsive">
                  <table class="table table-bordered" id="tabel">
                    <thead>
                      <tr>
                        <th> Judul Soal</th>
                        <th> Mentor </th>
                        <th>Mata Pelajaran</th>
                        <th>Tanggal Selesai</th>
                        <th>Nilai</th>
                        <th>Pilihan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($nilai as $n)
                        <tr>
                            <td>{{ $n->js_ke_n->judul }}</td>
                            <td>{{ $n->js_ke_n->kjs_ke_mentor[0]->name }}</td>
                            <td>{{ $n->js_ke_n->mapel_ke_soal->nama_pelajaran }}</td>
                            <td>{{ $n->tanggal_selesai }}</td>
                            <td>{{ $n->nilai }}</td>
                            <td>
                              <a href="{{ route('student.soal_nilai_cetak', $n->js_ke_n->kode_judul_soal) }}"><button class="btn btn-info"><i class="fas fa-file-pdf"></i> print</button></a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                  {{-- <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <h3 class="text-xs font-weight-bold text-warning text-uppercase mb-1">Soal Selesai</h3>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nilai->count() }}</div>
                    </div>
                    <div class="col-auto">
                          <img src="https://img.icons8.com/color/48/000000/book-shelf.png">
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}



                {{-- <div class="card w-100 text-white border-0" style="">
                    <div class="card-body" style="background-color:#53d3e8;border-radius:10px;">
                        <table id="tabel" class="table table-striped table-bordered table-hover table-borderless" style="width:100%">
                                <thead class="text-white">
                                    <tr style="background-color:#0a336b;" class="text-center">
                                        <th>Judul soal</th>
                                        <th>Pelajaran</th>
                                        <th>Mentor</th>
                                        <th>Status</th>
                                        <th>Status Mengerjakan</th>
                                        <th>Hasil</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white">
                                    @foreach($kjs as $k_key => $k_value)

                                        @for ($i = 0; $i < $idm->count(); $i++)
                                            <tr class="text-center">
                                                <td>{{ $judul_soal['judul'] }}</td>
                                                <td>{{ $mapel->nama_pelajaran }}</td>
                                                <td>{{ $idm[$i]["name"] }}</td>
                                                <td>{{ $idn[$i]["status"] }}</td>
                                                <td><span class="badge badge-success p-2 text-dark" style="background-color:#87ebd5;">{{ $idn[$i]["status"] }} <img class="icon-colored" src="https://img.icons8.com/cotton/64/000000/inspection.png"></td></span>
                                                <td>
                                                    <a class="btn btn-info btn-tosca" href="{{ route('student.soal_nilai_cetak', $judul_soal['kode_judul_soal']) }}"><img src="https://img.icons8.com/officel/40/000000/print.png" class="icon-colored"> cetak</a>
                                                </td>
                                            </tr>
                                        @endfor

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> --}}

                </div>
            </div>



@endsection

@section('scriptcss')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/fh-3.1.4/r-2.2.2/sl-1.3.0/datatables.min.css"/>

@endsection

@section('scriptjs')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-html5-1.5.6/fh-3.1.4/r-2.2.2/sl-1.3.0/datatables.min.js"></script>

    <script>
    $(document).ready(function() {
    $('#tabel').DataTable();
} );
    </script>
@endsection