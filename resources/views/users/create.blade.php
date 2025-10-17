<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Optional: Prevent caching -->
    <meta http-equiv="Cache-Control" content="no-store" />

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: Lavender;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .alert {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #d6e9c6;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            width: 100%;
            background-color: DarkSlateBlue;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            
        }

        button[type="submit"]:hover {
            background-color: Lavender;
            color: black;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
                margin: 10px;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"] {
                font-size: 14px;
                padding: 10px;
            }

            button[type="submit"] {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Register</h1>

        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('users.create') }}" method="POST" autocomplete="off">
            @csrf

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Add your Name" autocomplete="off">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" autocomplete="off">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="new-password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Register</button>
        </form>
    </div>
</body>
<script src="{{ asset('students/create.js') }}"></script>
</html>
