<?php $__env->startSection('main-content'); ?>

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
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo e($mentor->m_ke_ms->count()); ?></div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($mentor->mentor_ke_materi->count()); ?></div>
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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($mentor->mentor_ke_materi->count()); ?></div>
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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($mentor->m_ke_mp->count()); ?></div>
                                </div>
                                <div class="col-auto">
                                    <img src="https://img.icons8.com/color/48/000000/test-passed.png">
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <hr class="w-100">


                        

                

                </div>
            </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('mentor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/TA/mozart-elearning/resources/views/mentor/home.blade.php ENDPATH**/ ?>