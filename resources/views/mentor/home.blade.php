@extends('mentor.layouts.app')

@section('main-content')

<div class="container">
        <div class="row justify-content-center">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Murid</div>
                            <div class="row no-gutters align-items-center">
                              <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $mentor->m_ke_ms->count() }}</div>
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

                  <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <h3 class="text-xs font-weight-bold text-warning text-uppercase mb-1">Materi</h3>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mentor->mentor_ke_materi->count() }}</div>
                          </div>
                          <div class="col-auto">
                                <img src="https://img.icons8.com/color/48/000000/book-shelf.png">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>



                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Soal</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mentor->mentor_ke_materi->count() }}</div>
                                </div>
                                <div class="col-auto">
                                        <img src="https://img.icons8.com/color/48/000000/questions.png">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>



                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mata Pelajaran</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mentor->m_ke_mp->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <img src="https://img.icons8.com/color/48/000000/test-passed.png">
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <hr class="w-100">


                        {{--  @foreach($mentor->m_ke_mp as $m)

                        <div class="col-xl-3 col-md-6 mb-4 mapel">
                                <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $m->mp_ke_mapel->nama_pelajaran }}</div>

                                    </div>
                                    <div class="col-auto">
                                        <img src="https://img.icons8.com/color/48/000000/test-passed.png">
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                            @endforeach  --}}

                {{--  <div class="card w-100 text-white border-0" style="">
                    <div class="card-body" style="background-color:#53d3e8;border-radius:10px;">
                        <table id="tabel" class="table table-striped table-bordered table-hover table-borderless" style="width:100%">
                                <thead class="text-white">
                                    <tr style="background-color:#0a336b;" class="text-center">
                                        <th>Judul soal</th>
                                        <th>Pelajaran</th>
                                        <th>Tanggal Mengerjakan</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white">
                                    @foreach($js as $j)
                                        <tr class="text-center">
                                            <td>{{ $j->judul }}</td>
                                            <td>{{ $j->mapel_ke_soal->nama_pelajaran }}</td>
                                            <td>{{ $j->tanggal_mulai }}</td>
                                            <td>{{ $j->tanggal_selesai }}</td>
                                            <td>haha</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>  --}}

                </div>
            </div>


@endsection
