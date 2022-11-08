
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/forget19.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Jan 2022 08:06:20 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password.</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/iofrm-theme19.css') }}">
</head>
<body>
    <div class="form-body without-side">
        {{-- <div class="website-logo">
            <a href="index-2.html">
                <div class="logo">
                    <img class="logo-size" src="{{ asset('ioform/images/dream-logo.png') }}" alt="">
                </div>
            </a>
        </div> --}}
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="{{ asset('ioform/images/graphic3.svg') }}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Password Reset</h3>
                        <br>
                        <div class="text-center">
                            @if(session('success'))
                            <div class="alert alert-success" style="width:100%">
                            {{session('success')}}</div>
                            @endif
                        </div>
                        <p>To reset your password, enter the email address you use to sign in to iofrm</p>
                        <form method="POST" action="{{ route('forget.password.post') }}">
                            @csrf
                            <input class="form-control" type="text" name="email" placeholder="E-mail Address" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-button">
                                <button id="submit" type="{{ __('Email Password Reset Link') }}}" class="ibtn text-center">Email Password Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.min.js"></script>
<script src="{{ asset('ioform/js/popper.min.js') }}"></script>
<script src="{{ asset('ioform/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('ioform/js/main.js') }}"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/forget19.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Jan 2022 08:06:20 GMT -->
</html>
