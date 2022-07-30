@extends('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Daily Report Form</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Forms</a></div>
          <div class="breadcrumb-item">Daily Report Form</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              {{-- <div class="card-header">
                <h4>Horizontal Form</h4>
              </div> --}}
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="inputEmail4">Customer Name</label>
                    <input type="email" class="form-control" id="inputEmail4">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputPassword4">Phone</label>
                    <input type="password" class="form-control" id="inputPassword4">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputPassword4">Email</label>
                    <input type="password" class="form-control" id="inputPassword4">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputPassword4">Date Of Birth</label>
                    <input type="password" class="form-control" id="inputPassword4">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="inputEmail4">Invoice No</label>
                    <input type="email" class="form-control" id="inputEmail4">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputPassword4">Product Details</label>
                    <input type="password" class="form-control" id="inputPassword4">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputPassword4">Units</label>
                    <input type="password" class="form-control" id="inputPassword4">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputZip">Store Location</label>
                    <input type="text" class="form-control" id="inputZip">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputZip">Type Of Customer</label>
                    <input type="text" class="form-control" id="inputZip">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputCity">Address</label>
                    <input type="text" class="form-control" id="inputCity">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputCity">Mode Of Payment</label>
                    <input type="text" class="form-control" id="inputCity">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputZip">Confirm By</label>
                    <input type="text" class="form-control" id="inputZip">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputZip">Amount</label>
                    <input type="text" class="form-control" id="inputZip">
                  </div>
                  {{-- <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control">
                      <option selected>Choose...</option>
                      <option>...</option>
                    </select>
                  </div> --}}
                </div>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="inputCity">Visited Our Website ?</label>
                    <input type="text" class="form-control" id="inputCity">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputCity">How Did You Find Us ?</label>
                    <input type="text" class="form-control" id="inputCity">
                  </div>
                </div>
              </div>
              {{-- <div class="form-row">
                <table class="table table-bordered" id="dynamicTable">  
                    <tr>
                        <th>Question</th>
                    </tr>
                    <tr>  
                        <td><input type="text" class="form-control" name="question[]" id="inputCity"/></td>   
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>
            </div> --}}
              <div class="card-footer">
                <button class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection