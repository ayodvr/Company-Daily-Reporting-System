@extends('layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
<section class="section">
    {{-- <div class="section-header">
      <b><h1>DreamHR</h1></b>
    </div> --}}
    <br>
    <div class="row">
      <div class="col-lg-12">
        <div class="p-6 m-20 rounded shadow" style="position: -webkit-sticky">
            {!! $chart->container() !!}
        </div>
    </div>
  </section>
</div>
<script src="{{ $chart->cdn() }}"></script>
  {{ $chart->script() }}
  @endsection