@extends('layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
      {{-- <b><h1>DreamHR</h1></b> --}}
    </div>
    <div class="row">
      <div class="col-lg-8">
        <div class="p-6 m-20 rounded shadow" style="position: -webkit-sticky">
            {!! $chart->container() !!}
        </div>
      </div>
      <div class="col-md-4">
      <div class="card">
          <div class="card-header">
            <h4 style="color: #353c48; text-align:center"><i class="fa fa-calendar"></i> <span>&nbsp;{{ $daily_date }}</span>:&nbsp;&nbsp;Logs</h4>
          </div>
          <div class="card-body">
            <section class="section">
                <div class="section-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="activities">
                        @foreach ($activities as $activity)
                        <div class="activity">
                          <div class="activity-icon bg-primary text-white">
                            <i class="fas fa-arrows-alt"></i>
                          </div>
                          <div class="activity-detail">
                            <div class="mb-2">
                              <span class="text-job">{{ $activity['created_at']->toDayDateTimeString() }}</span>
                              <span class="bullet"></span>
                            </div>
                            <p>{{ $activity->description }}</p>
                          </div>
                        </div>
                        @endforeach
                      </div>
                      <div class="text-center">
                        <a href="{{ route('retail-report.timeline') }}">See more activities</a>
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
<script src="{{ $chart->cdn() }}"></script>
  {{ $chart->script() }}
  @endsection