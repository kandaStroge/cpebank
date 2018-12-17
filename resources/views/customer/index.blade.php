@extends('customer.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">My Accounts</h1>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>

                    <tr>
                        <th>Deposit Accounts</th>

                    </tr>
                    </thead>
                </table>
                <table class="table table-bordered table-striped">
                    <thead>

                    <tr>
                        <th>Account Number</th>
                        <th>Type</th>
                        <th>Nickname</th>
                        <th>Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a href="login">667-xxx-xxx</a></td>
                        <td>Savings</td>
                        <td>CMU</td>
                        <td>4567.31</td>
                    </tr>
                    <tr>
                        <td><a href="login">666-xxx-xxx</a></td>
                        <td>Savings</td>
                        <td>Chiang Mai</td>
                        <td>1324</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

@endsection