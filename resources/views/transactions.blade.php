{{-- @extends('agent.layouts.app') --}}
{{-- @section('main-content') --}}
    <div class="content-wrapper">
        <section class="content-header">
            <div class="card">
                <div class="card-header">Tenants Page</div>
                <div class="card-body">

                    <form action="{{ url('transactions/store') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="row mb-3">
                            <div class="col">
                                <label>Name</label><br>
                                <input type="text" name="name" id="name" class="form-control" required><br>
                            </div>
                            <div class="col">
                                <label>Expected Amount</label><br>
                                <input type="text" name="expectedamount" id="expectedamount" class="form-control"
                                    required><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>House Number</label><br>
                                <input type="text" name="houseno" id="houseno" class="form-control"><br>
                            </div>
                            <div class="col">
                                <label>Amount Paid</label><br>
                                <input type="text" name="amountpaid" id="amountpaid" class="form-control"><br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" for="inputreligion">Billing For</label><br>
                                <select class="form-control" type="billingfor" name="billingfor">
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

                        </div>
                        <div style="text-align:center;">
                            <button type="submit" class="btn btn-success center" name="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
{{-- @stop --}}


