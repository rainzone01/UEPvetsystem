<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('./IMAGES/logingb.jpg');
            background-size: cover;
        }

        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #218838;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .success {
            color: green;
            font-size: 14px;
            margin-top: 10px;
        }
        .backbtn {
    position: fixed;
    top: 10px; 
    left: 10px;
    width: 40px; 
    height: 40px; 
    background-color: transparent; 
    border-radius: 50%;
    overflow: hidden; 
    z-index: 1000; 
}

.backbtn img {
    width: 100%; 
    height: 100%; 
    object-fit: cover; 
}
    </style>
</head>
<body>
<div class="backbtn">
    <a href="{{ url('/welcome') }}">
        <img src="{{ asset('images/backbtn.png') }}" alt="Back Button">
    </a>
</div>
    <div class="login-container">
        <h2>Admin Login</h2>
        <!-- Laravel-formatted login form -->
        <form action="{{ route('admin.login') }}" method="post">
            @csrf <!-- CSRF token for Laravel -->
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required>
                @error('username')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Login</button>

            @if(session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif
            @if(session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif
        </form>
    </div>
</body>
</html>
