@extends('layouts.master')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Stores</div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    @role('admin')
                    <h4>All Stores</h4>
                    @endrole
                    @role('staff')
                    <h4>My Store Reports</h4>
                    @endrole
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
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          {{-- <input type="text" class="form-control" placeholder="Search"> --}}
                          {{-- <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div> --}}
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th class="text-center">
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                          </th>
                          <th>Stores</th>
                          <th>Action</th>
                        </tr>
                        @foreach ($store_arr as $key => $value )
                        <tr>
                            <td class="p-0 text-center">
                              <th class="text-center">
                                <i class="fas fa-th"></i>
                              </th>
                            </td>
                            @if (isset($value))
                            <td>{{ $value }}</td>
                            @else
                            <td>No Record!</td>
                            @endif
                            <td><a href="{{ route('retail-report.store_sale', str_replace(' ', '_', strtolower($value))) }}" class="btn btn-outline-dark"><i class="far fa-eye"></i>&nbsp;View Reports</td>
                          </tr>
                        @endforeach
                        @foreach ($staff_arr as $key => $value )
                        <tr>
                            <td class="p-0 text-center">
                              <th class="text-center">
                                <i class="fas fa-th"></i>
                              </th>
                            </td>
                            @if (isset($value))
                            <td>{{ $value }}</td>
                            @else
                            <td>No Record!</td>
                            @endif
                            <td><a href="{{ route('retail-report.store_sale', str_replace(' ', '_', strtolower($value))) }}" class="btn btn-outline-dark"><i class="far fa-eye"></i>&nbsp;View Reports</a></td>
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
        {{-- {{ $students->links('pagination::bootstrap-4') }} --}}
      </div>
      @endsection
