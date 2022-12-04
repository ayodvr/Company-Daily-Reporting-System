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
                <div><h4 class="text-center">Report Form</h4></div>
                <div>
                    <a href="/facility-report"><button class="btn btn-outline-secondary"><i class="far fa-eye"></i>&nbsp;Manage Report</button></a>
                </div>
                </div>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('facility-report.store') }}" id="form">
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
                <table class="table table-bordered table-hover" id="tab_logic">
                    <thead>
                      <tr>
                        <th class="text-center">S/N</th>
                        <th class="text-center"> Item Details </th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Status(Yes/No)</th>
                        <th class="text-center">Condition(Good/Fair/Bad)</th>
                        <th class="text-center">Comments / Recommendation</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id='addr0'>
                        <td>1</td>
                        <td><select name='details[]' class="form-control" required>
                            <option selected disabled>--Specify Details--</option>
                            <option value="BULB">BULB</option>
                            <option value="METER CHECK">METER CHECK</option>
                            <option value="GENERAL ELECTRICITY">GENERAL ELECTRICITY</option>
                            <option value="LADDER">LADDER</option>
                            <option value="CCTV / CAMERA">CCTV / CAMERA</option>
                            <option value="PRINTER">PRINTER</option>
                            <option value="PRINTER TONER">PRINTER TONER</option>
                            <option value="SYSTEMS/LAPTOP/MOUSE">SYSTEMS/LAPTOP/MOUSE</option>
                            <option value="UPS">UPS</option>
                            <option value="OFFICE STATIONERY">OFFICE STATIONERY</option>
                            <option value="CLEANING & SUPPLIES">CLEANING & SUPPLIES</option>
                            <option value="FILE CABINET">FILE CABINET</option>
                            <option value="INTERNET SERVER">INTERNET SERVER</option>
                            <option value="BARCODE SCANNER">BARCODE SCANNER</option>
                            <option value="SECURITY ISSUES">SECURITY ISSUES</option>
                            <option value="GENERAL ISSUE ON THE ENVIRONMENT">GENERAL ISSUE ON THE ENVIRONMENT</option>
                            <option value="DREAMWORKS SIGNAGE">DREAMWORKS SIGNAGE</option>
                            <option value="WATER DISPENSER">WATER DISPENSER</option>
                            <option value="LED LIGHTS ON DISPLAY SHELVES">LED LIGHTS ON DISPLAY SHELVES</option>
                            <option value="PRODUCTS STAND">PRODUCTS STAND</option>
                            <option value="EXPOSED WIRE">EXPOSED WIRE</option>
                            <option value="FIRE EXTINGUISHER">FIRE EXTINGUISHER</option>
                            <option value="CLEANING & SUPPLIES">CLEANING & SUPPLIES</option>
                            <option value="UNSTOCKED ITEMS">UNSTOCKED ITEMS</option>
                            <option value="AIR CONDITIONER">AIR CONDITIONER</option>
                            <option value="PETROL GENERATOR">PETROL GENERATOR</option>
                            <option value="CLEANERS PRESENT">CLEANERS PRESENT</option>
                            <option value="SECURITY PERSONNELS">SECURITY PERSONNELS</option>
                          </select>
                          </td>
                        {{-- <td><input type="text" name='details[]'  placeholder='Enter Item Details' class="form-control" required/></td> --}}
                        <td>
                            <input type="text" name='availability[]'  placeholder='Enter Description' class="form-control" required/>
                        </td>
                        <td>
                            <select id="inputState" name='status[]' class="form-control" required>
                              <option selected disabled>--Specify Status--</option>
                              <option value="yes">Yes</option>
                              <option value="no">No</option>
                            </select>
                          </td>
                        <td>
                            <input type="text" name='condition[]'  placeholder='Specify Condition' class="form-control" required/>
                        </td>
                        <td><textarea name="comments[]" placeholder='Write Comments' class="form-control" style="margin: 7px"></textarea></td>
                      </tr>
                      <tr id='addr1'></tr>
                    </tbody>
                  </table>
                  <div class="row clearfix">
                    <div class="col-md-12 text-center">
                       <button type="submit" class="btn btn-outline-dark"><i class="fas fa-check"></i>&nbsp;Save Records</button>
                    </div>
                 </div>
                </form>
                 <div class="row clearfix">
                 <div class="col-md-12">
                    <button id="add_row" class="btn btn-info pull-left"><i class="fas fa-plus"></i></button>
                    <button id='delete_row' class="pull-right btn btn-danger"><i class="fas fa-times"></i></button>
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

