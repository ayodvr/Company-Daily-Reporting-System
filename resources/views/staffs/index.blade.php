@extends('layouts.partials')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Staffs</h1>
            <div style="margin-left:auto; display:flex">
                <div class="mr-3">
                    <a href="#"><button class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fas fa-plus"></i>&nbsp;Add New Staff</button></a>
                  </div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                    <br>
                    <div class="text-center">
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger" style="width:92%; margin:auto">
                                {{$error}}</div>
                            @endforeach
                        @endif
                        @if(session('success'))
                        <div class="alert alert-success" style="width:92%; margin:auto">
                        {{session('success')}}</div>
                        @endif
                   </div>
                  <div class="card-header">
                    <h4>Staffs Table</h4>
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
                        <table class="table table-striped table-hover" id="tableExport">
                        <thead>
                         <tr>
                            <th class="text-center">S/N</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Unit</th>
                            <th>Store</th>
                            <th>Actions</th>
                         </tr>
                        </thead>
                        @if (isset($staffs))
                        @foreach ($staffs as $staff)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $staff->fullname }}</td>
                            <td>{{ $staff->email }}</td>
                            <td>{{ $staff->unit }}</td>
                            <td>{{ $staff->store }}</td>
                            @if ($staff->users['verified'] == 0)
                            <td><a href="staffs/unblock/{{ $staff->user_id }}"><button class="badge badge-warning" style="border:none">
                                <i class="fas fa-unlock"></i>&nbsp;Unblock</button></a>
                            </td>
                            @elseif($staff->users['verified'] == 1)
                            <td><a href="staffs/block/{{ $staff->user_id }}"><button class="badge badge-danger" style="border:none">
                                <i class="fas fa-ban"></i>&nbsp;Block</button></a>
                            </td>
                            @endif
                          </tr>
                        @endforeach
                        @endif
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        {{-- {{ $staffs->links() }} --}}
             <!-- Modal -->
     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Staff</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
                  <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('staffs.store') }}" method="POST">
                            @csrf
                            <!-- Name -->
                            <div class="form-group">
                                <input id="name" class="form-control" type="text" name="name" placeholder="Fullname" />
                            </div>
                             <!-- Phone -->
                             <div class="form-group">
                                <input id="phone" class="form-control" type="phone" name="phone" placeholder="Phone" />
                            </div>
                            <!-- Email Address -->
                            <div class="form-group">
                                <input id="email" class="form-control" type="email" name="email" placeholder="Email" />
                            </div>
                            <!-- Store Location -->
                            <div class="form-group">
                                <select class="form-select" id="basic-usage" data-placeholder="Select Store" name="store">
                                    <option>Select Store</option>
                                    @foreach ($stores as $store)
                                    <option value="{{ $store->store_name }}">{{ $store->store_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Unit -->
                            <div class="form-group">
                                <select class="form-select" id="basic-usage" name="unit">
                                    <option>Select Unit</option>
                                    <option value="retail">Retail</option>
                                    <option value="facility">Facility</option>
                                    <option value="distribution">Distribution</option>
                                    <option value="hr">Human Resource</option>
                                    <option value="service">Customer Service</option>
                                </select>
                            </div>
                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-primary">Save</button>
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
