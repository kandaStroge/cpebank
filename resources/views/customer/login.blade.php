@extends('customer.layouts.layout')

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
                        <form role="form" method="post" action="/login">
                            {{csrf_field()}}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit"  class="btn btn-lg btn-success btn-block" value="Login">

                                <a href="SignUp" class="btn btn-lg btn btn-info btn-block">Sign up</a>
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