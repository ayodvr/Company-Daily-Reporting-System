@extends('layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
      {{-- <b><h1>DreamHR</h1></b> --}}
    </div>
    <div class="row">
      <div class="col-xl-3 col-lg-6">
        <div class="card">
          <div class="card-body card-type-3">
            <div class="row">
              <div class="col">
                <h6 class="text-muted mb-0">Employees</h6>
                <span class="font-weight-bold mb-0">450</span>
              </div>
              <div class="col-auto">
                <div class="card-circle l-bg-cyan text-white">
                  <i class="fas fa-users"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">
            </p>
          </div>
        </div>
        <div class="card">
            <div class="card-body card-type-3">
              <div class="row">
                <div class="col">
                  <h6 class="text-muted mb-0">Loan Applications</h6>
                  <span class="font-weight-bold mb-0">1,562</span>
                </div>
                <div class="col-auto">
                  <div class="card-circle l-bg-cyan text-white">
                    <i class="fas fa-hand-holding-usd"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
              </p>
            </div>
          </div>
      </div>
      <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body card-type-3">
              <div class="row">
                <div class="col">
                  <h6 class="text-muted mb-0">Payroll</h6>
                  <span class="font-weight-bold mb-0">450</span>
                </div>
                <div class="col-auto">
                  <div class="card-circle l-bg-cyan text-white">
                    <i class="fas fa-credit-card"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
              </p>
            </div>
        </div>
        <div class="card">
          <div class="card-body card-type-3">
            <div class="row">
              <div class="col">
                <h6 class="text-muted mb-0">Leave Applications</h6>
                <span class="font-weight-bold mb-0">1,562</span>
              </div>
              <div class="col-auto">
                <div class="card-circle l-bg-cyan text-white">
                  <i class="fas fa-plane-departure"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>Activities</h4>
          </div>
          <div class="card-body">
            <section class="section">
                <div class="section-body">
                  {{-- <h2 class="section-title">September 2018</h2> --}}
                  <div class="row">
                    <div class="col-12">
                      <div class="activities">
                        <div class="activity">
                          <div class="activity-icon bg-primary text-white">
                            <i class="fas fa-arrows-alt"></i>
                          </div>
                          <div class="activity-detail">
                            <div class="mb-2">
                              <span class="text-job">1 hour ago</span>
                              <span class="bullet"></span>
                            </div>
                            <p>Moved the task "Fix some features that are bugs in the master module" from Progress to Finish.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
  @endsection