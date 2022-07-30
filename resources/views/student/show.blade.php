@extends('layouts.master')
@section('content')
 <!-- Main Content -->
 <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Student Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="{{ route('student-biodata.index') }}">Back</a></div>
          <div class="breadcrumb-item">Student Profile</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-4">
            <div class="card author-box">
              <div class="card-body">
                <div class="author-box-center">
                  <img alt="image" src="{{ $student->image }}" class="rounded-circle author-box-picture">
                  <div class="clearfix"></div>
                  <div class="author-box-name">
                    <a href="#">{{ $student->firstname }}</a>
                  </div>
                  {{-- <div class="author-box-job">Web Developer</div> --}}
                </div>
                <div class="text-center">
                  {{-- <div class="author-box-description">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptatum alias molestias
                      minus quod dignissimos.
                    </p>
                  </div> --}}
                  <div class="mb-2 mt-3">
                    <div class="text-small font-weight-bold">Instagram Handle</div>
                  </div>
                  {{-- <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a href="#" class="btn btn-social-icon mr-1 btn-github">
                    <i class="fab fa-github"></i>
                  </a> --}}
                  <a href="https://instagram.com/{{ $student->handle }}" class="btn btn-social-icon mr-1 btn-instagram">
                    <i class="fab fa-instagram"></i>
                  </a>
                  <div class="w-100 d-sm-none"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
              <div class="padding-20">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                      aria-selected="true">About</a>
                  </li>
                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                    <div class="row">
                      <div class="col-md-3 col-6 b-r">
                        <strong>Full Name</strong>
                        <br>
                        <p class="text-muted">{{ $student->firstname }}&nbsp;&nbsp;{{ $student->lastname }}</p>
                      </div>
                      <div class="col-md-3 col-6 b-r">
                        <strong>Email</strong>
                        <br>
                        <p class="text-muted">{{ $student->email }}</p>
                      </div>
                      <div class="col-md-3 col-6 b-r">
                        <strong>Mobile</strong>
                        <br>
                        <p class="text-muted">{{ $student->phone }}</p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>School</strong>
                        <br>
                        <p class="text-muted">{{ $student->school }}</p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>Location</strong>
                        <br>
                        @if ($student->location == "--choose a location--")
                        <p class="text-muted">N/A</p>
                        @else
                        <p class="text-muted">{{ $student->location }}</p>
                        @endif
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>Date Registered</strong>
                        <br>
                        <p class="text-muted">{{ $student['created_at']->toFormattedDateString() }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection