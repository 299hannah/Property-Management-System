@extends('agent.layouts.app')
@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="card">
                <div class="card-header">Contactus Page</div>
                <div class="card-body">
                    <form action="{{ url('agent/tenants/update/' . $tenants->id) }}" method="post">
                        {!! csrf_field() !!}
                        {{-- @method('PATCH') --}}
                        <div class="row mb-3">
                            <div class="col">
                                <input type="hidden" name="id" id="id" value="{{ $tenants->id }}"
                                    id="id">
                                <label>Name</label>
                                <input type="text" name="name" id="name" value="{{ $tenants->name }}"
                                    class="form-control"><br>
                            </div>
                            <div class="col">
                                <label>Phone Number</label>
                                <input type="text" name="phoneno" id="phoneno" value="{{ $tenants->phoneno }}"
                                    class="form-control"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>House Number</label>
                                <input type="text" name="houseno" id="houseno" value="{{ $tenants->houseno }}"
                                    class="form-control"><br>
                            </div>
                            <div class="col">
                                <label>ID Number</label>
                                <input type="text" name="idno" id="idno" value="{{ $tenants->idno }}"
                                    class="form-control"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>Email</label>
                                <input type="text" name="email" id="email" value="{{ $tenants->email }}"
                                    class="form-control"><br>
                            </div>
                            <div class="col">
                                <label>Password</label>
                                <input type="text" name="password" id="password" value="{{ $tenants->password }}"
                                    class="form-control"><br>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="status" @if (old('status')==3 || $tenants->status == 3)checked @endif value="3">Status</label>
                                    </div>
                                </div>
                            </div>
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
