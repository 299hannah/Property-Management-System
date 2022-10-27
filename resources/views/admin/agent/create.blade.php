@extends('admin.layouts.app')
@section('main-content')
@section('headsection')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(document).ready(function (){
    $('.select2').select2();
  })
</script>
@endsection
<div class="content-wrapper">
    <section class="content-header">
     <div class="card">
        <div class="card-header">Agent Page</div>
        <div class="card-body">
            <form role="form" action="{{ route('agent.store') }}" method="post" class="col-lg-12">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="name">Username</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="username" value="{{ old('name') }}">
                    </div>
                    <div class="col">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="phone number" value="{{ old('phone') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="email" value="{{ old('email') }}">
                    </div>
                    <div class="col">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" value="{{ old('password') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="confirm password">
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <div class="checkbox">
                        <label><input type="checkbox" name="status" @if (old('status') == 1) checked @endif value="1">Status</label>
                    </div>
                        <label for="">Select Property</label>
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-lg-3">
                                <div class="checkbox">
                                    <label for=""><input type="checkbox" name="post_id" value="{{ $post->id }}">{{ $post->title }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer text-center form-group col-lg-12">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
</div>
@stop
