@extends('layout.main')
@section('title', $job->title.' Job Applications - '.config('app.name'))
@section('nav-title', $job->title.' Job Applications')
@section('dashboard-active', 'active')
@section('content')
@include('layout.global-header')
<section class="ftco-section">
    <div class="container">
      <div class="row d-flex">
          <div class="col-md-12 mb-3">
              <a href="{{ route('dashboard.manage.jobs') }}"><< Back to Manage Jobs</a>
          </div>
          <div class="col-md-12">
            @include('layout.alerts')
            <table class="table table-hover" id="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Application Letter</th>
                    <th scope="col">Attachment</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>@php $i=1 @endphp
                @foreach($applications as $application)
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ substr($application->application_letter, 0, 100) }}</td>
                    <td>@if($application->attachment) <a href="/storage/{{ $application->attachment }}" download class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Download</a> @else <i>None</i> @endif</td>
                    <td>{{ $application->status->name }}</td>
                    <td>
                        <button type="button" class="btn btn-primary py-2" data-toggle="modal" data-target="#view_{{ $application->id }}"><i class="icon-eye" aria-hidden="true"></i> View</button>
                        @if($application->status->name == "pending")
                            <form action="{{ route('dashboard.manage.applications', $application->id) }}" method="POST" style="display: inline">
                                @csrf @method('put')
                                    <input type="submit" class="btn btn-success" name="status" value="Accept"/>
                                    <input type="submit" class="btn btn-danger" name="status" value="Reject"/>
                            </form>
                        @endif
                    </td>
                  </tr>
                  @include('dashboard.view-application-modal')
                @endforeach
                </tbody>
            </table>
          </div>
      </div>
    </div>
</section>
@endsection
@section('custom-js')
<script>
    $('#table').DataTable();
</script>
@endsection
