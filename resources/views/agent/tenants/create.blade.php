@extends('agent.layouts.app')
@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="card">
                <div class="card-header">Tenants Page</div>
                <div class="card-body">
                    <form action="{{ url('agent/tenants/store') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="row mb-3">
                            <div class="col">
                                <label>Name</label><br>
                                <input type="text" name="name" id="name" class="form-control" required><br>
                            </div>
                            <div class="col">
                                <label>Phonenumber</label><br>
                                <input type="text" name="phoneno" id="phoneno" class="form-control" required><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" for="inputhouseno">Houseno</label><br>
                                    <input type="text" name="houseno" id="houseno" class="form-control" required><br>                                   
                            </div>
                            <div class="col">
                                <label>ID Number</label><br>
                                <input type="text" name="idno" id="idno" class="form-control" required><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>Email</label><br>
                                <input type="text" name="email" id="email" class="form-control"><br>
                            </div>
                            <div class="col">
                                <label>Password</label><br>
                                <input type="password" name="password" id="password" class="form-control"><br>
                            </div>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="confirm password" required>
                                </div>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <div class="checkbox">
                                <label><input type="checkbox" name="status"
                                        @if (old('status') == 3) checked @endif value="3">Status</label>
                            </div>
                        </div>
                        {{-- <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-sm-1">
                                    <div class="checkbox">
                                        <label for=""><input type="checkbox" name="post_id" value="{{ $post->id }}">{{ $post->title }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div> --}}
                        <div style="text-align:center;">
                            <button type="submit" class="btn btn-success center" name="submit">Save</button>
                        </div>
                    </form>
                    <script>
                        $(document).ready(function() {
                            $('.paybtn').click(function() {
                                var row = $(this).closest('tr');
                                var exp = row.find('#expensename').text();
                                $('#hiddenexp').val(exp);
                                console.log(exp);
                            });
                        });
                    </script>
                </div>
            </div>

        </section>
    </div>
@stop
