@extends('layouts.partials')
@section('content')
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <br>
      <div class="section-body">
        <div class="row">
              <div class="col-xl-5 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Search Report</h4>
                      </div>
                    <div class="card-body card-type-3">
                    <form action="/distribution/fetch_records" method="get">
                        @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group d-flex">
                                <input type="text" name="staff" class="form-control" value="{{ str_replace(' ','_', $sales_reps) }}" hidden/>
                                <input type="text" name="date" class="form-control datepicker">
                                <button type="submit" class="btn btn-primary ml-2">Search</button>
                              </div>
                          </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
              <div class="col-xl-7 col-lg-4">
                <div class="card">
                  <div class="card-body card-type-3">
                    <table class="table">
                        <tr>
                            <td style="font-weight:bold"><span class="badge badge-light">Target</span></td>
                            <td style="font-weight:bold">Per day:<span>&#x20A6;</span>11,363,636.00</td>
                            <td style="font-weight:bold">Per week:<span>&#x20A6;</span>68,181,816.00</td>
                            <td style="font-weight:bold">Monthly:<span>&#x20A6;</span>250,000,000.00</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold"><span class="badge badge-light">Achievement</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold"><span class="badge badge-light">Shortfall</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                      </table>
                  </div>
                </div>
              </div>
          <div class="col-12">
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
              <br>
              <div class="text-center">
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" style="width:92%; margin:auto">
                        {{$error}}</div>
                    @endforeach
                @endif
                @if(session('success'))
                <div class="alert alert-success" style="width:92%; margin:auto">
                {{session('success')}}</div>
                @endif
           </div>
              <div class="card-header">
                <div class="d-flex float-right">
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <a href="/distribution/generate_pdf/{{ $t_date }}/{{ str_replace(' ','_', $sales_reps )}}"><span class="badge badge-secondary">View Report</span></a>
                    </p>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <a href="/distribution/download_pdf/{{ $t_date }}/{{ str_replace(' ','_', $sales_reps )}}"><span class="badge badge-warning">Export Pdf</span></a>
                    </p>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <a href="/distribution/generate_excel/{{ $t_date }}/{{ str_replace(' ','_', $sales_reps )}}"><span class="badge badge-success">Export Excel</span></a>
                    </p>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <a href="#"><span class="badge badge-info" data-toggle="modal" data-target="#distributionCenter">Send Mail</span></a>
                    </p>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <a href="http://127.0.0.1:8000/distribution/create"><span class="badge badge-light">Add New Report</span></a>
                    </p>
                </div>
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
    {{-- {{ $students->links('pagination::bootstrap-4') }} --}}
  </div>
     <!-- Modal -->
     <div class="modal fade" id="distributionCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Mail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/distribution/send_pdf/{{ $t_date }}/{{ str_replace(' ','_', $sales_reps )}}" method="GET">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
                  <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                          <div class="form-line">
                          <label>To:</label>
                            <select class="form-control select2" name="email[]" multiple="" style="width: 100%" required>
                              <option></option>
                              <option value="ayodejiadekunle@gmail.com">Ayodeji Adekunle</option>
                              <option value="adekunle.s@dreamworksdirect.com">Adekunle Sherif</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="form-line">
                            <label>Subject:</label>
                            <input type="text" name="subject" id="subject" class="form-control" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="form-line">
                          <label>Message:</label>
                          <textarea class="form-control" name="body" id="summernote" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                            <div class="m-l-8 m-b-20 text-center">
                              <button type="submit" class="btn btn-primary btn-border-radius waves-effect">Send Mail</button>
                            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- The Modal -->
  @endsection
