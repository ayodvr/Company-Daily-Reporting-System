<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/login13.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Jan 2022 08:05:05 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm</title>
    <link rel="stylesheet" type="text/css" href="ioform/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="ioform/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="ioform/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="ioform/css/iofrm-theme3.css">
</head>
<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="index-2.html">
              <div class="logo">
                <img class="logo-size" src="ioform/images/logo-light.svg" alt="">
            </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
           
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="page-links">
                            <a href="{{ route('login') }}" class="active">Login</a><a href="{{ route('register') }}">Register</a>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" tabindex="1" autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <div class="d-block">
                                  <label for="password" class="control-label">{{ __('Password') }}</label>
                                </div>
                                <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" tabindex="2" autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> 
                                @if (Route::has('password.request'))
                                <a href="#">Forget password?</a>
                                @endif
                            </div>
                        </form>
                        <div class="other-links">
                            <span>Don't have an account?</span><a href="{{ route('register') }}">Create one</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="ioform/js/jquery.min.js"></script>
<script src="ioform/js/popper.min.js"></script>
<script src="ioform/js/bootstrap.min.js"></script>
<script src="ioform/js/main.js"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/login13.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Jan 2022 08:05:14 GMT -->
</html>