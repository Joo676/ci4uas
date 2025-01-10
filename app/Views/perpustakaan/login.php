<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background: url('https://via.placeholder.com/1920x1080') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            width: 350px;
            text-align: center;
        }

        .login-container h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
        }

        .login-container label {
            display: block;
            margin: 10px 0 5px;
            font-size: 14px;
            text-align: left;
            color: #555;
        }

        .login-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        .login-container input:focus {
            border-color: #6e8efb;
            outline: none;
            box-shadow: 0 0 8px rgba(110, 142, 251, 0.7);
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #6e8efb, #a777e3);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .login-container button:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(110, 142, 251, 0.5);
        }

        .login-container p {
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }

        .login-container p a {
            color: #6e8efb;
            text-decoration: none;
        }

        .login-container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" action="/login" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <div id="usernameError" class="error"></div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <div id="passwordError" class="error"></div>
            </div>
            <button type="submit" class="btn-login">Login</button>
            <div id="loginError" class="error"></div>
        </form>
    </div>

    <script>
    const loginForm = document.getElementById('loginForm');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const usernameError = document.getElementById('usernameError');
    const passwordError = document.getElementById('passwordError');
    const loginError = document.getElementById('loginError');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah submit form

        // Reset pesan error
        usernameError.textContent = '';
        passwordError.textContent = '';
        loginError.textContent = '';

        // Validasi input
        let isValid = true;
        if (usernameInput.value.trim() === '') {
            usernameError.textContent = 'Username tidak boleh kosong';
            isValid = false;
        }
        if (passwordInput.value.trim() === '') {
            passwordError.textContent = 'Password tidak boleh kosong';
            isValid = false;
        }

        // if (isValid) {
        //     // Dummy login check (ganti dengan autentikasi backend jika diperlukan)
        //     const validUsername = 'admin';
        //     const validPassword = '12345';

        //     if (usernameInput.value === validUsername && passwordInput.value === validPassword) {
        //         // Redirect ke halaman dashboard
        //         window.location.href = '/dashboard'; // Ganti dengan URL dashboard Anda
        //     } else {
        //         loginError.textContent = 'Username atau password salah';
        //     }
        // }
    });


</body>
</html>


