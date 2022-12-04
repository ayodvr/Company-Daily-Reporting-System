@extends('layouts.master')
@section('content')
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Report</h1>
          </div>
          <div class="section-body">
            <div class="row">
                @role('admin')
                @foreach ($admin_arr as $key => $value )
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <article class="article">
                    <div class="article-header">
                        <div class="article-image" data-background="assets/img/blog/store.jpg">
                        </div>
                        <div class="article-title">
                        {{-- <h2 class="text-center"><a href="#">{{ $value }}</h2> --}}
                        </div>
                    </div>
                    <div class="article-details text-center">
                        <p><b>{{ strToUpper($value) }}</b></p>
                        <div class="article-cta">
                        <a href="{{ route('distribution.staff_sale', str_replace(' ', '_', strtolower($value))) }}" class="btn btn-info">View Reports</a>
                        </div>
                    </div>
                    </article>
                </div>
                @endforeach
                @endrole
            </div>
            @role('staff')
            <form action="/distribution/fetch_records" method="get">
                @csrf
            <div class="row">
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="card">

                    </div>
                  </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Select Date</h4>
                  </div>
                  <div class="card-body">
                      <div class="form-group d-flex">
                        <input type="text" name="staff" class="form-control" value="{{ str_replace(' ','_', $staff_arr) }}" hidden/>
                        <input type="text" name="date" class="form-control datepicker">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-3 col-lg-3">
                <div class="card">

                </div>
              </div>
            </div>
        </form>
        @endrole
    </div>
        </section>
@endsection
