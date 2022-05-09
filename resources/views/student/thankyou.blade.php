<!DOCTYPE html>
<html>
<head>
	<title>Thank You!!!</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <div class="text-center">
        @if(session('success'))
           <div class="alert alert-success" style="width:100%; margin:auto">
          <b>{{session('success')}}</b></div>
       @elseif(session('error'))
           <div class="alert alert-danger" style="width:100%; margin:auto">
          <b>{{session('error')}}</b></div>
       @endif
   </div>
<div class="text-center" style="margin-top: 200px">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
  <hr>
  <!-- <p>
    Having trouble? <a href="">Contact us</a> 
  </p> -->
  <!-- <p class="lead">
    <a class="btn btn-primary btn-sm" href="https://dreamworksdirect.com/" role="button">Continue to website</a>
  </p> -->
</div>
</body>
</html>