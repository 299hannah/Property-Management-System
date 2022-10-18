@extends('agent.layouts.app')
{{-- @extends('vacantrooms.layout') --}}
@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="card">
                <div class="card-header">Rooms Page</div>
                <div class="card-body">
                    <form action="{{ url('agent/rooms/store') }}" method="post">
                        {!! csrf_field() !!}
                        <label>House Number</label><br>
                        <input type="text" name="houseno" id="houseno" class="form-control"><br>
                        <label>Floor</label><br>
                        <input type="text" name="floor" id="floor" class="form-control"><br>
                        <label class="form-label" for="description">Description</label><br>
                        <select class="form-control" type="description" name="description">
                            <option value="">Select Descsription</option>
                            <option name="fellowship1">Occupied</option>
                            <option name="fellowship2">Vacant</option>
                            <option name="fellowship2">Damaged</option>
                        </select><br>
                        
                        <br><button type="submit" class="btn btn-success center" name="submit">Save</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@stop
