<!-- The Modal -->
<div class="modal fade" id="view_{{ $application->id }}">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">View Application</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="col-12 mb-3 mb-0">
                    <h6><b>Application Lettter</b></h6>
                    <p>{{ $application->application_letter }}</p>
                </div>
                <div class="col-12 mb-3 mb-0">
                    <h6><b>Attachment</b></h6>
                    <p>@if($application->attachment) <a href="/storage/{{ $application->attachment }}" download class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Download</a> @else <i>None</i> @endif</p>
                </div>
                <div class="col-12 mb-3 mb-0">
                    <h6><b>Email Address</b></h6>
                    <p>{{ $application->user->email }}</p>
                </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
</div>
