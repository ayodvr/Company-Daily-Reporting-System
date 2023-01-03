@extends('layouts.master')
@section('content')
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Enquiries</h1>
          </div>
          <div class="section-body">
            {{-- <form action="/distribution/fetch_records" method="get">
                @csrf
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Select Date</h4>
                  </div>
                  <div class="card-body">
                      <div class="form-group d-flex">
                        <input type="text" name="date" class="form-control datepicker">
                        <button type="submit" class="btn btn-primary ml-2">Save</button>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </form> --}}
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="text-center">
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger" style="width:92%; margin:auto">
                                {{$error}}</div>
                            @endforeach
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger" style="width:92%; margin:auto">
                        {{session('error')}}</div>
                        @endif
                   </div>
                  <div class="card">
                    <div class="card-header">
                      <h4>All Enquiries</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-striped table-hover" id="tableExport">
                            <thead>
                            <tr>
                                <th class="text-center">S/N</th>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Customer Email</th>
                                <th>Product Detail</th>
                                <th>Status</th>
                                <th>Sales Unit</th>
                                <th>Date Created</th>
                                </tr>
                            </thead>
                            @foreach($enquiries as $enquiry)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $enquiry->customer_name }}</td>
                                <td>{{ $enquiry->customer_phone }}</td>
                                <td>{{ $enquiry->customer_email }}</td>
                                <td>{{ $enquiry->Product_detail }}</td>
                                <td>{{ $enquiry->customer_status }}</td>
                                <td>{{ $enquiry->sales_unit }}</td>
                                <td>{{ $enquiry['created_at']->toFormattedDateString() }}</td>
                              </tr>
                              @endforeach
                          </table>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
          </div>
        </section>
@endsection
