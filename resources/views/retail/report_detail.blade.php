@extends('layouts.master')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <br>
          <div class="section-body">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-cyan">
                    <i class="fas fa-cart-plus"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i><span> &#x20A6;</span>@money($t_sum)
                        </h3>
                        <span class="text-muted">Todays Income</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-purple">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> {{ $t_count }}
                        </h3>
                        <span class="text-muted">Todays Customers</span>
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
                          <a href="/retail-report/generate_pdf/{{ $t_date }}/{{ str_replace(' ','_', $t_store )}}"><button style="margin-left: auto" class="btn btn-warning"><i class="fas fa-download"></i> Download Report</button></a>
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
                    @foreach ($record_arr as $report)
                    <div class="col-12 d-flex justify-content-between mb-2">
                      <div><h4>S/N: {{ $report['store_serial'] }}</h4></div>
                      <div>
                        <a href="{{ route('retail-report.edit', $report['id']) }}"><button class="btn btn-outline-info"><i class="far fa-edit"></i>&nbsp;Edit Sale</button></a>
                      </div>
                    </div>
                      <table class="table table-striped">
                        <tr>
                          {{-- <th class="text-center">
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                          </th> --}}
                          <th>Customer Name</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Invoice No</th>
                          <th>Other</th>
                        </tr>
                        <tr>
                            {{-- <td class="p-0 text-center">
                              <th class="text-center">
                                <i class="fas fa-th"></i>
                              </th>
                            </td> --}}
                            <td>{{ $report['name']}}</td>
                            <td>{{ $report['phone']}}</td>
                            <td>{{ $report['email']}}</td>
                            <td>{{ $report['address']}}</td>
                            <td>{{ $report['invoice']}}</td>
                            <td>other</td>
                          </tr>                         
                      </table>
                      <table class="table table-striped">
                        <tr>
                          <th>Product Details</th>
                          <th>Units</th>
                          <th>Mode Of Payment</th>
                          <th>Sold By</th>
                          <th>Confirm By</th>
                          <th>Amount</th>
                        </tr>
                        <tr>
                            <td>{{ $report['product']}}</td>
                            <td>{{ $report['unit']}}</td>
                            <td>{{ $report['payment']}}</td>
                            <td>{{ $report['sold_by']}}</td>
                            <td>{{ $report['confirm']}}</td>
                            <td><b><span style="color: green">&#x20A6;</span>@money($report['amount'])</b></td>
                        </tr>                         
                      </table>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        {{-- {{ $students->links('pagination::bootstrap-4') }} --}}
            <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Message</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
                        <div class="row">
                          <div class="col-lg-12">
                            <form class="composeForm">
                              <div class="form-group">
                                <div class="form-line">
                                  <input type="text" id="email_address" class="form-control" placeholder="To">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="form-line">
                                  <input type="text" id="subject" class="form-control" placeholder="Subject">
                                </div>
                              </div>
                              <div class="form-group">
                                <textarea class="form-control"></textarea>
                              </div>
                              <div class="form-group">
                                  <div class="m-l-8 m-b-20">
                                    <button type="button" class="btn btn-primary btn-border-radius waves-effect">Send</button>
                                  </div>
                              </div>
                            </form>
                          </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      @endsection
      