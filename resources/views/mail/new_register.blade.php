<!DOCTYPE html>
<html>
<head>
    <label class="custom_label">
        <img src="{{ asset('assets/images/logo-white-bg@2x.png') }}" alt="logo">
        <title>Xenon</title>
    </label>
</head>
<body>

    <h1>{{ env('APP_NAME') }}</h1>
    <h1>{{ $details['username'] }}</h1>
    <p>{{ $details['password'] }}</p>

    {{--  {{ $data->username }}  --}}

    <p>Thank you</p>

</body>
</html>
