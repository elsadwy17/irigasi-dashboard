
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
        }

        .login-box {
            width: 100%;
            max-width: 350px;
            margin: 60px auto;
            padding: 25px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px #0002;
        }

        h2 {
            text-align: center;
        }

        input {
            display: block;
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            font-size: 16px;
        }

        button {
            display: block;
            width: 100%;
            padding: 14px;
            margin-top: 15px;
            border: none;
            border-radius: 6px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            cursor: pointer;
            touch-action: manipulation;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>Login</h2>

        @if(session('error'))
            <p style="color:red">{{ session('error') }}</p>
        @endif

<form method="POST" action="{{ url('/login') }}">
    @csrf

    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit">Login</button>
</form>
    </div>

</body>
</html>
