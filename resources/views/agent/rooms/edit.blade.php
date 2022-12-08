@extends('agent.layouts.app')
@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <form action="{{ url('agent/rooms/update/' . $rooms->id) }}" method="post">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" id="id" value="{{ $rooms->id }}" id="id">
                        <label>House Number</label>
                        <input type="text" name="houseno" id="houseno" value="{{ $rooms->houseno }}"
                            class="form-control"><br>
                        <label>Floor</label>
                        <input type="text" name="floor" id="floor" value="{{ $rooms->floor }}"
                            class="form-control"><br>
                        <button type="submit" class="btn btn-success" id="mybutton">Update</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@stop
