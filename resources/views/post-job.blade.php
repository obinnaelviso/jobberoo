@extends('layout.main')
@section('title', 'Post a Job - '.config('app.name'))
@section('nav-title', 'Post a Job')
@section('content')
@include('layout.global-header')
<div class="ftco-section bg-light">
    <div class="container">
      <div class="row">

        <div class="col-md-12 mb-5">
            <form action="{{ route('jobs.post') }}" class="p-5 bg-white" method="POST" enctype="multipart/form-data">
                @csrf
                @include('layout.errors')
                @include('layout.alerts')
                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="logo">Upload Logo</label>
                        <input type="file" class="form-control-file" name="picture" id="logo" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="title">Job Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" placeholder="eg. Professional UI/UX Designer" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="description">Job Description</label>
                        <textarea name="description"  class="form-control" id="description" cols="30" rows="5" required>{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="row form-group mb-3">
                    <div class="col-md-8 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="salary">Salary</label>
                        <input type="text" id="salary" name="salary" value="{{ old('salary') }}" class="form-control" placeholder="eg. {{ config('app.currency') }}10000" required>
                    </div>
                    <div class="col-md-4 mb-md-0 mt-3">
                        <label for="is_negotiable">Negotiable
                        <input type="checkbox" id="is_negotiable" value="1" name="is_negotiable">
                        </label>
                    </div>
                </div>

                <div class="row form-group mb-3">
                    <div class="col-md-6 mb-md-0">
                      <label class="font-weight-bold" for="type_id">Job Type</label>
                      <select name="type_id" class="form-control" id="type_id" required>
                          <option value="" disabled selected>Select Job Type: </option>
                          @foreach($types as $type)
                            <option {{ old('type_id')? 'selected': '' }} value="{{ $type->id }}">{{ $type->title }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col-md-6 mb-md-0">
                        <label class="font-weight-bold" for="category_id" required>Job Category</label>
                        <select name="category_id" class="form-control" id="category_id">
                            <option value="" disabled selected>Select Category: </option>
                            @foreach($categories as $category)
                              <option {{ old('category_id')? 'selected': '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                      </div>
                </div>

                <div class="row form-group mb-3">
                    <div class="col-md-6 mb-md-0">
                        <label class="font-weight-bold" for="company" required>Company</label>
                        <input type="text" id="company" name="company" value="{{ old('company') }}" class="form-control" placeholder="eg. Facebook, Inc.">
                    </div>
                    <div class="col-md-6 mb-md-0">
                        <label class="font-weight-bold" for="location" required>Location</label>
                        <input type="text" id="location" name="location" value="{{ old('location') }}" class="form-control" placeholder="eg. London, UK.">
                    </div>
                </div>

                <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" value="Post Job" class="btn btn-primary  py-2 px-5">
                </div>
                </div>


            </form>
        </div>
      </div>
    </div>
</div>
@endsection
@section('custom-js')
<script type="module">
    $("#is_negotiable").Sswitch({
      onSwitchChange: function() {
      }
    });
</script>
@endsection
