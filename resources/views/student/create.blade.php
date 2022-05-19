<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dreamworks Direct - 5 % Student Campaign</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('colorlibs/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('colorlibs/css/fontawesome-all.min.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='https://discount.dreamworksdirect.com/assets/img/favicon.ico' />

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('colorlibs/css/style.css') }}">
</head>
<body>
    <script>
        var states = [
            "Abia",
            "Adamawa",
            "Akwa Ibom",
            "Anambra",
            "Bauchi",
            "Bayelsa",
            "Benue",
            "Borno",
            "Cross River",
            "Delta",
            "Ebonyi",
            "Edo",
            "Ekiti",
            "Enugu",
            "FCT - Abuja",
            "Gombe",
            "Imo",
            "Jigawa",
            "Kaduna",
            "Kano",
            "Katsina",
            "Kebbi",
            "Kogi",
            "Kwara",
            "Lagos",
            "Nasarawa",
            "Niger",
            "Ogun",
            "Ondo",
            "Osun",
            "Oyo",
            "Plateau",
            "Rivers",
            "Sokoto",
            "Taraba",
            "Yobe",
            "Zamfara"
    ]
    </script>
    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="{{ asset('colorlibs/images/student_id.jpg') }}" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" action="{{ route('student-biodata.store') }}" enctype="multipart/form-data" class="register-form" id="register-form">
                        @csrf
                            <div class="text-center">
                                @if(count($errors) > 0)
                                    @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" style="width:92%; margin:auto">
                                        {{$error}}</div>
                                    @endforeach
                                @endif
                                @if(session('error'))
                                <div class="alert alert-danger" style="width:92%; margin:auto">
                                {{session('error')}}</div>
                                @endif
                           </div>
                        <h2>student registration form</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Firstname<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="firstname"/>
                            </div>
                            <div class="form-group">
                                <label for="father_name">Lastname<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="lastname"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Phone Number<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="phone"/>
                            </div>
                            <div class="form-group">
                                <label for="father_name">Email<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="email"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Date Of Birth<span style="color: red">*</span></label>
                                <input type="date" class="form-control" name="date"/>
                            </div>
                            <div class="form-group">
                                <label for="father_name">School Name<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="school"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="course">School Location<span style="color: red">*</span></label>
                                <div class="form-select">
                                    <select name="location" id="location">
                                        <option selected>--choose a location--</option>
                                        <script>
                                            const capital = states.map( chars => {   
                                              document.write("<option value="+ chars +">"+ chars +"</option>") 
                                            })
                                          </script>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="father_name">Instagram Handle<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="handle"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Passport Photograph<span style="color: red">*</span></label>
                                <input type="file" name="image" accept="passport/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"/>
                            </div>
                            <div><img id="output" style="width:100px;"></div>
                            <div class="form-group">
                                <label for="father_name">Student ID / Course Form</label>
                                <input type="file" name="id_card"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <h3>Terms & conditions apply<span style="color: red">*</span></h3>
                            </div>
                        </div>
                        <div class="form-row text-center">
                            <div class="form-group">
                                <h3>Follow Us</h3>
                                <a href="https://www.facebook.com/dreamworksnig/"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.twitter.com/dreamworksnig/"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.instagram.com/dreamworksnig/"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/company/dreamworksnig/"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://www.youtube.com/dreamworksnig/"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Submit Application" id="submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="{{ asset('colorlibs/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('colorlibs/js/popper.min.js') }}"></script>
    <script src="{{ asset('colorlibs/js/main.js') }}"></script>
</body>
</html>