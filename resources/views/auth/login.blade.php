@extends('theme.layouts.layout')
@section('body')
<div class="container-fluid">
    <h3 style="background-color: purple;" class="text-white p-15">
        <strong>My Account</strong>
    </h3>
</div>
<div class="container ">
    <label class="custom_label m-top">Create a Free Account</label>
<form role="form" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <label class="custom_label m-top">Register</label>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <div class="input-group input-group-sm input-group-minimal">
                        <span class="input-group-addon">
                        </span>
                        <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
                    </div>
                    <label for="">A link to set a new password will be sent to your email address.</label>
                    <p>Your personal data will be used to support your experience throughout this website,
                        to manage access to your account, and for other purposes described in our privacy policy.</p>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-single">Register</button>
        </div>
    </div>
</form>
<form role="form" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <label class="custom_label m-top">Login</label>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Username or email address</label>
                    <div class="input-group input-group-sm input-group-minimal">
                        <span class="input-group-addon">
                        </span>
                        <input type="text" name="login" class="form-control" placeholder="example@gmail.com">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <div class="input-group input-group-sm input-group-minimal">
                        <span class="input-group-addon">
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <input type="checkbox" name="remember"><label style="margin-left:3px">Remember me</label><br>
            <button type="submit" class="btn btn-primary btn-single">Login</button>
            <br>
            <br>
            <a href="#">Lost your password?</a>
        </div>
    </div>
</form>
</div>
@endsection

