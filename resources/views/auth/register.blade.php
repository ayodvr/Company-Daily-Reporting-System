<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/register17.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Jan 2022 08:06:20 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/iofrm-theme17.css') }}">
</head>
<body>
    <div class="form-body without-side">
        <div class="website-logo">
            <a href="index-2.html">
                {{-- <div class="logo">
                    <img class="logo-size" src="{{ asset('ioform/images/logo-light.svg') }}" alt="">
                </div> --}}
            </a>
        </div>
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
                        <div class="text-center">
                            @if(count($errors) > 0)
                                @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="width:92%; margin:auto; color:red">
                                    {{$error}}</div>
                                @endforeach
                            @endif
                            {{-- @if(session('error'))
                            <div class="alert alert-danger" style="width:92%; margin:auto">
                            {{session('error')}}</div>
                            @endif --}}
                       </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Name -->
                            <div>
                                <input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Fullname" />
                            </div>
                            <!-- Email Address -->
                            <div class="mt-1">
                                <input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Email" />
                            </div>
                            <!-- Store Location -->
                            <div class="mt-1">
                                <select class="form-control" id="basic-reg" data-placeholder="Select Store" name="store">
                                    <option>Select Store</option>
                                    @foreach ($stores as $store)
                                    <option value="{{ $store->store_name }}">{{ $store->store_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Password -->
                            <div class="mt-1">
                                <input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                placeholder="Password"
                                             autocomplete="new-password" />
                            </div>
                            <!-- Confirm Password -->
                            <div class="mt-1">
                                <input id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation" 
                                                placeholder="Confirm Password"
                                             />
                            </div>
                            <div class="flex items-center justify-end mt-1">
                                <span>Already Registered?</span><a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                                <div class="form-button">
                                    <button id="submit" type="submit" class="ibtn">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $( '#basic-reg' ).select2( {
        theme: "bootstrap-5",
    });
</script>
<script src="{{ asset('ioform/js/jquery.min.js') }}"></script>
<script src="{{ asset('ioform/js/popper.min.js') }}"></script>
<script src="{{ asset('ioform/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('ioform/js/main.js') }}"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/register17.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Jan 2022 08:06:20 GMT -->
</html>