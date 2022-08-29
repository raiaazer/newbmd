@extends('theme.layouts.account-layout')
@section('account_section')
<label class="custom_label"><strong>Edit Details</strong></label>
<form method="POST" action="{{ route('forgot_password') }}">
    {{--  <input type="hidden" value="birth" name="certificate_type">  --}}
    @csrf
    @if ($errors->any())
    {{ $message }}
    @endif
<div class="row">

    {{--  @if($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif  --}}
    {{--  @include('notify::messages')  --}}
    <div class="col-sm-6">
        <label class="">First name</label>
        <input type="text" class="form-control" name="first_name" value="{{ $edit_acc->first_name }}">
    </div>
    <div class="col-sm-6">
        <label class="">Last name</label>
        <input type="text" id="last" class="form-control" name="last_name" value="{{ $edit_acc->last_name }}">
    </div>
    <div class="col-sm-12 p-top">
        <label class="">Display name</label>
        <input type="text" class="form-control" id="user" name="username"  value="{{ $edit_acc->username }}">
        <label><i>This will be how your name will be displayed in the account section and in reviews</i></label>
    </div>
    <div class="col-sm-12 p-top">
        <label class="">Email address</label>
        <input type="email" name="email" class="form-control" value="{{ $edit_acc->email }}" readonly>
    </div>

    <h4 class="col-sm-12 p-top"><strong>Password change</strong></h4>
    <div class="col-sm-12" style="margin-left: 10px">
        <label class="">Current password (leave blank to leave unchanged)</label>
        <input type="password" class="form-control"  name="current_password">
    </div>
    <div class="col-sm-12 p-top" style="margin-left: 10px">
        <label class="">New password (leave blank to leave unchanged)</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="col-sm-12 p-top" style="margin-left: 10px">
        <label class="">Confirm new password</label>
        <input type="password" class="form-control" name="password_confirmation">
    </div>

    <button type="submit" id="save" class="mar-top btn btn-primary btn-single" style="margin-left: 25px">SAVE CHANGES</button>

    <hr>
</div>
</form>



{{--  <div class="row">
<label class="custom_label" style="margin-left: 15px"><strong>Edit Addresses</strong></label>
<br>
<p style="margin-left: 15px">The following addresses will be used on the checkout page by default.</p>
<div class="col-sm-6">
<h4 class="p-top"><strong>Billing address</strong></h4>
<br>
<p style="margin-left: 15px">You have not set up this type of address yet.</p>
</div>

<div class="col-sm-6">

    <div class="col-sm-5">
        <h4 class="p-top"><strong>Shipping address</strong></h4>
        <br>
        <p style="margin-left: 15px">You have not set up this type of address yet.</p>
    </div>
    <div class="col-sm-1">
        <button type="submit" class="btn btn-primary btn-single">ADD</button>
    </div>
</div>
<br>
</div>  --}}
@endsection
@section('custom_scripts')
<script>
    @if(session()->has('success'))
        $.notify("{{ session()->get('success') }}", "success");
    @elseif(session()->has('error'))
        $.notify("{{ session()->get('error') }}", "error");
    @endif


</script>
@endsection
