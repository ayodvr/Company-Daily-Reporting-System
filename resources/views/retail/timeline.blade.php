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
                <h4><h2 class="section-title">Activity Log</h2></h4>
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
                </div>
              </div>
              <div class="card-footer">
                {{ $activities->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection
