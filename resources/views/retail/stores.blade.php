@extends('layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
      {{-- <b><h1>DreamHR</h1></b> --}}
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-sm-6 col-12">
        <div class="card">
          <div class="card-header">
            <h4>Store Locations</h4>
          </div>
          <div class="card-body">
            <div id="visitorMap"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
  @endsection