<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset</title>
</head>

<body>
    <h2>Password Reset</h2>
    <p>Hello,</p>
    <p>You recently requested to reset your password for your account. Click the button below to reset it:</p>
    <p><a href="{{ route('reset.password', $token) }}">Reset your password</a></p>
    <p>If you did not request a password reset, please ignore this email.</p>
    <p>Thank you!</p>
</body>

</html>
