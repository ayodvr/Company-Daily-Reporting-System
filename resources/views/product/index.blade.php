@extends('layouts.partials')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Price List</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
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
                  <div class="section-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                                <h4>Products Table</h4>
                              </div> --}}
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
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-striped table-hover" id="tableExport">
                                <thead>
                                <tr>
                                    <th class="text-center">S/N</th>
                                    <th>ITEM CODE</th>
                                    <th>PRODUCT NAME</th>
                                    <th>PART NUMBER</th>
                                    <th>RETAIL PRICE</th>
                                    <th>PRODUCT QUANTITY</th>
                                    {{-- <th>DISTRIBUTION PRICE</th> --}}
                                    </tr>
                                </thead>
                                @if (isset($all_products))
                                @foreach ($all_products as $product )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->ITEM_CODE }}</td>
                                    <td>{{ $product->PRODUCT_NAME }}</td>
                                    <td>{{ $product->PART_NUMBER }}</td>
                                    <td>{{ $product->RETAIL_PRICE }}</td>
                                    <td>{{ $product->Product_Quantity }}</td>
                                    {{-- <td>{{ $product->DISTRIBUTION_PRICE }}</td> --}}
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
              </div>
            </div>
          </div>
        </section>
        {{-- {{ $products->links() }} --}}

        <div class="modal fade" id="customerModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Update Price</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
                      <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="{{ route('products.import_Template') }}" enctype="multipart/form-data">
                                @csrf
                                <!-- Name -->
                                <div class="form-group">
                                    <label for="" style="color: green"><i class="fas fa-upload"></i> Upload CSV Sheet</label>
                                    <input type="file" name="file" class="form-control" id="">
                                </div>
                                <div class="modal-footer bg-whitesmoke br">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
