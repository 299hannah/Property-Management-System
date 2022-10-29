@extends('agent.layouts.app')
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
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 hh" style="float:left">
                            <b>Name: {{ $tenants->name }}<br>
                                <b>Phone Number: {{ $tenants->phoneno }} <br>
                                    <b>House Number: {{ $tenants->houseno }}<br>
                                        <b>ID Number: {{ $tenants->idno }}<br>
                                            <b>Email: {{ $tenants->email }}<br>
                        </div>
                    </div>
                    <table id="example1" class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>Billing For</th>
                                <th>Date Paid</th>
                                <th>Expected Amount</th>
                                <th>Amount Paid</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                    <tbody>
                        @php
                            $transactions = DB::table('transactions')->where('houseno', Auth::user()->houseno)->get();
                        @endphp
                           @foreach ($transactions as $item )
                              <tr>
                                   <td>{{ $item->billingfor }}</td>
                                   <td>{{ $item->datepaid }}</td>
                                   <td>{{ $item->expectedamount }}</td>
                                   <td>{{ $item->amountpaid }}</td>
                                   <td>{{ $item->balance }}</td>
                             </tr>
                        @endforeach
                       </tbody> 
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
