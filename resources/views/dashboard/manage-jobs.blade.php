@extends('layout.main')
@section('title', 'Manage Jobs - '.config('app.name'))
@section('nav-title', 'Manage Job Applications')
@section('dashboard-active', 'active')
@section('content')
@include('layout.global-header')
<section class="ftco-section">
    <div class="container">
      <div class="row d-flex">
            <div class="col-md-12 mb-3">
                <a href="{{ route('dashboard') }}"><< Back to Dashboard</a>
            </div>
          <div class="col-md-12">
            <table class="table table-hover" id="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Category</th>
                    <th scope="col">Picture</th>
                    <th scope="col">No. of Applications</th>
                    <th scope="col">Accepted Applications</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                @foreach($jobs as $job)
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->type->title }}</td>
                    <td>{{ $job->category->title }}</td>
                    <td><img src="{{ asset($job->public_url) }}" width="150px" class="img-fluid"></td>
                    <td><a href="{{ route('dashboard.manage.jobs.applications', $job->id) }}" class="btn btn-warning">{{ $job->applications->count() }}</a></td>
                    <td><a href="{{ route('dashboard.manage.jobs.applications', ['job' => $job->id, 'application_status' => $accepted_status]) }}" class="btn btn-success">{{ $job->applications->where('status_id', $accepted_status)->count() }}</a></td>
                    <td>{{ $job->status->name }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#view_{{ $job->id }}">View</button> |
                        <a href="{{ route('dashboard.manage.edit.job', $job->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a> |
                        <form action="{{ route('dashboard.manage.job.status', $job->id) }}" method="POST" style="display: inline">
                            @csrf @method('put')
                                @if($job->status->name == 'open')
                                    <input type="submit" class="btn btn-danger btn-sm mb-1" name="status" value="Close Job"/>
                                @else
                                    <input type="submit" class="btn btn-success btn-sm mb-1" name="status" value="Open Job"/>
                                @endif
                        </form>
                    </td>
                  </tr>
                  @include('dashboard.view-job-modal')
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
