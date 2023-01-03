@extends('layouts.partials')
@section('content')
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Update Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">User</div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-sm-12 col-lg-6">
                <div class="card author-box card-primary">
                    <div class="card">
                        <div class="card-header">
                          <h4>Horizontal Form</h4>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Daily Target</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Weekly Target</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Monthly Target</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                      </div>
                </div>
              </div>
              <div class="col-12 col-sm-12 col-lg-6">
                <div class="card author-box card-primary">
                    <div class="card">
                        <div class="card-header">
                          <h4>Horizontal Form</h4>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                      </div>
                  </div>
            </div>
          </div>
        </section>
    @endsection
