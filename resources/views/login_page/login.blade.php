<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/login/style.css">
    <title>LOGIN</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="post" action="/signup">
                @csrf
                <h1>SIGN UP</h1>
                {{-- <span>or use your email for registeration</span> --}}
                <input type="text" placeholder="Username" required name="username" pattern="[A-Za-z]+">
                <input type="email" placeholder="Email" required name="email">
                <input type="password" placeholder="Password" required name="password">
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST" action="/login">
                @csrf
                <h1>Log In</h1>
                {{-- <span>or use your email password</span> --}}
                <input type="email" placeholder="Email" required name="email" @if (session("email"))
                    value="{{session("email") }}"
                @endif>
                <input type="password" placeholder="Password" required name="password" @if (session("password"))
                value="{{session("password") }}"
            @endif>

                <p style="color: red">{{ session('login_error') }}</p>
                <p style="color: rgb(9, 101, 7)">{{ session('sukses') }}</p>
                <button>Log In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Sudah Punya Akun?</h1>
                    <p>Klik tombol untuk Login</p>
                    <button class="hidden" id="login">Log In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Belun Punya Akun?</h1>
                    <p>Klik tombol untuk Sign up</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/login/script.js"></script>
    <script>
        var signupError = '{{ session("signup_error") }}';
        if (signupError.trim() !== '') {
            alert(signupError);
        }
    </script>
</body>

</html>