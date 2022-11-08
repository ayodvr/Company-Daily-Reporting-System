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
                <h4 class="text-center">Daily Report Form</h4>
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
                        <th class="text-center">Availability</th>
                        <th class="text-center">Condition</th>
                        <th class="text-center">Comments</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id='addr0'>
                        <td>1</td>
                        <td><input type="text" name='details[]'  placeholder='Enter Item Details' class="form-control" required/></td>
                        <td><select id="inputState" name='availability[]' class="form-control" required>
                          <option selected disabled>--Specify Availability--</option>
                          <option value="Available">Available</option>
                          <option value="Not Available">Not Available</option>
                        </select>
                        </td>
                        <td>
                          <select id="inputState" name='condition[]' class="form-control" required>
                            <option selected disabled>--Specify Condition--</option>
                            <option value="Good">Good</option>
                            <option value="Bad">Bad</option>
                          </select>
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

