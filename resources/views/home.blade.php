@extends('user.layouts.app')
@section('bg-img3', asset('user/images/reg.jpg'))
@section('main-content')
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(@yield('bg-img3')" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-5 mx-auto mt-lg-5 text-center">
                    <p class="mb-5"><strong class="text-white">Welcome</strong></p>
                </div>
            </div>
        </div>
        <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>
    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <b><p class="text-center">Payment Breakdown</p></b>
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-success paybtn" data-toggle="modal" data-target="#modal-default">
                            Make Payment
                        </button>
                        <br>
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Make Payment</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                    </div>
                                    <div class="modal-body">
                                        <section class="content-header">
                                            <div class="card">
                                                <div class="card-header">Tenants Page</div>
                                                <div class="card-body">
                                                    <form action="{{ url('transactions/store') }}" method="post">
                                                        {!! csrf_field() !!}
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <label>Name</label><br>
                                                                <input type="text" name="name" id="name"
                                                                    class="form-control" required><br>
                                                            </div>
                                                            <div class="col">
                                                                <label>Expected Amount</label><br>
                                                                <input type="text" name="expectedamount"
                                                                    id="expectedamount" class="form-control" required><br>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <label>House Number</label><br>
                                                                <input type="text" name="houseno" id="houseno"
                                                                    class="form-control"><br>
                                                            </div>
                                                            <div class="col">
                                                                <label>Amount Paid</label><br>
                                                                <input type="text" name="amountpaid" id="amountpaid"
                                                                    class="form-control"><br>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <label class="form-label" for="inputreligion">Billing For</label><br>
                                                                <select class="form-control" type="billingfor"
                                                                    name="billingfor">
                                                                    <option value="">Select Month</option>
                                                                    <option name="religion1">January</option>
                                                                    <option name="religion2">February</option>
                                                                    <option name="religion3">March</option>
                                                                    <option name="religion3">April</option>
                                                                    <option name="religion3">May</option>
                                                                    <option name="religion3">June</option>
                                                                    <option name="religion3">July</option>
                                                                    <option name="religion3">August</option>
                                                                    <option name="religion3">September</option>
                                                                    <option name="religion3">October</option>
                                                                    <option name="religion3">November</option>
                                                                    <option name="religion3">December</option>
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <label>Balance</label><br>
                                                                <input type="text" name="balance" id="balance" class="form-control"><br>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <label> Date Paid</label>
                                                                <input type="date" id="datepaid" name="datepaid" class="for-control">
                                                            </div>
                                                            <div class="col">
                                                                <input type="hidden" class="form-control" id="hiddenpostid" name="post_id">
                                                            </div>

                                                        </div>
                                                        <div style="text-align:center;">
                                                            <button type="submit" class="btn btn-success center" name="submit">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div>
                </div>
            </div>
                <table id="example" class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>Billing For</th>
                                <th>Date Paid</th>
                                <th>Expected Amount</th>
                                <th>Amount Paid</th>
                                <th>Balance</th>
                                {{-- <th>Post_id</th> --}}

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
                               {{-- <td>{{ $item->post_id }}</td> --}}
                         </tr>
                    @endforeach
                   </tbody> 
                </table>
                </div>
            </div>
        </div>
        <br><br>
@endsection
