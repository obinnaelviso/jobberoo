@extends('layout.main')
@section('title', 'View Job Applications - Joberoo')
@section('nav-title', 'View Job Applications')
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
                    <td>{{ $application->attachment ? 'Yes' : 'No' }}</td>
                    <td>{{ $application->status->name }}</td>
                    <td><button type="button" class="btn btn-primary pull-right py-2" data-toggle="modal" data-target="#view_{{ $application->id }}"><i class="icon-eye" aria-hidden="true"></i> View</button></td>
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
