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
                    {{-- <img class="logo-size" src="{{ asset('ioform/images/logo-light.svg') }}" alt=""> --}}
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
                <div class="form-content">
                    <div class="form-items">
                        <form method="POST" action="{{ route('student-biodata.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="text-center">
                                @if(session('success'))
                                   <div class="alert alert-success" style="width:100%; margin:auto">
                                  <b>{{session('success')}}</b></div>
                               @elseif(session('error'))
                                   <div class="alert alert-danger" style="width:100%; margin:auto">
                                  <b>{{session('error')}}</b></div>
                               @endif
                           </div>
                           <br>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" name="firstname" placeholder="First name">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" name="lastname" placeholder="Last name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" name="matric_no" placeholder="Matric No">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">Photo</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="custom-file">
                                        <input type="file" name="id_card" class="custom-file-input" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">Student ID / Course Form</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row top-padding">
                                <div class="col-12 col-sm-6">
                                    <input type="checkbox" id="chk1" required><label for="chk1">I agree on <a href="#">terms & conditions</a> of iofrm</label>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-button text-right">
                                        <button id="submit" type="submit" class="ibtn less-padding">Submit Application</button>
                                    </div>
                                </div>
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

</html>