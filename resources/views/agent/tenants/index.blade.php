@extends('agent.layouts.app')
@section('headsection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
<script>
    table = $('#example').DataTable({
        // "paging": true
        "lengthChange": false
        , "autoWidth": false,
        // , "ordering": true
        , "responsive": true

        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

</script>
@endsection
@section('main-content')
<div class="content-wrapper">
    <section class="content-header"> </section>

    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('agent/tenants/create') }}" class="btn btn-success btn-sm addbtn" title="Add New Tenant">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    {{-- <style>
                    table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before,
                    table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before {
                        top: 50%;
                        left: 5px;
                        height: 1em;
                        width: 1em;
                        margin-top: -9px;
                        display: block;
                        position: absolute;
                        color: white;
                        border: .15em solid white;
                        border-radius: 1em;
                        box-shadow: 0 0 0.2em #444;
                        box-sizing: content-box;
                        text-align: center;
                        text-indent: 0 !important;
                        font-family: "Courier New", Courier, monospace;
                        line-height: 1em;
                        content: "+";
                        background-color: #0275d8;
                    }

                </style> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>House Number</th>
                                    <th>ID Number</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tenants as $item)
                                <tr>
                                    <td class="dtr-control sorting_1" tabindex="0">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phoneno }}</td>
                                    <td>{{ $item->houseno }}</td>
                                    <td>{{ $item->idno }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->status? 'active':'inactive' }}</td>
                                    <td style="display: none;">
                                        <a href="{{ url('agent/tenants/show/' . $item->id )}}" title="View tenant"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('agent/tenants/edit/' . $item->id )}}" title="Edit tenant"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <script>
                $(document).ready(function() {
                    $('.addbtn').click(function() {
                        var row = $(this).closest('tr');
                        var exp = row.find('#post_id').text();
                        $('#post_id').val(exp);
                        console.log(exp);
                    });
                });

            </script> --}}
            </div>
        </div>
</div>
</section>
</div>
@endsection
