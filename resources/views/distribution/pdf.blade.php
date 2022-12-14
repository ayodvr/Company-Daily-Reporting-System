<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/invo-html/HTML/main/invoice-15.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Jul 2022 22:31:28 GMT -->
<head>
    <title>Dreamworks Retail Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/luma/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/luma/fonts/font-awesome/css/font-awesome.min.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/luma/img/favicon.ico" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/luma/css/style.css">
    <style>
      #inline{display:flex;}
    </style>
</head>
<body>

<!-- Invoice 15 start -->
<div class="invoice-15 invoice-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner-15" id="invoice_wrapper">
                    <div class="invoice-top">
                        <div class="row">
                            <div class="col-sm-12 d-flex">
                                <div class="logo">
                                    <img class="logo" src="assets/luma/img/img003.png" style="width:150px" height="150px" alt="logo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display:inline">
                        <div>
                          <div><h3>Date : {{ $t_date->toDayDateTimeString() }}</h3></div>
                          <div><h3>Staff : {{ str_replace('_', ' ', $sales_reps )}} | Distribution</h3></div>
                        </div>
                      </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table invoice-table">
                            <thead>
                                <tr>
                                    <th style="font-family: sans-serif;font-weight:bold">Description</th>
                                    <th style="font-family: sans-serif;font-weight:bold">Daily Target</th>
                                    <th style="font-family: sans-serif;font-weight:bold">Weekly Target</th>
                                    <th style="font-family: sans-serif;font-weight:bold">Monthly Target</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td style="font-family: sans-serif;font-weight:bold">Target</td>
                                    <td style="font-family: sans-serif;font-weight:bold"><span>&#x20A6;</span>11,363,636.00</td>
                                    <td style="font-family: sans-serif;font-weight:bold"><span>&#x20A6;</span>68,181,816.00</td>
                                    <td style="font-family: sans-serif;font-weight:bold"><span>&#x20A6;</span>250,000,000.00</td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif;font-weight:bold">Achievement</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="font-family: sans-serif;font-weight:bold">Shortfall</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                        </table>
                    </div>
                    <br>
                    <div class="order-summary">
                        <div class="table-responsive">
                            <h6><span style="color: green">Closed Transactions:</span></h6>
                            <table class="table invoice-table">
                                <thead class="bg-active">
                                    <tr>
                                        <th style="font-family: sans-serif;font-weight:bold">Date of execution</th>
                                        <th style="font-family: sans-serif;font-weight:bold">Business Name</th>
                                        <th style="font-family: sans-serif;font-weight:bold">Location</th>
                                        <th style="font-family: sans-serif;font-weight:bold">Type of account</th>
                                        <th style="font-family: sans-serif;font-weight:bold">Service|Products|Category</th>
                                        <th style="font-family: sans-serif;font-weight:bold">Transaction status</th>
                                        <th style="font-family: sans-serif;font-weight:bold">Value</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @if (isset($record_arr))
                                    @foreach ($record_arr as $date => $report)
                                    @if($report['status'] == 'successfull')
                                    <tr>
                                      <td style="font-family: sans-serif">{{ $report['created_at']->toFormattedDateString()}}</td>
                                      <td style="font-family: sans-serif">{{ $report['account_name']}}</td>
                                      <td style="font-family: sans-serif">{{ $report['location']}}</td>
                                      <td style="font-family: sans-serif">{{ $report['account_type']}}</td>
                                      <td style="font-family: sans-serif">{{ $report['product_detail']}}</td>
                                      <td style="font-family: sans-serif">{{ $report['status']}}</td>
                                      <td style="font-family: sans-serif"><span style="color: #000">&#x20A6;</span>@money($report['amount'])</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                  </tbody>
                                  </tbody>
                            </table>
                            <br>
                            <h6><span style="color: red">Pending Transactions:</span></h6>
                            <table class="table invoice-table">
                                <thead class="bg-active">
                                    <tr>
                                        <th style="font-family: sans-serif;font-weight:bold">S/N</th>
                                        <th style="font-family: sans-serif;font-weight:bold">Account Name</th>
                                        <th style="font-family: sans-serif;font-weight:bold">Pending Transaction details</th>
                                        <th style="font-family: sans-serif;font-weight:bold">Transaction value</th>
                                        <th style="font-family: sans-serif;font-weight:bold">Transaction status</th>
                                        <th style="font-family: sans-serif;font-weight:bold">Location</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @if(isset($record_arr))
                                    @foreach ($record_arr as $date => $report)
                                    @if($report['status'] !== 'successfull')
                                  <tr>
                                    <td style="font-family: sans-serif">{{ $loop->iteration }}</td>
                                    <td style="font-family: sans-serif">{{ $report['account_name']}}</td>
                                    <td style="font-family: sans-serif">{{ $report['product_detail']}}</td>
                                    <td style="font-family: sans-serif"><span style="color: #000">&#x20A6;</span>@money($report['amount'])</td>
                                    <td style="font-family: sans-serif">{{ $report['status']}}</td>
                                    <td style="font-family: sans-serif"><b>{{ $report['location']}}</b></td>
                                  </tr>
                                  @endif
                                  @endforeach
                                  @endif
                                  </tbody>
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Invoice 15 end -->

<script src="assets/luma/js/jquery.min.js"></script>
<script src="assets/luma/js/jspdf.min.js"></script>
<script src="assets/luma/js/html2canvas.js"></script>
<script src="assets/luma/js/app.js"></script>
</body>

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/invo-html/HTML/main/invoice-15.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Jul 2022 22:31:28 GMT -->
</html>
