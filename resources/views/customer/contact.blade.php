@extends('public.layout.customer.mainLayout')

@section('content')
<div class="row">
                <div class="col-lg-4">
                    <h1 class="page-header">Contact Us</h1>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                          
                                <tr>
                                    <th>Call our CPE Phone on 1234 in Thailand</th>
   
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-bordered table-striped">

                                    <tr>
                                        <td><div class="form-group input-group">
                                                <span class="input-group-addon">Subject</span>
                                                <input type="text" class="form-control" >
                                                
                                        </div>
                                        <div class="form-group input-group">
                                                <span class="input-group-addon">Email</span>
                                                <input type="text" class="form-control" >
                                                
                                        </div>
                                        <div class="form-group input-group">
                                                <span class="input-group-addon">Problem</span>
                                                <textarea class="form-control" rows="3"></textarea>
                                                
                                        </div><button type="button" class="btn btn-success">Submit</button></td>
       
                                    </tr>
                             
                            </table>
                       
                    </div>
             

                </div>
                <!-- /.col-lg-12 -->
            </div>
        @endsection