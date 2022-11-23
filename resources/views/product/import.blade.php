@extends('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
      {{-- <div class="section-header">
        <h1>Daily Report Form</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Forms</a></div>
          <div class="breadcrumb-item">Daily Report Form</div>
        </div>
      </div> --}}
      &nbsp;&nbsp;
      <div class="section-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <div class="col-12 d-flex justify-content-between mb-2">
                  <div><h4 class="text-center">Daily Report Form</h4></div>
                  <div>
                    <a href="/retail-report"><button class="btn btn-outline-secondary"><i class="far fa-eye"></i>&nbsp;Manage Report</button></a>
                  </div>
                </div>
              </div>
            <form method="POST" action="{{ route('products.import_Template') }}" enctype="multipart/form-data" class="register-form" id="register-form">
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
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="">Import Products</label>
                    <input type="file" name="file" class="form-control" id="">
                  </div>
                </div>
              </div>
              <div class="card-footer text-center">
                <button class="btn btn-primary btn-lg" type="submit">Upload Products</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection
  <script>
  function myFunction_sell() {
  first = Number($('#unit').val());
  second = Number($('#price').val());
  if(first && second && !isNaN(first) && !isNaN(second)){
      $('span#ShowSell').text( "Total Amount: " + first * second + ".00"+ " NGN" );
      $('input#InputSell').val(first * second);
  }
  else {
      $('span#ShowSell').text(" ");
  }
}
</script>
