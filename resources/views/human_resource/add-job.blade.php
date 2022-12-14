@extends('layouts.jobs')
@section('content')
<!-- ======================= Start Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2>Add Job</h2>
      <p><a href="/dashboard" title="Home">Go Back</a> <i class="ti-angle-double-right"></i> Add Job</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->
<!-- ======================= Create Job ===================== -->
<section class="create-job padd-top-80 padd-bot-80">
  <div class="container" data-aos="fade-up">
    <form class="c-form">
      <!-- General Information -->
      <div class="box">
        <div class="box-header">
          <h4>General Information</h4>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>Job Title</label>
              <input type="text" class="form-control" placeholder="Job Title">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>Company Name</label>
              <input type="text" class="form-control" placeholder="Company Name">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>Category</label>
              <select class="wide form-control">
                <option data-display="Location">Information Of Technology</option>
                <option value="1">Hardware</option>
                <option value="2">Machanical</option>
              </select>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 m-clear">
              <label>Description</label>
              <input type="text" class="form-control" placeholder="Description">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>Salary Range</label>
              <select class="wide form-control">
                <option data-display="Salary Range">2,0000</option>
                <option value="1">3,0000</option>
                <option value="2">4,0000</option>
              </select>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 m-clear">
              <label>No. Of Vacancy</label>
              <input type="text" class="form-control" placeholder="No. Of Vacancy">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 m-clear">
              <label>Experience</label>
              <select class="wide form-control">
                <option data-display="Experience">0 To 6 Month</option>
                <option value="1">1 Year</option>
                <option value="2">2 Year</option>
              </select>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 m-clear">
              <label>Company Logo</label>
              <div class="custom-file-upload">
                <input type="file" id="file" name="myfiles[]" multiple />
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 m-clear">
              <label>Job Type</label>
              <select class="wide form-control">
                <option data-display="Job Type">Full Time</option>
                <option value="1">Part Time</option>
                <option value="2">Freelancer</option>
              </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 m-clear">
              <label>Qualification Required</label>
              <input type="text" class="form-control" placeholder="Qualification">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>Skills(Seperate with Comma)</label>
              <input type="text" class="form-control" placeholder="Skills">
            </div>
          </div>
        </div>
      </div>

      <!-- Company Address -->
      <div class="box">
        <div class="box-header">
          <h4>Company Address</h4>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>Phone Number</label>
              <input type="text" class="form-control" placeholder="Phone Number">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>Website Link</label>
              <input type="text" class="form-control" placeholder="Website Link">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>Address</label>
              <input type="text" class="form-control" placeholder="Address">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>City</label>
              <select class="wide form-control">
                  <option data-display="State">Afghanistan</option>
                  <option value="1">Albania</option>
				  <option value="2">Algeria</option>
				  <option value="3">Brazil</option>
				  <option value="4">Burundi</option>
				  <option value="5">Bulgaria</option>
				  <option value="6">Germany</option>
				  <option value="7">Grenada</option>
				  <option value="8">Guatemala</option>
				  <option value="9" disabled>Iceland</option>
              </select>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 m-clear">
              <label>State</label>
              <select class="wide form-control">
                  <option data-display="State">Afghanistan</option>
                  <option value="1">Albania</option>
				  <option value="2">Algeria</option>
				  <option value="3">Brazil</option>
				  <option value="4">Burundi</option>
				  <option value="5">Bulgaria</option>
				  <option value="6">Germany</option>
				  <option value="7">Grenada</option>
				  <option value="8">Guatemala</option>
				  <option value="9" disabled>Iceland</option>
              </select>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 m-clear">
              <label>Country</label>
              <select class="wide form-control">
                  <option data-display="State">Afghanistan</option>
                  <option value="1">Albania</option>
				  <option value="2">Algeria</option>
				  <option value="3">Brazil</option>
				  <option value="4">Burundi</option>
				  <option value="5">Bulgaria</option>
				  <option value="6">Germany</option>
				  <option value="7">Grenada</option>
				  <option value="8">Guatemala</option>
				  <option value="9" disabled>Iceland</option>
              </select>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 m-clear">
              <label>Zip Code</label>
              <input type="text" class="form-control" placeholder="Zip Code">
            </div>
          </div>
        </div>
      </div>

      <!-- Social Accounts -->
      {{-- <div class="box">
        <div class="box-header">
          <h4>Social Accounts</h4>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>Facebook</label>
              <input type="text" class="form-control" placeholder="https://www.facebook.com/">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>Google +</label>
              <input type="text" class="form-control" placeholder="https://www.gmail.com/">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>Twitter</label>
              <input type="text" class="form-control" placeholder="https://twitter.com/">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>LinkedIn</label>
              <input type="text" class="form-control" placeholder="https://www.linkedin.com/">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>Pinterest</label>
              <input type="text" class="form-control" placeholder="https://www.pinterest.com/">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <label>Instagram</label>
              <input type="text" class="form-control" placeholder="http://instagram.com/">
            </div>
          </div>
        </div>
      </div> --}}
      <div class="text-center">
        <button type="submit" class="btn btn-m theme-btn full-width">Submit</button>
      </div>
    </form>
  </div>
</section>
<!-- ====================== End Create Job ================ -->
<div><a href="#" class="scrollup">Scroll</a></div>
@endsection

