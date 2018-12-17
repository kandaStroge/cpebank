@extends('public.layout.customer.mainLayout')

@section('content')
<div class="row">
                <div class="col-lg-4">
                    <h1 class="page-header">New Transfer</h1>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                          
                                <tr>
                                    <th>Transfer Funds</th>
   
                                </tr>
                            </thead>
                        </table>
                        <div class="form-group">
                                <label>Transfer From</label>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>

                                
                        </div>
                        <div class="form-group input-group">
                                <span class="input-group-addon">Transfer To</span>
                                <input type="text" class="form-control" placeholder="Account Number">

                                
                        </div>
                        <div class="form-group input-group">
                                <span class="input-group-addon">Amount</span>
                                <input type="text" class="form-control" placeholder="Amount">

                                
                        </div>
                        <div class="form-group input-group">
                                <span class="input-group-addon">Reference</span>
                                <input type="text" class="form-control" placeholder="Reference">

                                
                        </div>
                        <div class="form-group input-group">
                                <a href="Transfersnext"><button type="button" class="btn btn-success">Next</button></a>
                                <a href="login"><button type="button" class="btn btn-danger">Back</button></a>
                        </div>
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>

        @endsection