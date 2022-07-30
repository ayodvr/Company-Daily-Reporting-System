<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/register13.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Jan 2022 08:06:19 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm</title>
    <link rel="stylesheet" type="text/css" href="ioform/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="ioform/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="ioform/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="ioform/css/iofrm-theme13.css">
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
                            <a href="{{ route('login') }}">Login</a><a href="{{ route('register') }}" class="active">Register</a>
                        </div>
                        <!-- <div class="text-center">
                            @if(session('error'))
                                <div class="alert alert-danger" style="width:92px; margin:auto">
                                    <b>{{ session('error') }}</b>
                                </div>
                            @endif
                        </div>
                        <div class="text-center">
                            @if(session('success'))
                                <div class="alert alert-success" style="width:92px; margin:auto">
                                    <b>{{ session('success') }}</b>
                                </div>
                            @endif
                        </div> -->
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Staff ID -->
                            <div>
                                <x-input id="staff_id" class="block mt-1 w-full" type="text" name="staff_id" :value="old('staff_id')" placeholder="Staff I.D" required autofocus />
                            </div>
                            <!-- Name -->
                            <div>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Fullname" required autofocus />
                            </div>
                            <!-- Email Address -->
                            <div class="mt-1">
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required />
                            </div>
                            <!-- Password -->
                            <div class="mt-1">
                                <x-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                placeholder="Password"
                                                required autocomplete="new-password" />
                            </div>
                            <!-- Confirm Password -->
                            <div class="mt-1">
                                <x-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation" 
                                                placeholder="Confirm Password"
                                                required />
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
<script src="ioform/js/jquery.min.js"></script>
<script src="ioform/js/popper.min.js"></script>
<script src="ioform/js/bootstrap.min.js"></script>
<script src="ioform/js/main.js"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/register13.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Jan 2022 08:06:19 GMT -->
</html>

{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
