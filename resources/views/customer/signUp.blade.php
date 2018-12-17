

@extends('public.layout.customer.layout')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-4">
                    <h1>CPEBank</h1>
                    
                    <img src="/images.png" class="rounded img-thumbnail">
                            
                    
            </div>
            <div class="col-md-4">
                
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="First Name" name="first name" type="first name" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Last Name" name="last name" type="last name" autofocus>
                                </div>
                                <div class="form-group">
                                        <input class="form-control" placeholder="Email" name="example@hotmail.com" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                        <input class="form-control" placeholder="Passwords" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">I agree to the terms and condition.
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                
                                <a href="login" class="btn btn-lg btn btn-info btn-block">Sign up</a>
                                <a href="login" class="btn btn-lg btn btn-danger btn-block">Back</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
    </div>
    @endsection