
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8" />
	<title>Admin | Dashboard</title>
	<meta name="description" content="Updates and statistics" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link href="{{ asset('assets/pos_assets/css/stylec619.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->

	<link href="{{ asset('assets/pos_assets/api/pace/pace-theme-flat-top.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/pos_assets/api/mcustomscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/api/daterange-picker/daterangepicker.css') }}" />

	<link href="{{ asset('assets/pos_assets/api/datatable/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/pos_assets/api/select2/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/pos_assets/api/multiple-select/multiple-select.min.css') }}" rel="stylesheet">



	<link rel="shortcut icon" href="{{ asset('assets/pos_assets/media/logos/favicon.ico') }}" />
</head>

<body id="tc_body" class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed">
    <!-- Paste this code after body tag -->
	<div class="se-pre-con">
		<div class="pre-loader">
		  <img class="img-fluid" src="{{ asset('assets/pos_assets/images/loadergif.gif') }}" alt="loading">
		</div>
	</div>
    <header class="pos-header bg-white">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="greeting-text">
                        <a href="/distribution"><button class="btn-primary btn ml-2 white pt-1 pb-1 d-flex align-items-center justify-content-center">
                            <i class="fas fa-angle-left"></i>&nbsp;&nbsp;Search Reports</button></a>
                     {{-- <h3 class="card-label mb-0 ">
                         {{ auth()->user()->unit }}
                     </h3> --}}
                    </div>

                </div>
                <div class="col-xl-4 col-lg-5 col-md-6  clock-main">
                 <div class="clock">
                   <div class="datetime-content">
                     <ul>
                         <li id="hours"></li>
                         <li id="point1">:</li>
                         <li id="min"></li>
                         <li id="point">:</li>
                         <li id="sec"></li>
                     </ul>
                   </div>
                  <div class="datetime-content">
                     <div id="Date"  class=""></div>
                  </div>

                 </div>

                </div>
                <div class="col-xl-4 col-lg-3 col-md-12  order-lg-last order-second">

                 <div class="topbar justify-content-end">
                  <div class="dropdown mega-dropdown">
                      <div id="id2" class="topbar-item "  data-toggle="dropdown" data-display="static">
                          <div class="btn btn-icon w-auto h-auto btn-clean d-flex align-items-center py-0 mr-3">

                              <span class="symbol symbol-35 symbol-light-success">
                                  <span class="symbol-label bg-primary  font-size-h5 ">

                                      <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="#fff" class="bi bi-calculator-fill" viewBox="0 0 16 16">
                                          <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm2 .5v2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5zm0 4v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM4.5 9a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM4 12.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM7.5 6a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM7 9.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM10 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm.5 2.5a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5h-1z"/>
                                        </svg>
                                  </span>
                              </span>
                          </div>
                      </div>

                      <div class="dropdown-menu dropdown-menu-right calu" style="min-width: 248px;">
                          <div class="calculator">
                              <div class="input" id="input"></div>
                              <div class="buttons">
                                <div class="operators">
                                  <div>+</div>
                                  <div>-</div>
                                  <div>&times;</div>
                                  <div>&divide;</div>
                                </div>
                                 <div class="d-flex justify-content-between">
                                  <div class="leftPanel">
                                      <div class="numbers">
                                        <div>7</div>
                                        <div>8</div>
                                        <div>9</div>
                                      </div>
                                      <div class="numbers">
                                        <div>4</div>
                                        <div>5</div>
                                        <div>6</div>
                                      </div>
                                      <div class="numbers">
                                        <div>1</div>
                                        <div>2</div>
                                        <div>3</div>
                                      </div>
                                      <div class="numbers">
                                        <div>0</div>
                                        <div>.</div>
                                        <div id="clear">C</div>
                                      </div>
                                    </div>
                                    <div class="equal" id="result">=</div>
                                 </div>
                              </div>
                            </div>
                      </div>

                  </div>

                  <div class="dropdown">
                      <div class="topbar-item" data-toggle="dropdown" data-display="static">
                          <div class="btn btn-icon w-auto h-auto btn-clean d-flex align-items-center py-0">

                              <span class="symbol symbol-35 symbol-light-success">
                                  <span class="symbol-label font-size-h5 ">
                                      <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                      </svg>
                                  </span>
                              </span>
                          </div>
                      </div>

                      <div class="dropdown-menu dropdown-menu-right" style="min-width: 150px;">


                          <a href="#" class="dropdown-item">
                              <span class="svg-icon svg-icon-xl svg-icon-primary mr-2">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power">
                                      <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                                      <line x1="12" y1="2" x2="12" y2="12"></line>
                                  </svg>
                              </span>
                              Logout
                          </a>
                      </div>

                  </div>
                 </div>

                 </div>
            </div>
        </div>
    </header>
    <div class="contentPOS mb-5" id="tc_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-lg-2 col-xl-2">
                    </div>
                    <div class="col-lg-8 col-xl-8">
                        <div class="card card-custom gutter-b bg-transparent shadow-none border-0" >
                            <div class="card-header align-items-center   border-bottom-dark px-0">
                                <div class="card-title mb-0">
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Add Sale
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xl-2">
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-lg-2 col-xl-2">
                    </div>
                    <div class="col-lg-8 col-xl-8">
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
                            @if(session('success'))
                            <div class="alert alert-success" style="width:92%; margin:auto">
                            {{session('success')}}</div>
                            @endif
                       </div>
                       <br>
                        <div class="card card-custom gutter-b bg-white border-0" >
                            <div class="card-body">
                                {!! Form::open(['route'=> ['distribution.store'], 'method'=> 'POST', 'enctype'=>'multipart/form-data']) !!}
                                    @csrf
                                    <input type="text" name="store_code" value="{{ auth()->user()->store_code }}" class="form-control" hidden>
                                    <input type="text" name="today_date" value="{{ $daily_date }}" class="form-control" hidden>
                                    <input type="text" name="sold_by" value="{{ auth()->user()->name }} }}" class="form-control" hidden>
                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <label  class="text-body">Business Name</label>
                                            <fieldset class="form-group mb-3 d-flex">
                                                <select class="js-example-basic-single form-control bg-transparents" data-placeholder="Choose State/Region" name="account_name" required>
                                                    <option selected>Select existing business</option>
                                                    @foreach ($customers as $customer )
                                                    <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                                @endforeach
                                                </select>
                                            <input type="button" data-toggle="modal" data-target="#choosecustomer" value="Add" class="btn-success btn ml-2 white pt-1 pb-1 d-flex align-items-center justify-content-center"/>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label  class="text-body">Location</label>
                                            <fieldset class="form-group mb-3">
                                                <input type="text" class="form-control" name="location" id="basicInput">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label  class="text-body">Type of Account</label>
                                            <fieldset class="form-group mb-3">
                                                <select class="js-example-basic-single js-states form-control bg-transparent" name="account_type">
                                                    <option></option>
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                    </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label  class="text-body">Date of Execution</label>
                                            <fieldset class="form-group mb-3">
                                                <input type="date" name="date" class="form-control datepicker mb-3" >
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label  class="text-body">Service | Products | Category</label>
                                            <input type="text" class="form-control" name="product_detail" id="basicInput">
                                        </div>
                                        <div class="col-md-4">
                                            <label  class="text-body">Transaction Status</label>
                                            <fieldset class="form-group mb-3">
                                                <select class="js-example-basic-single js-states form-control bg-transparent" name="status">
                                                    <option></option>
                                                    <option value="successfull">Sale Successful</option>
                                                    <option value="Awaiting Products(GIT)">Awaiting Products(GIT)</option>
                                                    <option value="Engagement Ongoing">Engagement Ongoing</option>
                                                    <option value="Unconcluded">Unconcluded</option>
                                                    <option value="Awaiting Payment">Awaiting Payment</option>
                                                    <option value="Asking for competitive price">Asking for competitive price</option>
                                                    <option value="Pricing Challenge">Price challenge</option>
                                                    </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                {{-- <div class="col-md-12">
                                                    <label  class="text-body"><h5>Search Product</h5></label>
                                                    <fieldset class="form-group mb-3 d-flex">
                                                        <input style="color: black" name="product" ng-model="searchKeyword" type="text" class="form-control" placeholder="Search..." aria-label="search" aria-describedby="search" >
                                                    </fieldset>
                                                </div> --}}
                                                <div class="col-12">
                                                    <div class="table-responsive"  id="printableTable">
                                                        <table class="table table-striped  text-body" id="tab_logic">
                                                            <thead>
                                                                <tr>
                                                                  <th class="border-0  header-heading" scope="col" hidden>S/N</th>
                                                                  <th class="border-0  header-heading" scope="col">Product Details </th>
                                                                  <th class="border-0  header-heading" scope="col">Price</th>
                                                                  <th class="border-0  header-heading" scope="col">Units</th>
                                                                  <th class="border-0  header-heading" scope="col">Total</th>
                                                                </tr>
                                                              </thead>
                                                            <tbody>
                                                              <tr id='addr0'>
                                                                <td hidden>1</td>
                                                                <td>
                                                                <select class="js-example-basic-single form-control bg-transparents" data-placeholder="Select Product" name="product">
                                                                    <option selected>Select Product</option>
                                                                    @if (isset($products))
                                                                        @foreach ($products as $product)
                                                                        <option>{{ $product->PRODUCT_NAME }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" onkeyup="myFunction_sell()" class="form-control" name="price" id="price">
                                                                </td>
                                                                <td>
                                                                    <input type="number" onclick="myFunction_sell()" name="unit" class="form-control" id="unit" style="width: 70px">
                                                                </td>
                                                                <td><h5 style="color: red" class="text:right"><b><span id="ShowSell"></span></b></h5></td>
                                                                <td></td>
                                                              </tr>
                                                              <tr id='addr1'><input type="text" id="InputSell" hidden="hidden" name="amount"/></tr>
                                                            </tbody>
                                                          </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card card-custom gutter-b bg-white border-0" >
                                                <div class="card-body">
                                                    {{-- <div class="row">
                                                        <div class="col-md-12">
                                                            <a href="javascript:void(0)" id="add_row"><i class="fas fa-plus" style="color:blue"></i></a>
                                                            <a href="javascript:void(0)" id="delete_row"><i class="fas fa-trash-alt float-right" style="color:red"></i></a>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-4">
                                            <label  class="text-body">Transaction Value</label>
                                            <fieldset class="form-group mb-3">
                                                <input type="text" class="form-control" class="invoice" id="basicInput">
                                            </fieldset>
                                        </div> --}}
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-info btn-block font-weight-bold mr-1  mb-1" value="Save Report">
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xl-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="choosecustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel13" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel13">Add Customer</h3>
                <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-light btn-hover-primary m-0" data-dismiss="modal" aria-label="Close">
                  <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                  </svg>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('retail-customers.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label  class="text-body">Customer / Business Name</label>
                            <fieldset class="form-group mb-3">
                                <input type="text" name="customer_name"  class="form-control"/>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <label  class="text-body">State / Region</label>
                            <fieldset class="form-group mb-3">
                                <input type="text" name="customer_address"  class="form-control" />
                            </fieldset>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label  class="text-body">Customer Phone</label>
                            <fieldset class="form-group mb-3">
                                <input type="text" name="customer_phone"  class="form-control"/>
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <label  class="text-body">Date Of Birth</label>
                            <fieldset class="form-group mb-3">
                                <input type="date" name="customer_birthday" class="form-control datepicker mb-3" >
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <label  class="text-body">Customer Email</label>
                            <fieldset class="form-group mb-3">
                                <input type="text" name="customer_email"  class="form-control" />
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <fieldset class="form-group mb-3">
                                <input type="text" name="customer_email"  class="form-control" />
                            </fieldset>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end mb-0">
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        var i = 0;

        $("#add").click(function(){

            ++i;

            $("#dynamicTable").append('<tr><td><input type="text" name="question['+i+']" placeholder="Enter question" class="form-control" /></td><td><svg type="button" class="remove-tr" height="25pt" viewBox="-64 0 512 512" width="20pt" xmlns="http://www.w3.org/2000/svg"><path d="m256 80h-32v-48h-64v48h-32v-80h128zm0 0" fill="#62808c"/><path d="m304 512h-224c-26.507812 0-48-21.492188-48-48v-336h320v336c0 26.507812-21.492188 48-48 48zm0 0" fill="#e76e54"/><path d="m384 160h-384v-64c0-17.671875 14.328125-32 32-32h320c17.671875 0 32 14.328125 32 32zm0 0" fill="#77959e"/><path d="m260 260c-6.246094-6.246094-16.375-6.246094-22.625 0l-41.375 41.375-41.375-41.375c-6.25-6.246094-16.378906-6.246094-22.625 0s-6.246094 16.375 0 22.625l41.375 41.375-41.375 41.375c-6.246094 6.25-6.246094 16.378906 0 22.625s16.375 6.246094 22.625 0l41.375-41.375 41.375 41.375c6.25 6.246094 16.378906 6.246094 22.625 0s6.246094-16.375 0-22.625l-41.375-41.375 41.375-41.375c6.246094-6.25 6.246094-16.378906 0-22.625zm0 0" fill="#fff"/></svg></td></tr>');
        });

        $(document).on('click', '.remove-tr', function(){
             $(this).parents('tr').remove();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script>
        $( '#basic-product' ).select2( {
         theme: "bootstrap-5",
        });
       </script>
       <script>
        $(document).ready(function(){
          var i=1;
          $("#add_row").click(function(){b=i-1;
              $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
              $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
              i++;
          });
          $("#delete_row").click(function(){
            if(i>1){
          $("#addr"+(i-1)).html('');
          i--;
          }
        });
      });
      </script>
	  <script src="{{ asset('assets/pos_assets/js/plugin.bundle.min.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{asset('assets/js/angular.min.js')}}"></script>
      <script src="{{asset('assets/js/sale.js')}}"></script>
	  <script src="{{ asset('assets/pos_assets/js/slick.min.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/api/jqueryvalidate/jquery.validate.min.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/api/apexcharts/apexcharts.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/api/apexcharts/scriptcharts.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/api/pace/pace.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/api/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/api/quill/quill.min.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/api/editor/classic.ckeditor.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/api/editor/inline.ckeditor.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/api/datatable/jquery.dataTables.min.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/api/select2/select2.min.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/api/multiple-select/multiple-select.min.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/js/sweetalert.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/js/sweetalert1.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/js/script.bundle.js') }}"></script>
	  <script src="{{ asset('assets/pos_assets/js/script-slick.js') }}"></script>
      <script  src="{{ asset('assets/api/daterange-picker/moment.min.js') }}"></script>
	  <script  src="{{ asset('assets/api/daterange-picker/daterangepicker.min.js') }}"></script>
      <script>
        function myFunction_sell() {
        first = Number($('#unit').val());
        second = Number($('#price').val());
        if(first && second && !isNaN(first) && !isNaN(second)){
            $('span#ShowSell').text( "₦" + first * second + ".00");
            $('input#InputSell').val(first * second);
        }
        else {
            $('span#ShowSell').text(" ");
        }
      }
      </script>
	  <script>
		  ClassicEditor
		  .create( document.querySelector( '#editor' ) )
		  .then( editor => {
				  console.log( editor );
		  } )
		  .catch( error => {
				  console.error( error );
		  } );
		  jQuery('.addproduct-js').slick('refresh');
			  jQuery(document).ready(function() {
			  jQuery('.js-Select').select2();
		  });
		  jQuery('.addproduct-js').slick('refresh');
			  jQuery(document).ready(function() {
			  jQuery('.js-example-basic-single').select2();

		  });
		  jQuery(document).ready(function() {
			  jQuery('.js-example-basic-multiple').select2();
		  });
		  jQuery(document).ready(function() {
			  jQuery('.js-size-multiple').select2();
		  });


	  jQuery(document).ready( function () {
		  jQuery('#myTable').DataTable();
	  } );

	  jQuery(function() {
			  jQuery('.single-select').multipleSelect({
			filter: true,
			filterAcceptOnEnter: true
		  })
		})
	  </script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        jQuery(document).ready(function() {
            jQuery('.js-example-basic-single').select2();
        });
        jQuery(document).ready(function() {
            jQuery('.js-example-basic-multiple').select2();
        });
        jQuery(function() {
			jQuery('.multiple-select').multipleSelect()
		});

        jQuery(function() {
            jQuery('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
        jQuery(function() {
            jQuery('input[name="birthday"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10)
      },
      function(start, end, label) {
        var years = moment().diff(start, 'years');

      });
    });
    jQuery(function() {
        jQuery('input[name="daterange"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
    });

    jQuery(function() {
        jQuery('input[name="datetimes"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'M/DD hh:mm A'
        }
      });
    });


    jQuery(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        jQuery('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    jQuery('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

    });
    jQuery(function() {

        jQuery('input[name="datefilter"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    jQuery('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
        jQuery(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });

    jQuery('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        jQuery(this).val('');
    });

    });
</script>
</body>
<!--end::Body-->
</html>
