@extends('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Timeline</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Timeline</div>
        </div>
      </div>
      <div class="section-body">
        {{-- <h2 class="section-title">Todays Date : {{ $daily_date }}</h2> --}}
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4><h2 class="section-title">Todays Date : {{ $daily_date }}</h2></h4>
              </div>
              <div class="card-body">
                <div class="activities">
                  @foreach ($activities as $activity)
                  <div class="activity">
                      <div class="activity-icon bg-primary text-white">
                        <i class="far fa-bell"></i>
                      </div>
                      <div class="activity-detail">
                        <div class="mb-2">
                          <span class="text-job">{{ $activity['created_at']->toDayDateTimeString()  }}</span>
                          <span class="bullet"></span>
                          {{-- <a class="text-job" href="#">View</a> --}}
                          {{-- <div class="float-right dropdown">
                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                            <div class="dropdown-menu">
                              <div class="dropdown-title">Options</div>
                              <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                              <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                              <div class="dropdown-divider"></div>
                              <a href="#" class="dropdown-item has-icon text-danger"
                                data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                                data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                            </div>
                          </div> --}}
                        </div>
                        <p>{{ $activity->description }}</p>
                      </div>
                    </div>
                  @endforeach
              </div>
              </div>
              <div class="card-footer">
                {{ $activities->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection