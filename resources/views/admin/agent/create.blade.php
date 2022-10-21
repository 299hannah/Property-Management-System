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
    <div class="card ">
        <div class="row justify-content-center">
            <form role="form" action="{{ route('agent.store') }}" method="post" class="col-lg-12">
                @csrf
                <div class="col-lg-6  " style="align-items: center">
                    <div class="card-header">
                        <h3 class="card-title">Add agent</h3>
                    </div>
                    <div class="card-body ">
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="username" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="phone number" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="password" value="{{ old('password') }}">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="confirm password">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <div class="checkbox">
                                <label><input type="checkbox" name="status" @if (old('status')==1) checked
                                     @endif value="1">Status</label>
                            </div>
                            <div class="row">
                                @foreach ($posts as $post )
                                <div class="col-lg-3">
                                    <div class="checkbox">
                                        <label for=""><input type="checkbox" name="post_id" value="{{ $post->id }}" checked>{{ $post->title }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center form-group col-lg-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href='{{ route('agent.index') }}' class="btn btn-info">Back</a>

                    </div>
                </div>

            </form>

        </div>
    </div>
</div>



@endsection
