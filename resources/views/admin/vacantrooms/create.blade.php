@extends('admin.layouts.app')
{{-- @extends('vacantrooms.layout') --}}
@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="card">
                <div class="card-header">Vacant rooms Page</div>
                <div class="card-body">
                    <form action="{{ url('admin/vacantrooms/store') }}" method="post">
                        {!! csrf_field() !!}
                        <label>House Number</label><br>
                        <input type="text" name="houseno" id="houseno" class="form-control" placeholder="houseno"><br>
                        <label>Floor</label><br>
                        <input type="text" name="floor" id="floor" class="form-control" placeholder="floor"><br>
                        <label>Select Property</label>
                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-sm-1">
                                    <div class="checkbox">
                                        <label for=""><input type="checkbox" name="post_id" value="{{ $post->id }}">{{ $post->title }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-success center" name="submit">Save</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@stop
