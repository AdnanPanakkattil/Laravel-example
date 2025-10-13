<!-- resources/views/users/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color:Lavender;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 90%;
            max-width: 400px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, button {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
        }

        button {
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
        }

        .alert {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .create {
            text-align: center;
            margin-top: 10px;
        }

        .create a {
            text-decoration: none;
            background-color: greenyellow;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            color: black;
            font-weight: bold;
        }

        .create a:hover {
            background-color: limegreen;
            color: white;
        }

        @media (max-width: 500px) {
            form {
                padding: 20px;
            }

            input, button {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf

        @if(session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>

        <div class="create">
            <a href="/register">Create Account</a>
        </div>
    </form>
</body>
</html>
