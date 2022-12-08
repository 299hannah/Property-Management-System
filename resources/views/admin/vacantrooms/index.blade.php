@extends('admin.layouts.app')
@section('headsection')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script>
        table = $('#example1').DataTable({
            "paging": true,
            "ordering": true,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        });
    </script>
@endsection
@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('admin/vacantrooms/create') }}" class="btn btn-success btn-sm" title="Add Vacant Room">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>House Number</th>
                                <th>Floor</th>
                                <th>Post Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vacantrooms as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->houseno }}</td>
                                    <td>{{ $item->floor }}</td>
                                    <td>{{ $item->post_id }}</td>

                            @endforeach
                            @foreach ($posts as $post)
                            <td>{{ $post->title }}</td>

                                    {{-- <td>{{ $item->title }}</td> --}}
                                    <td>
                                        <a href="{{ url('admin/vacantrooms/edit/' . $item->id) }}" title="Edit vacant room"><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        <form method="POST" action="{{ url('admin/vacantrooms' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete vacant room" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
        </section>
    </div>
@endsection
