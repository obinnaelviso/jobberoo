<!-- The Modal -->
<div class="modal fade" id="view_{{ $job->id }}">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">View Job</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="col-12 mb-3 mb-0">
                    <h6><b>Job Title</b></h6>
                    <p>{{ $job->title }}</p>
                </div>
                <div class="col-12 mb-3 mb-0">
                    <h6><b>Job Description</b></h6>
                    <p>{{ $job->description }}</p>
                </div>
                <div class="col-6 mb-3 mb-0">
                    <h6><b>Salary</b></h6>
                    <p>N{{ $job->salary }}</p>
                </div>
                <div class="col-6 mb-3 mb-0">
                    <h6><b>Is Negotiable?</b></h6>
                    <p>{{ $job->is_negotiable ? 'Yes' : 'No' }}</p>
                </div>
                <div class="col-6 mb-3 mb-0">
                    <h6><b>Company</b></h6>
                    <p>{{ $job->company }}</p>
                </div>
                <div class="col-6 mb-3 mb-0">
                    <h6><b>Location</b></h6>
                    <p>{{ $job->location }}</p>
                </div>
                <div class="col-6 mb-3 mb-0">
                    <h6><b>Category</b></h6>
                    <p>{{ $job->category->title }}</p>
                </div>
                <div class="col-6 mb-3 mb-0">
                    <h6><b>Type</b></h6>
                    <p>{{ $job->type->title }}</p>
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
