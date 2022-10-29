@extends('admin.layouts.app')
@section('headsection')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script>
        table = $('#example').DataTable({
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
            <a href="{{ url('admin/tenants/create') }}" class="btn btn-success btn-sm" title="Add New Tenant">
              <i class="fa fa-plus" aria-hidden="true"></i> Add New
          </a>          
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>House Number</th>
                        <th>Status</th>
                        <th>Post Id</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($tenants as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->houseno }}</td>
                        <td>
                          {{ $item->status? 'active':'inactive' }}
                       </td>
                        <td>{{ $item->post_id }}</td>
                        <td>
                            <a href="{{ url('admin/tenants/show/' . $item->id )}}" title="View tenant"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                            <a href="{{ url('admin/tenants/edit/' . $item->id )}}" title="Edit tenant"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
     
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
          </div>
        </div>
          </section>
        </div>
      {{-- </div> --}}
    {{-- </div> --}}
  {{-- </div> --}}
</section>
</div>
@endsection
