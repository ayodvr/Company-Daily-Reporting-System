<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/iofrm-theme24.css') }}">
</head>
<body>
    <div class="form-body on-top">
        <div class="website-logo">
            <a href="index-2.html">
                <div class="logo">
                    <img class="logo-size" src="{{ asset('ioform/images/logo-light.svg') }}" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder simple-info">
                    <div><img src="{{ asset('ioform/images/graphic6.svg') }}" alt=""></div>
                    <div><h3>We’re Accepting applications!</h3></div>
                    <div><p>Fill the form to apply.</p></div>
                </div>
            </div>
            <div class="form-holder">
                @foreach ($coupons as $coupon)
                   <li>{{ $coupon }}</li> 
                @endforeach
            </div>
        </div>
    </div>
<script src="{{ asset('ioform/js/jquery.min.js') }}"></script>
<script src="{{ asset('ioform/js/popper.min.js') }}"></script>
<script src="{{ asset('ioform/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('ioform/js/main.js') }}"></script>
</body>

</html>