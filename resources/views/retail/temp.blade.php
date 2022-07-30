<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/invo-html/HTML/main/invoice-17.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Jul 2022 22:31:28 GMT -->
<head>
    <title>INVO - Invoice HTML5 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/luma/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/luma/fonts/font-awesome/css/font-awesome.min.css') }}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('assets/luma/img/favicon.ico') }}" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/luma/css/style.css') }}">
</head>
<body>

<!-- Invoice 17 start -->
<div class="invoice-17 invoice-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner clearfix">
                    <div class="invoice-info clearfix" id="invoice_wrapper">
                        <div class="invoice-headar border-shadow-bg">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="invoice-logo">
                                        <!-- logo started -->
                                        <div>
                                            <img src="{{ asset('assets/img/img003.png') }}" 
                                            style="width: 100px; height:100px;" alt="logo">
                                        </div>
                                        <!-- logo ended -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="invoice-contact-us">
                                        <h1>Sales Report</h1>
                                            <p class="mb-0">Report Date: <span>21 Sep 2022</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-center border-shadow-bg">
                            <div class="order-summary">
                                <div class="table-outer">
                                @foreach ($record_arr as $date => $report)
                                    <table class="default-table invoice-table">
                                        <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Invoice No</th>
                                            {{-- <th>Amount</th> --}}
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>{{ $report['name']}}</td>
                                            <td>{{ $report['phone']}}</td>
                                            <td>{{ $report['email']}}</td>
                                            <td>{{ $report['address']}}</td>
                                            <td>{{ $report['invoice']}}</td>
                                            {{-- <td>{{ $report['amount']}}</td> --}}
                                        </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>Product Details</th>
                                                <th>Units</th>
                                                <th>Mode Of Payment</th>
                                                <th>Confirm By</th>
                                                {{-- <th>Sold By</th> --}}
                                            </tr>
                                            </thead>
    
                                            <tbody>
                                            <tr>
                                                <td>{{ $report['product']}}</td>
                                                <td>{{ $report['unit']}}</td>
                                                <td>{{ $report['payment']}}</td>
                                                <td>{{ $report['confirm']}}</td>
                                                {{-- <td>Me</td> --}}
                                            </tr>
                                            </tbody>
                                    </table>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="invoice-bottom border-shadow-bg bsb2">
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-7">
                                    <div class="terms-conditions mb-30">
                                        <h3 class="inv-title-1 mb-10">Terms & Conditions</h3>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Invoice 17 end -->

<script src="{{ asset('assets/luma/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/luma/js/jspdf.min.js') }}"></script>
<script src="{{ asset('assets/luma/js/html2canvas.js') }}"></script>
<script src="{{ asset('assets/luma/js/app.js') }}"></script>
</body>

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/invo-html/HTML/main/invoice-17.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Jul 2022 22:31:28 GMT -->
</html>
