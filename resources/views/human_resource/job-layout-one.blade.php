@extends('layouts.jobs')
@section('content')
<!-- ======================= Start Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption text-center">
      <h2>All Jobs</h2>
      {{-- <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> Job Layout One</p> --}}
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->

<!-- ======================= Search Filter ===================== -->
{{-- <section class="padd-0 padd-top-20 jov_search_block_inner">
  <div class="row">
    <div class="container">
      <form>
        <fieldset class="search-form">
          <div class="col-md-4 col-sm-4">
            <input type="text" class="form-control" placeholder="Job Title, Keywords or Company Name..." />
          </div>
          <div class="col-md-3 col-sm-3">
            <select class="wide form-control">
              <option data-display="Location">All Country</option>
              <option value="1">Afghanistan</option>
              <option value="2">Albania</option>
              <option value="3">Algeria</option>
			  <option value="4">Brazil</option>
              <option value="5">Burundi</option>
              <option value="6">Bulgaria</option>
			  <option value="7">Germany</option>
              <option value="8">Grenada</option>
              <option value="9">Guatemala</option>
              <option value="10" disabled>Iceland</option>
            </select>
          </div>
          <div class="col-md-3 col-sm-3">
            <select class="wide form-control">
              <option data-display="Category">Show All</option>
              <option value="1">Software Developer</option>
              <option value="2">Java Developer</option>
              <option value="3">Software Engineer</option>
			  <option value="4">Web Developer</option>
              <option value="5">PHP Developer</option>
              <option value="6">Python Developer</option>
			  <option value="7">Front end Developer</option>
              <option value="8">Associate Developer</option>
              <option value="9">Back end Developer</option>
			  <option value="10">XML Developer</option>
              <option value="11">.NET Developer</option>
			  <option value="12" disabled>Marketting Developer</option>
            </select>
          </div>
          <div class="col-md-2 col-sm-2 m-clear">
            <button type="submit" class="btn theme-btn full-width height-50 radius-0">Search</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</section> --}}
<!-- ======================= Search Filter ===================== -->

<!-- ====================== Start Job Detail 2 ================ -->
<section class="padd-top-20 padd-bot-80">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-4 col-xs-12">
        <h4 class="job_vacancie">98 Jobs & Vacancies</h4>
      </div>
      <div class="col-md-7 col-sm-8 col-xs-12">
        <div class="fl-right short_by_filter_list">
          <div class="search-wide short_by_til">
            {{-- <h5>Short By</h5> --}}
          </div>
          {{-- <div class="search-wide full">
            <select class="wide form-control">
              <option value="1">Most Recent</option>
              <option value="2">Most Viewed</option>
              <option value="4">Most Search</option>
            </select>
          </div> --}}
          {{-- <div class="search-wide full">
            <select class="wide form-control">
              <option>10 Per Page</option>
              <option value="1">20 Per Page</option>
              <option value="2">30 Per Page</option>
              <option value="4">50 Per Page</option>
            </select>
          </div> --}}
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="utf_grid_job_widget_area"> <span class="job-type full-type">Full Time</span>
          <div class="utf_job_like">
            <label class="toggler toggler-danger">
              <input type="checkbox" checked>
              <i class="fa fa-heart"></i> </label>
          </div>
          <div class="u-content">
            <div class="avatar box-80"> <a href="employer-detail.html"> <img class="img-responsive" src="{{ asset('assets/job_assets/img/company_logo_1.png') }}" alt=""> </a> </div>
            <h5><a href="employer-detail.html">Product Redesign</a></h5>
            <p class="text-muted">2708 Scenic Way, IL 62373</p>
          </div>
          <div class="utf_apply_job_btn_item"> <a href="job-detail.html" class="btn job-browse-btn btn-radius br-light">Apply Now</a> </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    {{-- <div class="utf_flexbox_area padd-0">
		<ul class="pagination">
		  <li class="page-item"> <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">«</span> <span class="sr-only">Previous</span> </a> </li>
		  <li class="page-item active"><a class="page-link" href="#">1</a></li>
		  <li class="page-item"><a class="page-link" href="#">2</a></li>
		  <li class="page-item"><a class="page-link" href="#">3</a></li>
		  <li class="page-item"> <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true">»</span> <span class="sr-only">Next</span> </a> </li>
		</ul>
	</div> --}}
  </div>
</section>
<!-- ====================== End Job Detail 2 ================ -->
@endsection
