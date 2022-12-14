@extends('layouts.jobs')
@section('content')
<!-- ======================= Start Page Title ===================== -->
<div class="page-title">
	<div class="container">
	  <div class="page-caption">
		<h2>Resume Detail</h2>
		<p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> Resume Detail</p>
	  </div>
	</div>
</div>
<!-- ======================= End Page Title ===================== -->

<!-- ====================== Resume Detail ================ -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-7">
        <div class="detail-wrapper">
          <div class="detail-wrapper-body">
            <div class="row">
				<div class="col-md-4 text-center user_profile_img mrg-bot-30"> <img src="assets/img/client-1.jpg" class="img-circle width-100" alt=""/>
				  <h4 class="meg-0">Alden Smith</h4>
				  <span>Front End Designer</span>
				</div>
				<div class="col-md-8 user_job_detail">
				  <div class="col-md-12 mrg-bot-10"> <i class="ti-location-pin padd-r-10"></i>2726 Shinn, New York </div>
				  <div class="col-md-12 mrg-bot-10"> <i class="ti-email padd-r-10"></i>mail@example.com </div>
				  <div class="col-md-12 mrg-bot-10"> <i class="ti-mobile padd-r-10"></i>91 234 567 8765 </div>
				  <div class="col-md-12 mrg-bot-10"> <i class="ti-credit-card padd-r-10"></i>$12/Hour </div>
				  <div class="col-md-12 mrg-bot-10"> <i class="ti-shield padd-r-10"></i>3 Year Exp. </div>
				  <div class="col-md-12 mrg-bot-10"> <span class="skill-tag">css</span> <span class="skill-tag">HTML</span> <span class="skill-tag">Photoshop</span> </div>
				</div>
			</div>
          </div>
        </div>
        <div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>Career</h4>
          </div>
          <div class="detail-wrapper-body">
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.</p>
            <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
          </div>
        </div>
        <div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>Education</h4>
          </div>
          <div class="detail-wrapper-body">
            <div class="edu-history info"> <i></i>
              <div class="detail-info">
                <h3>University</h3>
                <i>2020 - 2020</i> <span> denouncing pleasure and praising pain <i>It Computer</i></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
              </div>
            </div>
            <div class="edu-history danger"> <i></i>
              <div class="detail-info">
                <h3>Intermediate School</h3>
                <i>2015 - 2020</i> <span>denouncing pleasure and praising pain <i>It Computer</i></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
              </div>
            </div>
            <div class="edu-history success"> <i></i>
              <div class="detail-info">
                <h3>High School</h3>
                <i>2012 - 2015</i> <span>denouncing pleasure and praising pain <i>It Computer</i></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>Work & Experience</h4>
          </div>
          <div class="detail-wrapper-body">
            <div class="edu-history info"> <i></i>
              <div class="detail-info">
                <h3>Php Developer</h3>
                <i>2008 - 2012</i>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
              </div>
            </div>
            <div class="edu-history danger"> <i></i>
              <div class="detail-info">
                <h3>Java Developer</h3>
                <i>2012 - 2014</i>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
              </div>
            </div>
            <div class="edu-history success"> <i></i>
              <div class="detail-info">
                <h3>CMS Developer</h3>
                <i>2014 - 2018</i>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-md-4 col-sm-5">
        <div class="sidebar">
		  <div class="widget-boxed">
			  <div class="text-center">
				  <button type="submit" class="btn btn-m btn-success">Download Resume</button>
			  </div>
		  </div>
          <div class="widget-boxed">
			<div class="widget-boxed-header">
              <h4><i class="ti-location-pin padd-r-10"></i>Location</h4>
            </div>
            <div class="widget-boxed-body">
              <div class="side-list no-border">
                <ul>
                  <li><i class="ti-credit-card padd-r-10"></i>Package: 20K To 50K/Month</li>
                  <li><i class="ti-world padd-r-10"></i>https://www.example.com</li>
                  <li><i class="ti-mobile padd-r-10"></i>91 234 567 8765</li>
                  <li><i class="ti-email padd-r-10"></i>mail@example.com</li>
                  <li><i class="ti-pencil-alt padd-r-10"></i>Bachelor Degree</li>
                  <li><i class="ti-shield padd-r-10"></i>3 Year Exp.</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- End: Job Overview -->

          <!-- Start: Opening hour -->
          <div class="widget-boxed">
            <div class="widget-boxed-header">
              <h4><i class="ti-headphone padd-r-10"></i>Contact Now</h4>
            </div>
            <div class="widget-boxed-body">
              <form>
                <input type="text" class="form-control" placeholder="Name *">
                <input type="text" class="form-control" placeholder="Email *">
                <input type="text" class="form-control" placeholder="Phone">
                <textarea class="form-control height-140" placeholder="Message..."></textarea>
                <button class="btn theme-btn full-width mrg-bot-20">Send Email</button>
              </form>
            </div>
          </div>
          <!-- End: Opening hour -->
        </div>
      </div>
      <!-- End Sidebar -->
    </div>
    <!-- End Row -->
  </div>
</section>
<!-- ====================== End Resume Detail ================ -->
@endsection
