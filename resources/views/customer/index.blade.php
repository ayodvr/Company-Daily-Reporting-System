@extends('layouts.master')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Customers</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item">Customers Table</div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Customer Table</h4>
                    <div class="card-header-form d-flex">
                        <div class="mr-3">
                            <a href="#"><button class="btn btn-outline-info"><i class="fas fa-plus"></i>&nbsp;Add Customer</button></a>
                          </div>
                        <div class="mr-3">
                          <a href="{{ route('customer.template') }}"><button class="btn btn-outline-success"><i class="fas fa-download"></i>&nbsp;Export CSV</button></a>
                        </div>
                        <div class="card-header-action">
                            <form>
                              <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                  <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                              </div>
                            </form>
                        </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
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
        {{ $customers->links('pagination::bootstrap-4') }}
      </div>
      @endsection
