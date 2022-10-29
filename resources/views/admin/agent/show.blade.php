@extends('admin.layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
{{-- <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script> --}}
{{-- <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script> --}}
<script>
  table = $('#example').DataTable( {
    "paging": true,
      "ordering": true,
    "responsive": true,
       "lengthChange": false, 
       "autoWidth": false
} );
</script>
@endsection
@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
    {{-- @include('admin.layout.pagehead') --}}
        </div>
      
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Agents</h3><br><br>
   
        <a class="col-lg-offset-5 btn btn-outline-primary" href="{{ route('agent.create') }}">Add New</a>
  
      </div>
      <div class="card-body">
     
            <table id="example" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.Name</th>
                  <th>user Name</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($agents as $agent)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $agent->name }}</td>
                  {{-- <td> --}}
                    {{-- @foreach($user->roles as $role)
                      {{ $role->name }}
                    @endforeach --}}
                   {{-- </td> --}}
                   <td>
                    
                      {{ $agent->status? 'active':'inactive' }}
                   </td>
      
                  <td><a href=" {{ route('agent.edit',$agent->id) }}"><ion-icon name="create-outline"></ion-icon></a></td>
                 <form method="post" action="{{ route('agent.destroy',$agent->id) }}" id="delete-form-{{ $agent->id }}" style="display: none">
                @csrf
                {{ method_field('DELETE') }}
                </form>
                 
                  <td>
                    <a href="" onclick="if(confirm('Are you sure, You want to delete?')){
                      event.preventDefault();
                      document.getElementById('delete-form-{{ $agent->id }}').submit();}
                      else{
                        event.preventDefault();
                      }
                      
                      "><ion-icon size="small" name="close-circle-outline"></ion-icon></a>
                  </td>
                </tr>
                @endforeach



              </tbody>
              <tfoot>

                <tr>
                  <th>S.Name</th>
                  <th>user Name</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </tfoot>
            </table>
          <!-- /.card-body -->
        {{-- </div> --}}
      </div>
     
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>


@endsection