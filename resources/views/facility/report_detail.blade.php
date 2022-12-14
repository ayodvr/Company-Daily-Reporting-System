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
                    <div class="card-body card-type-3">
                    <div class="row">
                        <div class="col">
                            <h6 class="text-muted mb-0"><span class="text-nowrap">{{ $t_store . ' Facility Check'}}</span></h6>
                            <span class="badge badge-light">Daily Report</span>
                          </div>
                        <div class="col-auto">
                        <div class="card-circle l-bg-green text-white">
                            <i class="fas fa-building"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
              <div class="col-xl-7 col-lg-4">
                <div class="card">
                  <div class="card-body card-type-3">
                    {{-- <div class="row">
                        <div class="col">
                            <a href="#"><button style="margin-left: auto" data-toggle="modal" data-target="#exampleModalCenter"
                                class="btn btn-info">Send Report</button></a>
                          </div>
                    </div> --}}
                    <div class="d-flex">
                        <p class="mt-3 mb-0 text-muted text-sm">
                            {{-- <span class="text-dark mr-2"><i class="fa fa-eye"></i></span> --}}
                            <a href="/facility-report/generate_pdf/{{ $t_date }}/{{ str_replace(' ','_', $t_store )}}"><span class="badge badge-secondary">View Report</span></a>
                        </p>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <p class="mt-3 mb-0 text-muted text-sm">
                            {{-- <span class="text-dark mr-2"><i class="fa fa-file"></i></span> --}}
                            <a href="/facility-report/download_pdf/{{ $t_date }}/{{ str_replace(' ','_', $t_store )}}"><span class="badge badge-warning">Download Pdf</span></a>
                        </p>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <p class="mt-3 mb-0 text-muted text-sm">
                            {{-- <span class="text-dark mr-2"><i class="fas fa-file-excel"></i></span> --}}
                            <a href="/facility-report/generate_excel/{{ $t_date }}/{{ str_replace(' ','_', $t_store )}}"><span class="badge badge-success">Download Excel</span></a>
                        </p>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <p class="mt-3 mb-0 text-muted text-sm">
                            {{-- <span class="text-dark mr-2"><i class="fas fa-file-excel"></i></span> --}}
                            <a href="#"><span class="badge badge-info" data-toggle="modal" data-target="#exampleModalCenter">Send via mail</span></a>
                        </p>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <p class="mt-3 mb-0 text-muted text-sm">
                            {{-- <span class="text-dark mr-2"><i class="fas fa-file-excel"></i></span> --}}
                            <a href="http://127.0.0.1:8000/facility-report/create"><span class="badge badge-light">Add New Report</span></a>
                        </p>
                    </div>
                  </div>
                </div>
              </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Facility Data</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <tr>
                        <th>S/N</th>
                        <th>Item Details</th>
                        <th>Availability</th>
                        <th>Condition</th>
                        <th>Comments</th>
                        {{-- <th>Date Created</th> --}}
                        @role('admin')

                        @endrole
                        @role('staff')
                        <th>Actions</th>
                        @endrole
                    </tr>
                    @if (isset($record_arr))
                    @foreach ($record_arr as $report)
                    <tr id='rid{{ $report['id'] }}'>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $report['item_details'] }}</td>
                        <td>{{ $report['availability'] }}</td>
                        @if(!empty($report['condition']))
                        <td>{{ $report['condition'] }}</td>
                        @else
                        <td>N/A</td>
                        @endif
                        @if(!empty($report['comments']))
                        <td>{{ $report['comments'] }}</td>
                        @else
                        <td>N/A</td>
                        @endif
                        {{-- <td>{{ $report['created_at']->toDayDateTimeString() }}</td> --}}
                        @role('admin')

                        @endrole
                        @role('staff')
                        <td>
                        <a href="javascript:void(0)"><button class="btn btn-outline-dark" onClick="editFunc({{ $report['id'] }})">
                        <i class="far fa-edit"></i></button></a>
                        </td>
                        @endrole
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
     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Mail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/facility-report/send_pdf/{{ $t_date }}/{{ str_replace(' ','_', $t_store )}}" method="GET">
                @csrf
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
                  <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                          <div class="form-line">
                          <label>To:</label>
                            <select class="form-control select2" name="email[]" multiple="" style="width: 100%">
                              <option></option>
                              <option value="ayodejiadekunle@gmail.com">Ayodeji Adekunle</option>
                              <option value="adekunle.s@dreamworksdirect.com">Adekunle Sherif</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="form-line">
                            <label>Subject:</label>
                            <input type="text" name="subject" id="subject" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="form-line">
                          <label>Message:</label>
                          <textarea class="form-control" name="body" id="summernote"></textarea>
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
