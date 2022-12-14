@extends('layouts.partials')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <br>
          <div class="section-body">
            <div class="row">
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body card-type-3">
                    <div class="row">
                        <div class="col">
                        <h6 class="text-muted mb-0">Today's Revenue</h6>
                        <span class="font-weight-bold mb-0">&#x20A6;</span>@money($t_sum)</span>
                        </div>
                        <div class="col-auto">
                        <div class="card-circle l-bg-green text-white">
                            <i class="fas fa-cart-plus"></i>
                        </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        {{-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 10%</span> --}}
                        {{-- <span class="text-nowrap">Todays Revenue</span> --}}
                    </p>
                    </div>
                </div>
            </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-body card-type-3">
                    <div class="row">
                      <div class="col">
                        <h6 class="text-muted mb-0">Todays Customers</h6>
                        <span class="font-weight-bold mb-0">{{ $t_count }}</span>
                      </div>
                      <div class="col-auto">
                        <div class="card-circle l-bg-cyan text-white">
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                      {{-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 7.8%</span>
                      <span class="text-nowrap">Since last month</span> --}}
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6">
                <div class="card">
                  <div class="card-body card-type-3 d-flex">
                    <div class="row">
                        <div class="col-auto">
                            <a href="#"><button style="margin-left: auto" data-toggle="modal" data-target="#exampleModalCenter"
                                class="btn btn-outline-success"><i class="fa fa-inbox"></i>&nbsp;Send Report</button></a>
                          </div>
                      <div class="col">
                        <a href="{{ route('retail-report.store_sale', str_replace(' ', '_', strtolower($t_store))) }}">
                        <button style="margin-left: auto" class="btn btn-outline-info"><i class="fa fa-eye"></i>&nbsp;Manage Report</button></a>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        {{-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                        <span class="text-nowrap">Since last month</span> --}}
                    </p>
                    <div class="row ml-2">
                        <div class="dropdown d-inline">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton2"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              See more
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item has-icon" href="/retail-report/generate_pdf/{{ $t_date }}/{{ str_replace(' ','_', $t_store )}}"><i class="fas fa-eye"></i> View Report</a>
                              <a class="dropdown-item has-icon" href="/retail-report/download_pdf/{{ $t_date }}/{{ str_replace(' ','_', $t_store )}}"><i class="far fa-file"></i> Export as Pdf</a>
                              <a class="dropdown-item has-icon" href="/retail-report/generate_excel/{{ $t_date }}/{{ str_replace(' ','_', $t_store )}}"><i class="fas fa-file-excel"></i>Export as Excel</a>
                            </div>
                          </div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- <div class="col-xl-2 col-lg-6">
                <div class="card">
                  <div class="card-body card-type-3">
                    <div class="dropdown d-inline">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton2"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          See more
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item has-icon" href="/retail-report/generate_pdf/{{ $t_date }}/{{ str_replace(' ','_', $t_store )}}"><i class="fas fa-eye"></i> View Report</a>
                          <a class="dropdown-item has-icon" href="/retail-report/download_pdf/{{ $t_date }}/{{ str_replace(' ','_', $t_store )}}"><i class="far fa-file"></i> Export as Pdf</a>
                          <a class="dropdown-item has-icon" href="/retail-report/generate_excel/{{ $t_date }}/{{ str_replace(' ','_', $t_store )}}"><i class="fas fa-file-excel"></i>Export as Excel</a>
                        </div>
                      </div>
                  </div>
                </div>
              </div> --}}
              <div class="col-12">
                <div class="card">
                  <div class="card-header mr-5">
                    {{-- <a href="{{ route('retail-report.store_sale', str_replace(' ', '_', strtolower($t_store))) }}"><button class="btn btn-outline-dark" style="border:none"><i class="fa fa-arrow-left"></i>&nbsp;Back</button></a> --}}
                  </div>
                  <div class="text-center">
                    @if(session('success'))
                          <div class="alert alert-success" style="width:92%; margin:auto">
                          {{session('success')}}</div>
                    @endif
               </div>
                  <div class="card-body">
                    <div class="table-responsive">
                    @if(isset($record_arr))
                    @foreach ($record_arr as $report)
                    <div class="col-12 d-flex justify-content-between mb-2">
                      {{-- <div> --}}
                        {{-- <h4>S/N: {{ $report['store_serial'] }}</h4></div> --}}
                        <h6 class="badge badge-success">Sale: {{ $loop->iteration }}</h6>
                        @role('staff')
                        <div>
                          <a href="{{ route('retail-report.edit', $report['id']) }}"><button class="btn btn-outline-secondary"><i class="far fa-edit"></i>&nbsp;Edit</button></a>
                        </div>
                      @endrole
                    </div>
                    </div>
                      <table class="table table-striped" id="table-1">
                        <tr>
                          <th>Customer Name</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Invoice No</th>
                          <th>Sold By</th>
                        </tr>
                        <tr>
                            <td>{{ $report['name']}}</td>
                            <td>{{ $report['phone']}}</td>
                            <td>{{ $report['email']}}</td>
                            <td>{{ $report['address']}}</td>
                            <td>{{ $report['invoice']}}</td>
                            <td>{{ $report['sold_by']}}</td>
                          </tr>
                      </table>
                      <table class="table table-striped" id="table-1">
                        <tr>
                          <th>Product Details</th>
                          <th>Mode Of Payment</th>
                          <th>Units</th>
                          <th>Price</th>
                          <th>Total Amount</th>
                          <th>Payslip</th>
                          <th>Confirmed By</th>
                        </tr>
                        <tr>
                            <td>{{ $report['product']}}</td>
                            <td>{{ $report['payment']}}</td>
                            <td>{{ $report['unit']}}</td>
                            <td><span>&#x20A6;</span>@money($report['price'])</td>
                            <td><b><span style="color: green">&#x20A6;</span>@money($report['amount'])</b></td>
                            @if (isset($report['payslips']))
                            <td><a href="#"><img src="{{ $report['payslips']}}" alt="payslip" style="width: 100px;height:100px" class="myImg"></a></td>
                            @else
                            <td>No Payslip Found</td>
                            @endif
                            <td>{{ $report['confirm']}}</td>
                        </tr>
                      </table>
                      @endforeach
                      @endif
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
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Mail</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="/retail-report/send_pdf/{{ $t_date }}/{{ str_replace(' ','_', $t_store )}}" method="GET">
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
                                  <button type="submit" class="btn btn-info btn-border-radius waves-effect">Send Mail</button>
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
           <div id="myModal" class="modals">
          {{-- <button class="close">&times;</button> --}}
          <button type="button" class="btn-close btn btn-danger" aria-label="Close">&times;</button>
         <img class="modal-content" id="img01">
        <div id="caption"></div>
      </div>
    </div>
    <script>
      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the image and insert it inside the modal - use its "alt" text as a caption
      var img = document.getElementsByClassName("myImg");
        for(var i=0; i<img.length; i++){
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img[i].addEventListener('click',function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
      })
    }

      // Get the <span> element that closes the modal
      var button = document.getElementsByClassName("btn-close")[0];

      // When the user clicks on <span> (x), close the modal
      button.onclick = function() {
        modal.style.display = "none";
      }
    </script>
@endsection

