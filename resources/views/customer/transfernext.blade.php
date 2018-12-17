@extends('public.layout.customer.mainLayout')

@section('content')
<div class="row">
                <div class="col-lg-4">
                    <h1 class="page-header">Funds Transfer - Verification       </h1>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                          
                                <tr>
                                    <th>Please verify the information you have entered</th>
   
                                </tr>
                            </thead>
                        </table>
                        <div class="form-group ">
                                <p>Transfer From:</p>
                                <div class="form-group input-group">
                                        <span class="input-group-addon">Account</span>
                                        <input type="text" class="form-control" placeholder="Account" readonly>
                                </div>
                        </div>
                        <div class="form-group ">
                            <p>Transfer To:</p>
                            <div class="form-group input-group">
                                    <span class="input-group-addon">Account</span>
                                    <input type="text" class="form-control" placeholder="Account" readonly>
                            </div>
                            <div class="form-group input-group">
                                    <span class="input-group-addon">Name</span>
                                    <input type="text" class="form-control" placeholder="Name" readonly>
                            </div>
                            <div class="form-group input-group">
                                    <span class="input-group-addon">Bank</span>
                                    <input type="text" class="form-control" placeholder="Bank" readonly>
                            </div>
   

                                
                        </div>
                        <div class="form-group ">
                        <div class="form-group input-group">
                                <span class="input-group-addon">Amount</span>
                                <input type="text" class="form-control" readonly>

                                
                        </div>
                        <div class="form-group input-group">
                                <span class="input-group-addon">Fee</span>
                                <input type="text" class="form-control" readonly>

                                
                        </div>
                        <div class="form-group input-group">
                                <span class="input-group-addon">Date</span>
                                <input type="text" class="form-control" readonly>

                                
                        </div>
          
                        <div class="form-group input-group">
                                <a href="TransfersConfirm"><button type="button" class="btn btn-success">Confirm</button></a>
                                <a href="login"><button type="button" class="btn btn-danger">Back</button></a>
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            

        @endsection