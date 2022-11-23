@extends('layouts.master')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Students List</h1>
            {{-- <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Students Table</div>
            </div> --}}
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    {{-- <h4>Advanced Table</h4> --}}
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
                          <th>Image</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>School</th>
                          <th>Instagram Handle</th>
                          <th>Phone</th>
                          <th>Date Registered</th>
                          <th>Action</th>
                        </tr>
                        @foreach ($students as $student )
                        <tr>
                            <td class="p-0 text-center">
                              <th class="text-center">
                                <i class="fas fa-th"></i>
                              </th>
                            </td>
                            <td>
                                <img alt="image" src="{{ $student->image }}" class="circle" width="35"
                                  data-toggle="tooltip" title="{{ $student->firstname }}">
                              </td>
                            <td>{{ $student->firstname }}</td>
                            <td>{{ $student->lastname }}</td>
                            <td>{{ $student->school }}</td>
                            <td>
                                <div class="badge badge-info">{{ $student->handle }}</div>
                              </td>
                              <td>{{ $student->phone }}</td>
                            <td>{{ $student['created_at']->toFormattedDateString() }}</td>
                            <td><a href="{{ route('student-biodata.show', $student->id) }}" class="btn btn-primary">View</a></td>
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
        {{ $students->links('pagination::bootstrap-4') }}
      </div>
      @endsection
