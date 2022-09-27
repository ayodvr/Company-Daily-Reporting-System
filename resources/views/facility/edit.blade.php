<div class="modal fade facilityModal" id="edit{{ $report->id }}" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Report</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('facility-report.update', $report->id) }}">
                {{method_field('PUT')}}
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Item Details</label>
                    <div class="col-sm-9">
                        <input type="text" name='details' value="{{ $report->item_details }}" placeholder='Enter Item Details' class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Availability</label>
                    <div class="col-sm-9">
                        <input type="text" name='availability' value="{{ $report->availability }}" placeholder='Specify Availability' class="form-control qty"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Condition</label>
                    <div class="col-sm-9">
                        @if(isset($report->condition))
                        <input type="text" name='condition' value="{{ $report->condition }}" placeholder='Specify Condition' class="form-control price"/>
                        @else
                        <input type="text" name='condition' value="N/A" placeholder='Specify Condition' class="form-control price"/>
                        @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Comments</label>
                    <div class="col-sm-9">
                        @if(isset($report->comments))
                        <textarea name="comments" placeholder='Write Comments' class="form-control" style="margin: 7px">{{ $report->comments }}</textarea>
                        @else
                        <textarea name="comments" placeholder='Write Comments' class="form-control" style="margin: 7px">N/A</textarea>
                        @endif
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


                 
  