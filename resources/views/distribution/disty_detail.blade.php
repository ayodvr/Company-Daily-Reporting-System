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
                {{-- <div class="col-2 col-md-2 col-lg-2">
                    <div class="card">

                    </div>
                </div> --}}
              <div class="col-6 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Select Date</h4>
                  </div>
                  <div class="card-body">
                      <div class="form-group d-flex">
                        <input type="text" name="staff" class="form-control" value="{{ str_replace(' ','_', $sales_reps) }}" hidden/>
                        <input type="text" name="date" class="form-control datepicker">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                      </div>
                  </div>
                </div>
              </div>
              {{-- <div class="col-2 col-md-2 col-lg-2">
                <div class="card">

                </div>
              </div> --}}
            </div>
        </form>
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
                      <h4>All Transactions</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-striped" id="table-1">
                            <thead>
                            <tr>
                                <th class="text-center">S/N</th>
                                <th>Business Name</th>
                                <th>Transaction Details</th>
                                <th>Transaction Value</th>
                                <th>Transaction Status</th>
                                <th>Location</th>
                                {{-- <th>Action</th> --}}
                                <th>Date Created</th>
                                </tr>
                            </thead>
                            @if(!empty($record_arr))
                            @foreach ($record_arr as $distribution)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $distribution['account_name'] }}</td>
                                <td>{{ $distribution['product'] }}</td>
                                <td><span>&#x20A6;</span>@money($distribution['amount'])</td>
                                @if ($distribution['status'] == 'successfull')
                                <td><span class="badge badge-success">{{ $distribution['status'] }}</span></td>
                                @else
                                <td><span class="badge badge-danger">{{ $distribution['status'] }}</span></td>
                                @endif
                                <td>{{ $distribution['account_address'] }}</td>
                                {{-- <td><span class="badge badge-info">Resolve ?</span></td> --}}
                                <td>{{ $distribution['created_at']->toFormattedDateString() }}</td>
                              </tr>
                            @endforeach
                            @endif
                          </table>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
          </div>
        </section>
@endsection
