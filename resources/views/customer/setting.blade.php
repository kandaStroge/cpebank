@extends('public.layout.customer.mainLayout')

@section('content')
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">My Settings</h1>
                </div>

                <div class="panel panel-default">
                        <div class="panel-heading">
                            Change Infomation
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                                <div class="form-group input-group">
                                        <span class="input-group-addon">Upload Photo</span>
                                        <input class="form-control" type="file">

                                </div>
                                <div class="form-group input-group">
                                        <span class="input-group-addon">Phone</span>
                                        <input class="form-control">

                                </div>
                                <div class="form-group input-group">
                                        <span class="input-group-addon">Password</span>
                                        <input class="form-control">

                                </div>
                                <div class="form-group input-group">
                                        <span class="input-group-addon">New Password</span>
                                        <input class="form-control">

                                </div>
                                <button type="button" class="btn btn-success">Submit</button>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                <!-- /.col-lg-12 -->
            </div>
        @endsection