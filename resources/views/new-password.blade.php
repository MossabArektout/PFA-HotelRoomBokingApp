<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
        }

        .form-container h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .form-container .form-group {
            margin-bottom: 20px;
        }

        .form-container .btn-primary {
            width: 100%;
            background-color: #007bff;
            border-color: #007bff;
        }

        .form-container .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-container .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }

        .form-container .text-muted {
            color: #6c757d;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h3>Reset Password</h3>
        <p class="text-muted text-center mb-4">Please enter your new password.</p>
        <form action="{{ route('reset.password.post') }}" method="post">
            @csrf
            <input type="text" name="token" hidden value="{{ $token }}">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
