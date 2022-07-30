<form method="POST" action="{{ route('facility-report.update', $report['id']) }}">
    {{method_field('PUT')}}
    @csrf
    <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
        <tr>
            <th class="text-center">S/N</th>
            <th class="text-center"> Item Details </th>
            <th class="text-center">Availability</th>
            <th class="text-center">Condition</th>
            <th class="text-center">Comments</th>
        </tr>
        </thead>
        <tbody>
        <tr id='addr0'>
            <td>{{ $report->id }}</td>
            <td><input type="text" name='details' value="{{ $report->item_details }}" placeholder='Enter Item Details' class="form-control"/></td>
            <td><input type="text" name='availability' value="{{ $report->availability }}" placeholder='Specify Availability' class="form-control qty"/></td>
            <td><input type="text" name='condition' {{ $report->condition }} placeholder='Specify Condition' class="form-control price"/></td>
            <td><textarea name="comments" {{ $report->comments }} placeholder='Write Comments' class="form-control" style="margin: 7px"></textarea></td>
        </tr>
        </tbody>
    </table>    
    <div class="row clearfix">
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-outline-dark"><i class="fas fa-check"></i>&nbsp;Update</button>
    </div>
    </div>
</form>
                 
  