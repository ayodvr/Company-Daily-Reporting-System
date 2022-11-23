<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/login9.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Jan 2022 08:04:56 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dreamworks Reporting System</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/iofrm-theme9.css') }}">
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3>Reporting process made easy.</h3>
                    {{-- <p>Get Access to the most powerfull tool in the entire design and web industry.</p> --}}
                    <p>Get access to exclusive features.</p>
                    <img src="{{ asset('ioform/images/graphic5.svg') }}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="https://dreamworksdirect.com/" target="_blank">
                                <div class="logo">
                                    <img class="logo-size" src="{{ asset('ioform/images/dream-logo.png') }}" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="page-links">
                            <a href="#" class="active">Login</a>
                        </div>
                        <div class="text-center">
                            @if(session('success'))
                            <div class="alert alert-success" style="width:100%; color:black">
                            {{session('success')}}</div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger text-danger"  style="width:92%; margin:auto">
                            {{session('error')}}</div>
                            @endif
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail Address" value="{{ old('email') }}" tabindex="1" autocomplete="email" autofocus>
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
                                <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" name="password" tabindex="2" autocomplete="current-password">
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
                                <a href="{{ route('forget.password.get') }}">Forget password?</a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('ioform/js/jquery.min.js') }}"></script>
<script src="{{ asset('ioform/js/popper.min.js') }}"></script>
<script src="{{ asset('ioform/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('ioform/js/main.js') }}"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/login9.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Jan 2022 08:05:00 GMT -->
</html>
