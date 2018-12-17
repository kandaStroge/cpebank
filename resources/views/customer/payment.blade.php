@extends('public.layout.customer.mainLayout')

@section('content')
<<div class="row">
                <div class="col-lg-4">
                    <h1 class="page-header">Bill Payments</h1>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                          
                                <tr>
                                    <th>New Bill Payment</th>
   
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-bordered table-striped">

                                    <tr>
                                        <td><div class="form-group input-group">
                                                <span class="input-group-addon">Bill Payment Form</span>
                                                <input type="text" class="form-control" >
                                                
                                        </div><button type="button" class="btn btn-success">Search</button></td>
       
                                    </tr>
                             
                            </table>
                        <div class="form-group ">

                                <div class="form-group input-group">
                                        <span class="input-group-addon">Service Code</span>
                                        <input type="text" class="form-control" readonly>
                                </div>
                                <div class="form-group input-group">
                                        <span class="input-group-addon">Amount</span>
                                        <input type="text" class="form-control" readonly>
                                </div>
                                <div class="form-group input-group">
                                        <span class="input-group-addon">Reference</span>
                                        <input type="text" class="form-control" readonly>
                                </div>
                        </div>
                        
          
                        <div class="form-group input-group">
                                <button type="button" class="btn btn-success">Next</button>
                                <button type="button" class="btn btn-danger">Cancel</button>
                        </div>
                    </div>
             

                </div>
                <!-- /.col-lg-12 -->
            </div>
        @endsection