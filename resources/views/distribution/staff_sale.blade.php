@extends('layouts.master')
@section('content')
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Report</h1>
          </div>
          <div class="section-body">
            <form action="/distribution/fetch_records" method="get">
                @csrf
            <div class="row">
                <div class="col-2 col-md-2 col-lg-2">
                    <div class="card">

                    </div>
                </div>
              <div class="col-8 col-md-8 col-lg-8">
                <div class="card">
                  <div class="card-header">
                    <h4>Select Date</h4>
                  </div>
                  <div class="card-body">
                      <div class="form-group d-flex">
                        <input type="text" name="staff" class="form-control" value="{{ str_replace(' ','_', $sales_arr) }}" hidden/>
                        <input type="text" name="date" class="form-control datepicker">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-2 col-md-2 col-lg-2">
                <div class="card">

                </div>
              </div>
            </div>
           </form>
          </div>
        </section>
@endsection
