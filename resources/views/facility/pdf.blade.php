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
                        <div><h2>{{ $t_store . ' Facility Retail Check'}}</h2></div>
                        <div><h3 class="text-muted">Daily Report</h3></div>
                        <div><h3>Date : {{ $t_date->toFormattedDateString() }}</h3></div>
                      </div>
                    </div>
                    <br>
                    <div class="order-summary">
                        <div class="table-responsive">
                            <table class="table invoice-table">
                                <thead class="bg-active">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Item Details</th>
                                        <th>Availability</th>
                                        <th>Condition</th>
                                        <th>Comments</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($record_arr as $date => $report)
                                    <tr>
                                        <td>{{ $fac_Serial }}</td>
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
