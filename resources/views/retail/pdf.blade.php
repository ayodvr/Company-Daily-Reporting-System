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
                        <div><h3>Store Location : {{ $t_store }}</h3></div>
                      </div>
                    </div>
                    <br>
                    <div class="order-summary">
                        <div class="table-responsive">
                          @if (!empty($record_arr))
                            @foreach ($record_arr as $date => $report)
                            {{-- <h4 class="text-4 mt-2"> <span>Sale: {{ $report['store_serial'] }}</span></h4> --}}
                            <h4 class="text-4 mt-2"> <span>Sale: {{ $loop->iteration }}</span></h4>
                            <table class="table invoice-table">
                                <thead class="bg-active">
                                    <tr>
                                      <th style="font-family: sans-serif;font-weight:bold">Customer Name</th>
                                      <th style="font-family: sans-serif;font-weight:bold">Phone</th>
                                      <th style="font-family: sans-serif;font-weight:bold">Email</th>
                                      <th style="font-family: sans-serif;font-weight:bold">Address</th>
                                      <th style="font-family: sans-serif;font-weight:bold">Invoice No</th>
                                      <th style="font-family: sans-serif;font-weight:bold">Product Details</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td style="font-family: sans-serif">{{ $report['name']}}</td>
                                      <td style="font-family: sans-serif">{{ $report['phone']}}</td>
                                      <td style="font-family: sans-serif">{{ $report['email']}}</td>
                                      <td style="font-family: sans-serif">{{ $report['address']}}</td>
                                      <td style="font-family: sans-serif">{{ $report['invoice']}}</td>
                                      <td style="font-family: sans-serif">{{ $report['product']}}</td>
                                    </tr>
                                  </tbody>
                                  <thead class="bg-active">
                                  <tr>
                                    <th style="font-family: sans-serif;font-weight:bold">Price</th>
                                    <th style="font-family: sans-serif;font-weight:bold">Units</th>
                                    <th style="font-family: sans-serif;font-weight:bold">Mode Of Payment</th>
                                    <th style="font-family: sans-serif;font-weight:bold">Sold By</th>
                                    <th style="font-family: sans-serif;font-weight:bold">Confirmed By</th>
                                    <th style="font-family: sans-serif;font-weight:bold">Total</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr>
                                    <td style="font-family: sans-serif"><span style="color: #000">&#x20A6;</span>@money($report['price'])</td>
                                    <td style="font-family: sans-serif">{{ $report['unit']}}</td>
                                    <td style="font-family: sans-serif">{{ $report['payment']}}</td>
                                    <td style="font-family: sans-serif">{{ $report['sold_by']}}</td>
                                    <td style="font-family: sans-serif">{{ $report['confirm']}}</td>
                                    <td style="font-family: sans-serif"><b><span style="color: #000">&#x20A6;</span>@money($report['amount'])</b></td>
                                  </tr>
                                  </tbody>
                            </table>
                            @endforeach
                            @endif
                            {{-- <br>
                            <h5>Accounts Analysis:</h5>
                          <table class="table invoice-table">
                              <tr>
                                  <td style="font-family: sans-serif">Number of walking customer</td>
                                  <td style="font-family: sans-serif">{{ $t_count }}</td>
                                  <td style="font-family: sans-serif"></td>
                                  <td style="font-family: sans-serif"></td>
                                  <td style="font-family: sans-serif">S/N</td>
                                  <td style="font-family: sans-serif">Cash paid in bank analysis(PLEASE STATE BANK MONEY WAS PAID INTO WITH ATTACHMENT OF PAYMENT SLIP)</td>
                                  <td style="font-family: sans-serif"></td>
                                  <td style="font-family: sans-serif">Amount</td>
                              </tr>
                              <tr>
                                  <td style="font-family: sans-serif">Cash at hand</td>
                                  <td style="font-family: sans-serif"><span style="color: #000">&#x20A6;</span><b>@money($cash_hand)</b></td>
                                  <td style="font-family: sans-serif"></td>
                                  <td style="font-family: sans-serif"></td>
                                  <td style="font-family: sans-serif"></td>
                                  <td style="font-family: sans-serif">{{ $bank_paid }}</td>
                                  <td style="font-family: sans-serif"></td>
                                  <td style="font-family: sans-serif"><span style="color: #000">&#x20A6;</span><b>@money($cash_bank)</b></td>
                              </tr>
                              <tr>
                                  <td style="font-family: sans-serif">Amount paid in bank</td>
                                  <td style="font-family: sans-serif"><span style="color: #000">&#x20A6;</span><b>@money($cash_bank)</b></td>
                                  <td style="font-family: sans-serif"></td>
                                  <td style="font-family: sans-serif"></td>
                                  <td style="font-family: sans-serif"></td>
                                  <td style="font-family: sans-serif"></td>
                                  <td style="font-family: sans-serif"></td>
                                  <td style="font-family: sans-serif"></td>
                              </tr>
                          </table> --}}
                          <h5>Inventory Analysis:</h5>
                          <table class="table invoice-table">
                              <thead class="bg-active">
                                  <tr>
                                      <th style="font-family: sans-serif">S/N</th>
                                      <th style="font-family: sans-serif">Product Details</th>
                                      <th style="font-family: sans-serif">Qty Sold</th>
                                      <th style="font-family: sans-serif">Serial Number</th>
                                      <th style="font-family: sans-serif">SYS QTY</th>
                                      <th style="font-family: sans-serif">PHY QTY</th>
                                      {{-- <th style="font-family: sans-serif">Variance</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($record_arr as $date => $report)
                                <tr>
                                  <td style="font-family: sans-serif">{{ $loop->iteration }}</td>
                                  <td style="font-family: sans-serif">{{ $report['name']}}</td>
                                  <td style="font-family: sans-serif">{{ $report['unit']}}</td>
                                  <td style="font-family: sans-serif">{{ $report['serial_no']}}</td>
                                  <td style="font-family: sans-serif">{{ $report['sys_qty']}}</td>
                                  <td style="font-family: sans-serif">{{ $report['phy_qty']}}</td>
                                  {{-- <td style="font-family: sans-serif">{{ $report['sys_qty']}}</td> --}}
                                </tr>
                                @endforeach
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
