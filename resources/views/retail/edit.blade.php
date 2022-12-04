@extends('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
      &nbsp;&nbsp;
      <div class="section-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <div class="col-12 d-flex justify-content-between mb-2">
                    <div><h4 class="text-center">Edit Report</h4></div>
                    {{-- <div>
                      <a href="/retail-report"><button class="btn btn-outline-secondary"><i class="far fa-eye"></i>&nbsp;Manage Report</button></a>
                    </div> --}}
                  </div>
              </div>
            <form method="POST" action="{{ route('retail-report.update', $report->id) }}" enctype="multipart/form-data" class="register-form" id="register-form">
              {{method_field('PUT')}}
              @csrf
                <input type="text" name="store_code" value="{{ auth()->user()->store_code }}" class="form-control" hidden>
                <input type="text" name="today_date" value="{{ $daily_date }}" class="form-control" hidden>
                <input type="text" name="store_name" value="{{ auth()->user()->store }}" class="form-control" hidden>
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
                  <div class="form-group col-md-3">
                    <label for="inputEmail4">Customer Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $report->name }}">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $report->phone }}">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $report->email }}">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Date Of Birth</label>
                    <input type="date" name="dob" class="form-control" value="{{ $report->dob }}">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="inputEmail4">Invoice No</label>
                    <input type="text" name="invoice" class="form-control" value="{{ $report->invoice }}">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="">Product Details</label>
                    <select class="form-select" id="basic-product" data-placeholder="Select Product" name="product">
                      <option selected value="{{ $report->product }}">{{ $report->product }}</option>
                      <option>Reactive</option>
                      <option>Solution</option>
                      <option>Conglomeration</option>
                      <option>Algoritm</option>
                      <option>Holistic</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="">Units</label>
                    <input type="number" name="unit" class="form-control" value="{{ $report->unit }}">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputZip">Store Location</label>
                    <input type="text" name="store" value="{{ auth()->user()['store'] }}" class="form-control" readonly>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputZip">Type Of Customer</label>
                    <select id="inputState" name="customer" class="form-control">
                      <option selected value="{{ $report->customer }}">{{ $report->customer }}</option>
                      <option value="Yes">New</option>
                      <option value="No">Old</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="inputCity">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $report->address }}">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputCity">Mode Of Payment</label>
                    <input type="text" name="payment" class="form-control" value="{{ $report->payment }}">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputCity">Sold By</label>
                    <input type="text" name="sold_by" class="form-control" value="{{ $report->sold_by }}">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputZip">Confirm By</label>
                    <input type="text" name="confirm" class="form-control" value="{{ $report->confirm }}">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputZip">Amount</label>
                    <input type="text" name="amount" class="form-control" value="{{ $report->amount }}">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="inputCity">Visited Our Website ?</label>
                    <select id="inputState" name="visited" class="form-control">
                      <option selected value="{{ $report->visited }}">{{ $report->visited }}</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputCity">How Did You Find Us ?</label>
                    <select id="inputState" name="found" class="form-control">
                      <option selected value="{{ $report->found }}">{{ $report->found }}</option>
                      <option value="Social Media">Social Media</option>
                      <option value="Store Activation">Store Activation</option>
                      <option value="Blog">Blog</option>
                      <option value="Newspaper">Newspaper</option>
                      <option value="Newsletter">Newsletter</option>
                      <option value="Referral">Referral</option>
                      <option value="Radio Jingle">Radio Jingle</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputCity">Cash At Hand</label>
                    <input type="text" name="cash_hand" class="form-control" value="{{ $report->cash_hand }}">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputCity">Amount Paid In Bank</label>
                    <input type="text" name="cash_bank" class="form-control" value="{{ $report->cash_bank }}">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputCity">Bank Paid To</label>
                    <input type="text" name="bank_paid" class="form-control" value="{{ $report->bank_paid }}">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputCity">Serial number</label>
                    <input type="text" name="serial_no" class="form-control" value="{{ $report->serial_no }}">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputCity">QTY SOLD</label>
                    <input type="number" name="qty_sold" class="form-control" value="{{ $report->qty_sold }}">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputCity">SYS QTY</label>
                    <input type="number" name="sys_qty" class="form-control" value="{{ $report->sys_qty }}">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputCity">PHY QTY</label>
                    <input type="number" name="phy_qty" class="form-control" value="{{ $report->phy_qty }}">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputCity">Payslips</label>
                    <input type="file" name="payslips" class="form-control">
                  </div>
                </div>
              </div>
              <div class="card-footer text-center">
                <button class="btn btn-primary btn-lg" type="submit">Update Report</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection
