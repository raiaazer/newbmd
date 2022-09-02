@extends('theme.layouts.layout')
@section('body')
<br>
<div class="container">
<div class="panel panel-default">
    <div class="panel-body">
        <div class="jumbotron text-center">
            <br>
            <img src="{{ asset('assets/images/thumb.png') }}" alt="thank you" width="50px" height="50px">
            <br>
            <h1 class="display-3 txt-color">Thank You!</h1>
            <p class="lead txt-color">Your order has been placed successfully!</p>
            <br>
            <p class="lead">
            <a class="btn btn-primary btn-sm" href="{{ route('account') }}" role="button">Continue to Account</a>
            </p>
        </div>
    </div>
</div>
</div>
@endsection
