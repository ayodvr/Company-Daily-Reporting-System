<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dreamworks Direct - 5 % Student Campaign</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ioform/css/iofrm-theme24.css') }}">
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
    <div class="form-body on-top-mobile">
        <div class="website-logo">
            <a href="index-2.html">
                <div class="logo">
                    <!-- <img class="logo-size" src="images/logo-light.svg" alt=""> -->
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder simple-info">
                    <div><img src="images/graphic6.svg" alt=""></div>
                    <div><h3>*</h3></div>
                    <div><p>*</p></div>
                </div> 
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <form method="POST" action="{{ route('student-biodata.store') }}" enctype="multipart/form-data">
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
                           <div>
                               {{-- <h3 class="text-center">Fill in the form</h3> --}}
                           </div>
                           <br>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="date">Firstname</label><span style="color: red">*</span>
                                    <input type="text" class="form-control" name="firstname">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="date">Lastname</label><span style="color: red">*</span>
                                    <input type="text" class="form-control" name="lastname">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="date">Phone Number</label><span style="color: red">*</span>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="date">Email</label><span style="color: red">*</span>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="date">Date of birth</label><span style="color: red">*</span>
                                    <input type="date" class="form-control" name="date">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="date">School Name</label><span style="color: red">*</span>
                                    <input type="text" class="form-control" name="school">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="date">School Location</label><span style="color: red">*</span>
                                    <select class="custom-select" name="location">
                                        <option selected>--choose a location--</option>
                                        <script>
                                            const capital = states.map( chars => {   
                                              document.write("<option value="+ chars +">"+ chars +"</option>") 
                                            })
                                          </script>
                                      </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="date">Instagram Handle</label><span style="color: red">*</span>
                                    <input type="text" class="form-control" name="handle">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" accept="passport/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                        <label class="custom-file-label" for="validatedCustomFile">Passport Photograph</label>
                                    </div>
                                    <div><img id="output" style="width:100px;"></div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="custom-file">
                                        <input type="file" name="id_card" class="custom-file-input" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">Student ID / Course Form</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row top-padding">
                                {{-- <div class="col-12 col-sm-6">
                                    <input type="checkbox" id="chk1" required><label for="chk1">I agree on <a href="#" 
                                        data-toggle="modal" data-target="#exampleModalCenter">terms & conditions</a></label>
                                </div> --}}
                                <div class="col-12 col-sm-6">
                                    <p>Terms & conditions apply<span style="color: red">*</span></p>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-button text-right">
                                        <button id="submit" type="submit" class="ibtn less-padding">Submit Application</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="other-links text-center">
                            <span><b>Ensure to follow us</b></span><br><br>
                            <a href="https://www.facebook.com/dreamworksnig/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.twitter.com/dreamworksnig/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/dreamworksnig/"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/company/dreamworksnig/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.youtube.com/dreamworksnig/"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
  </button> --}}
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Terms and conditions</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>

          </p>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
    <script src="{{ asset('ioform/js/jquery.min.js') }}"></script>
    <script src="{{ asset('ioform/js/popper.min.js') }}"></script>
    <script src="{{ asset('ioform/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ioform/js/main.js') }}"></script>
</body>
</html>