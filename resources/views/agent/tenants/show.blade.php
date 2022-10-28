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
                        {{-- <div class="col-md-3 hh" style="float:left">
                            <b>Name: {{ $tenants->name }}<br>
                                <b>Phone Number: {{ $tenants->phoneno }} <br>
                                    <b>House Number: {{ $tenants->houseno }}<br>
                                        <b>ID Number: {{ $tenants->idno }}<br>
                                            <b>Email: {{ $tenants->email }}<br>
                        </div> --}}
                    </div>
                    <b>house: {{ $tenants->houseno }} <br>
                        
                    {{-- <div class="row">
                        <div class="col-md-3 hh" style="float:right">
                            <b>Billing For: {{ $transactions->billingfor }}<br>
                                <b>Expected Amount: {{ $transactions->expectedamount }}<br>
                                    <b>Amount Paid: </b>{{ $transactions->amountpaid }}<br>
                                    <b>Balance: {{ $transactions->balance }}<br>
                                        <b>Date Paid: {{ $transactions->datepaid }}<br>
                        </div>
                    </div> --}}
                    <table class="table " id="example1">
                        <thead>
                            <tr class="odd">
                                <th>ID</th>
                                <th>Billing For</th>
                                <th>Expected Amount</th>
                                <th>Amount Paid</th>
                                <th>Balance</th>
                                <th>Date Paid</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="even">
                                <td></td>
                                <td>October</td>
                                <td>45000</td>
                                <td>45000</td>
                                <td>0</td>
                                <td>30/9/2022</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
