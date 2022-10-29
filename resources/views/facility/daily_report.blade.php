@extends('layouts.master')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/facility-report">Manage Reports</a></div>
              <div class="breadcrumb-item">Reports Table</div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Reports</h4>
                    <div class="card-header-action">
                        <form>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Filter Date">
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
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                        @foreach ($report_arr as $key => $date )
                          {{-- <input type="text" name="store_sale" value="{{ $store_sale }}" class="form-control" hidden>
                          <input type="text" name="created_date" value="{{ $key }}" class="form-control" hidden> --}}
                            <td class="p-0 text-center">
                              <th class="text-center">
                                <i class="fas fa-th"></i>
                              </th>
                            </td>
                            @if (isset($key))
                            <td>{{ $date[0]['created_at']->toDayDateTimeString() }}</td>
                            @else
                            <td>No Record!</td>
                            @endif
                            <td>
                            <a href="/facility-report/fetch_records/{{ $date[0]['created_at']->format('Y-m-d') }}/{{ str_replace(' ','_', $date[0]['store_id']) }}/"><button name="submit" class="btn btn-outline-dark"><i class="far fa-eye"></i>&nbsp;Details</button></a>
                            </td>
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
