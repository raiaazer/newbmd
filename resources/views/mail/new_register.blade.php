<!DOCTYPE html>
<html>
<head>
    <table>
        <tr>
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
        </tr>
    </table>
</head>
<body>

    <h1>Welcome to {{ env('APP_NAME') }}</h1>
    <p>Thanks for creating an account on {{ env('APP_NAME') }}.
        Your username is <strong>{{ $details['username'] }}</strong>. Your password has been automatically
        generated: <strong>{{ $details['password'] }}</strong>
    </p>
    {{--  <h1>{{ $details['username'] }}</h1>
    <p>{{ $details['password'] }}</p>  --}}

    {{--  {{ $data->username }}  --}}

    <p>Thank you</p>

</body>
</html>
