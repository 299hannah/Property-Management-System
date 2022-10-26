@extends('admin.layouts.app')
@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="card">
                <div class="card-header">Edit Damaged room</div>
                <div class="card-body">
                    <form action="{{ url('admin/damagedrooms/update/' . $damagedrooms->id) }}" method="post">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" id="id" value="{{ $damagedrooms->id }}" id="id">
                        <label>House Number</label>
                        <input type="text" name="houseno" id="houseno" value="{{ $damagedrooms->houseno }}"
                            class="form-control"><br>
                        <label>Floor</label>
                        <input type="text" name="floor" id="floor" value="{{ $damagedrooms->floor }}"
                            class="form-control"><br>
                        <label>Description</label>
                        <input type="text" name="description" id="description" value="{{ $damagedrooms->description }}"
                            class="form-control"><br>
                        <label>Select Location</label>
                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-sm-1">
                                    <div class="checkbox">
                                        <label for=""><input type="checkbox" name="post_id" value="{{ $post->id }}">{{ $post->title }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div><br>
                        <button type="submit" class="btn btn-success" id="mybutton">Update</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@stop
