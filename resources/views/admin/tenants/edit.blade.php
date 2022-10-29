@extends('admin.layouts.app')
@section('main-content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="card">
            <div class="card-header">Contactus Page</div>
            <div class="card-body">
                <form action="{{ url('admin/tenants/update/' . $tenant->id) }}" method="post">
                    {!! csrf_field() !!}
                    {{-- @method('PATCH') --}}
                    <div class="row mb-3">
                        <div class="col">
                            <input type="hidden" name="id" id="id" value="{{ $tenant->id }}" id="id">
                            <label>Name</label>
                            <input type="text" name="name" id="name" value="{{ $tenant->name }}" class="form-control"><br>
                        </div>
                        <div class="col">
                            <label>Phone Number</label>
                            <input type="text" name="phoneno" id="phoneno" value="{{ $tenant->phoneno }}" class="form-control"><br>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label>House Number</label>
                            <input type="text" name="houseno" id="houseno" value="{{ $tenant->houseno }}" class="form-control"><br>
                        </div>
                        <div class="col">
                            <label>ID Number</label>
                            <input type="text" name="idno" id="idno" value="{{ $tenant->idno }}" class="form-control"><br>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="email" value="@if(old('email')){{ old('email') }}@else{{ $tenant->email }}@endif">
                        </div>
                    </div>
                        {{-- <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="password"  value="@if(old('password')){{ old('password') }}@else{{ $tenant->password }}@endif">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="confirm password">
                    </div> --}}
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Status</label>

                                <div class="checkbox">
                                    <label><input type="checkbox" name="status" @if (old('status')==3 || $tenant->status == 3)
                                        checked
                                        @endif value="3">Status</label>
                                </div>
                            </div>
                        </div>
                </div>
                {{-- <div class="form-group" data-select2-id="51"> --}}
                    <label>Select Location</label>
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-sm-1">
                                <div class="checkbox">
                                    <label for=""><input type="checkbox" name="post_id" value="{{ $post->id }}">{{ $post->title }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div style="text-align:center;">
                        <button type="submit" class="btn btn-success" id="mybutton">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@stop
