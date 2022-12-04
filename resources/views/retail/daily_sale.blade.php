@extends('layouts.master')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/retail-report">Manage Reports</a></div>
              <div class="breadcrumb-item">Reports Table</div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <form action="/retail-report/fetch_records" method="get">
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
                            <input type="text" name="store" class="form-control" value="{{ str_replace(' ','_', $sales_arr) }}" hidden/>
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
              </div>
            </div>
          </div>
        </section>
        {{-- {{ $students->links('pagination::bootstrap-4') }} --}}
      </div>
      @endsection
