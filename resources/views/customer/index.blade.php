@extends('layouts.partials')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Customers</h1>
            <div style="margin-left:auto; display:flex">
                <div class="mr-3">
                    <a href="#"><button class="btn btn-outline-info" data-toggle="modal" data-target="#customerModalCenter"><i class="fas fa-plus"></i>&nbsp;Add Customer</button></a>
                  </div>
                  <div class="mr-3">
                    <a href="{{ route('customer.template') }}"><button class="btn btn-outline-success"><i class="fas fa-download"></i>&nbsp;Export CSV</button></a>
                  </div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                    <br>
                    <div class="text-center">
                        @if(session('success'))
                        <div class="alert alert-success" style="width:92%; margin:auto">
                        {{session('success')}}</div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger" style="width:92%; margin:auto">
                        {{session('error')}}</div>
                        @endif
                   </div>
                  <div class="card-header">
                    <h4>Customers Table</h4>
                    {{-- <div class="card-header-action">
                        <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </form>
                      </div> --}}
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <tr>
                          <!-- <th>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th> -->
                          <th class="text-center">
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                          </th>
                          <th>Customer Name</th>
                          <th>Customer Phone</th>
                          <th>Customer Email</th>
                          <th>Date Created</th>
                        </tr>
                        @foreach ($customers as $customer )
                        <tr>
                            <td class="p-0 text-center">
                              <th class="text-center">
                                <i class="fas fa-th"></i>
                              </th>
                            </td>
                            <td>{{ $customer->customer_name }}</td>
                            <td>{{ $customer->customer_phone }}</td>
                            <td>{{ $customer->customer_email }}</td>
                            <td>{{ $customer['created_at']->toDayDateTimeString() }}</td>
                          </tr>
                        @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        {{ $customers->links() }}

        <div class="modal fade" id="customerModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Add New Customer</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
                      <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('retail-customers.store') }}" method="POST">
                                @csrf
                                <!-- Name -->
                                <div class="form-group">
                                    <input id="name" class="form-control" type="text" name="customer_name" placeholder="Fullname" />
                                </div>
                                <!-- Phone Number -->
                                <div class="form-group">
                                    <input id="phone" class="form-control" type="phone" name="customer_phone" placeholder="Phone" />
                                </div>
                                <!-- Email Address -->
                                <div class="form-group">
                                    <input id="email" class="form-control" type="email" name="customer_email" placeholder="Email" />
                                </div>
                                <div class="modal-footer bg-whitesmoke br">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                            </form>
                        </div>
                     </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      @endsection
