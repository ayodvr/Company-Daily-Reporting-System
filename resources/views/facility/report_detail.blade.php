@extends('layouts.partials')
@section('content')
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <br>
      <div class="section-body">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-wrap">
                <div class="padding-20">
                  <div>
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i>{{ $t_store . ' Facility Check'}}
                    </h3>
                    <h5 class="text-muted"><span style="color: rgb(43, 180, 226)">Daily Report</span></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon l-bg-green">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <a href="#"><button style="margin-left: auto" data-toggle="modal" data-target="#exampleModalCenter"
                          class="btn btn-success"><i class="fas fa-check-double"></i> Send Report</button></a>
                    </h3>
                    {{-- <span class="text-muted">Send Report</span> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon l-bg-orange">
                <i class="fas fa-download"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <a href="/facility-report/generate_pdf/{{ $t_date }}/{{ str_replace(' ','_', $t_store )}}"><button style="margin-left: auto" class="btn btn-warning"><i class="fas fa-download"></i> Download Report</button></a>
                    </h3>
                    {{-- <span class="text-muted">Send Report</span> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                {{-- <h4>Advanced Table</h4> --}}
              </div>
              {{-- <div class="text-right mr-5">
                <a href="/retail-report/generate_pdf" class="btn btn-primary">Send Report</a>
              </div> --}}
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <tr>
                        {{-- <th>S/N</th> --}}
                        <th>Item Details</th>
                        <th>Availability</th>
                        <th>Condition</th>
                        <th>Comments</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($record_arr as $report)
                    <tr>
                        {{-- <td>{{ $fac_Serial }}</td> --}}
                        <td>{{ $report['item_details'] }}</td>
                        <td>{{ $report['availability'] }}</td>
                        @if(isset($report['condition']))
                        <td>{{ $report['condition'] }}</td>
                        @else
                        <td>N/A</td>
                        @endif
                        @if(isset($report['comments']))
                        <td>{{ $report['comments'] }}</td>
                        @else
                        <td>N/A</td>
                        @endif
                        <td>{{ $report['created_at']->toDayDateTimeString() }}</td>
                        <td>
                        <a href="#edit{{ $report['id'] }}"><button class="btn btn-outline-dark" data-toggle="modal"  data-target=".facilityModal">
                        <i class="far fa-edit"></i></button></a>
                        </td>
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
    {{-- {{ $students->links('pagination::bootstrap-4') }} --}}
  </div>
  @endsection
