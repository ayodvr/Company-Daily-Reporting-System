@extends('layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        @role('admin')
        <div class="section-header">
          <h1>Admin Dashboard</h1>
        </div>
        @endrole
        @role('staff')
        <div class="section-header">
          <h1>Staff Dashboard</h1>
        </div>
        @endrole
        <div class="row">
            {{-- <div class="col-xl-3 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">Users</h6>
                      <span class="font-weight-bold mb-0">000000</span>
                    </div>
                    <div class="col-auto">
                      <div class="card-circle l-bg-green text-white">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-right"></i>&nbsp;&nbsp;Retail & Facility</span>
                  </p>
                </div>
              </div>
            </div> --}}
            {{-- <div class="col-xl-3 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">Customers</h6>
                      <span class="font-weight-bold mb-0">0000000</span>
                    </div>
                    <div class="col-auto">
                      <div class="card-circle l-bg-cyan text-white">
                        <i class="fas fa-user"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 7.8%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div> --}}
            {{-- <div class="col-xl-6 col-lg-6">
                <div class="card card-info">
                    <div class="card-header">
                      <h4>Users</h4>
                      <div class="card-header-action">
                        <a href="#" class="btn btn-info btn-icon icon-right">View All <i
                            class="fas fa-chevron-right"></i></a>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="owl-carousel owl-theme" id="users-carousel">
                        <div>
                          <div class="user-item">
                            <img alt="image" src="assets/img/users/user-1.png" class="img-fluid">
                            <div class="user-details">
                              <div class="user-name">Sarah Smith</div>
                              <div class="text-job text-muted">Web Developer</div>
                            </div>
                          </div>
                        </div>
                        <div>
                          <div class="user-item">
                            <img alt="image" src="assets/img/users/user-2.png" class="img-fluid">
                            <div class="user-details">
                              <div class="user-name">John Doe</div>
                              <div class="text-job text-muted">Mobile Developer</div>
                            </div>
                          </div>
                        </div>
                        <div>
                          <div class="user-item">
                            <img alt="image" src="assets/img/users/user-3.png" class="img-fluid">
                            <div class="user-details">
                              <div class="user-name">Cara Stevens</div>
                              <div class="text-job text-muted">UI Designer</div>
                            </div>
                          </div>
                        </div>
                        <div>
                          <div class="user-item">
                            <img alt="image" src="assets/img/users/user-4.png" class="img-fluid">
                            <div class="user-details">
                              <div class="user-name">Ashton Cox</div>
                              <div class="text-job text-muted">Project Manager</div>
                            </div>
                          </div>
                        </div>
                        <div>
                          <div class="user-item">
                            <img alt="image" src="assets/img/users/user-5.png" class="img-fluid">
                            <div class="user-details">
                              <div class="user-name">Angelica Ramos</div>
                              <div class="text-job text-muted">IT Support</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> --}}
          </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4>Revenue Chart</h4>
              </div>
              <div class="card-body">
                <div>{!! $chart->container() !!}</div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex">
                  <div><h4 class="section-title">Activity Log</h4></div>
                  {{-- <div><h4 class="section-title">Date : {{ $daily_date }}</h4></div> --}}
                </div>
                <div class="card-body">
                    @foreach ($activities as $activity)
                    <div class="mb-4">
                        <div class="text-small float-right font-weight-bold text-muted">{{ $activity['created_at']->toDayDateTimeString()  }}</div>
                        <div class="font-weight-bold">{{ $activity->description }}</div>
                        <div class="progress" data-height="5">
                          <div class="progress-bar l-bg-cyan" role="progressbar" data-width="100%" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      @endforeach
                      <div>
                        <p class="text-center text-success"><a href="{{ route('retail-report.timeline') }}">View More</a></p>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </section>
 </div>
<script src="{{ $chart->cdn() }}"></script>
  {{ $chart->script() }}
  @endsection

