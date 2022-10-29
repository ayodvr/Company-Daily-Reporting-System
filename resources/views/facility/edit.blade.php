<div class="modal fade" id="company-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Report</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        <div class="modal-body">
            <form action="javascript:void(0)" id="CompanyForm" name="CompanyForm" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <input type="text" name='id' id='id' hidden placeholder='Enter Item Details' class="form-control"/>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Item Details</label>
                    <div class="col-sm-9">
                        <input type="text" name='item_details' id='item_details' placeholder='Enter Item Details' class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Availability</label>
                    <div class="col-sm-9">
                        <input type="text" name='availability' id='availability' placeholder='Specify Availability' class="form-control qty"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Condition</label>
                    <div class="col-sm-9">
                        <input type="text" name='condition' id='condition' placeholder='Specify Condition' class="form-control price"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Comments</label>
                    <div class="col-sm-9">
                        <textarea name="comments" id="comments" placeholder='Write Comments' class="form-control" style="margin: 7px"></textarea>
                    </div>
                  </div>
                <div class="row clearfix">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-outline-dark">Update</button>
                </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>



