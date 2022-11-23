@extends('layouts.master')
@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        @role('admin')
        <h4>Store Reports</h4>
        @endrole
        @role('staff')
        <h4>My Store Reports</h4>
        @endrole
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Apps</a></div>
          <div class="breadcrumb-item">Blog</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
         @foreach ($store_arr as $key => $value )
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article">
              <div class="article-header">
                <div class="article-image" data-background="assets/img/blog/store.jpg">
                </div>
                <div class="article-title">
                  {{-- <h2 class="text-center"><a href="#">{{ $value }}</h2> --}}
                </div>
              </div>
              <div class="article-details text-center">
                <p><b>{{ strToUpper($value) }}</b></p>
                <div class="article-cta">
                  <a href="{{ route('retail-report.store_sale', str_replace(' ', '_', strtolower($value))) }}" class="btn btn-info">View Reports</a>
                </div>
              </div>
            </article>
          </div>
          @endforeach
          @foreach ($staff_arr as $key => $value  )
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article">
                <div class="article-header">
                  <div class="article-image" data-background="assets/img/blog/store.jpg">
                  </div>
                  <div class="article-title">
                    {{-- <h2 class="text-center"><a href="#">{{ $value }}</h2> --}}
                  </div>
                </div>
                <div class="article-details text-center">
                    <p><b>{{ strToUpper($value) }}</b></p>
                  <div class="article-cta">
                    <a href="{{ route('retail-report.store_sale', str_replace(' ', '_', strtolower($value))) }}" class="btn btn-primary">View Reports</a>
                  </div>
                </div>
              </article>
          </div>
          @endforeach
        </div>
      </div>
    </section>
  </div>
@endsection
