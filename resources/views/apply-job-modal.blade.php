<!-- The Modal -->
<div class="modal fade" id="apply_{{ $job->id }}">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Write Job Application Letter</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('jobs.apply', $job->id) }}" class="bg-white" method="POST" enctype="multipart/form-data">
                @csrf
                @include('layout.errors')
                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="application_letter">Application Letter</label>
                        <textarea name="application_letter" value="{{ old('application_letter') }}"  class="form-control" id="application_letter" cols="30" rows="5"></textarea>
                    </div>
                </div>

                <div class="row form-group mb-3">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <input type="file" class="form-control-file border mb-4" name="file"  id="file" hidden>
                        <label for="file" class="btn btn-dark" style="cursor: pointer;"><i class="icon-paperclip" aria-hidden="true"></i> <span id="file_name">...Attach a document (e.g CV)</span></label>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <input type="submit" value="Submit" class="btn btn-primary  py-2 px-5">
                    </div>
                </div>


            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
</div>
