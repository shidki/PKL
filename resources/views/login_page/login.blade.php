<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/login/style.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
    <title>LOGIN</title>
</head>

<body>

    <div class="container" id="container">
        {{-- <div class="form-container sign-up">
            <form method="post" action="/signup">
                @csrf
                <h1>SIGN UP</h1>
                <input type="text" placeholder="Username" required name="username" pattern="[A-Za-z]+">
                <input type="email" placeholder="Email" required name="email">
                <input type="password" placeholder="Password" required name="password">
                <button>Sign Up</button>
            </form>
        </div> --}}
        <div class="form-container sign-in">
            <form method="POST" action="/login">
                @csrf
                <h1>Login</h1>
                {{-- <span>or use your email password</span> --}}
                <input type="email" placeholder="Email" required name="email" @if (session("email"))
                    value="{{session("email") }}"
                @endif class="input_pertama">
                <input type="password" placeholder="Password" required name="password" @if (session("password"))
                value="{{session("password") }}"
            @endif>

                <p style="color: red">{{ session('login_error') }}</p>
                <p style="color: rgb(9, 101, 7)">{{ session('sukses') }}</p>
                <button>Kirim</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                {{-- <div class="toggle-panel toggle-left">
                    <h1>Sudah Punya Akun??</h1>
                    <p>Klik tombol untuk Login</p>
                    <button class="hidden" id="login">Log In</button>
                </div> --}}
                <div class="toggle-panel toggle-right">
                    {{-- <h1>Belun Punya Akun?</h1>
                    <p>Klik tombol untuk Sign up</p>
                    <button class="hidden" id="register">Sign Up</button> --}}
                    <img src="{{ asset('assets/landing_page/images/logo_jogja.png') }}" width="200px" height="300px" id="logo_login" alt="">
                </div>
            </div>
        </div>
    </div>
    <div id="toastBox">

    </div>
    <script src="assets/login/script.js"></script>


    {{-- UNTUK MENAMPILKAN TOAST YANG MENUNJUKKAN KONDISI SIGN UP DAN LOGIN --}}

    @if ($massage = Session::get('signup_error'))
        <script>
            let box = document.getElementById('toastBox');
            let toast = document.createElement('div');

            let icon = '<i class="fa-solid fa-circle-exclamation"></i>';
            toast.classList.add('toastt');
            toast.innerHTML = icon + "{{ $massage }}";
            box.appendChild(toast);

            toast.classList.add("errortoast");
            setTimeout(() => {
                toast.remove();
            }, 3500);
        </script>
    @endif
    @if ($massage = Session::get('login_error'))
        <script>
            let box = document.getElementById('toastBox');
            let toast = document.createElement('div');

            let icon = '<i class="fa-solid fa-circle-exclamation"></i>';
            toast.classList.add('toastt');
            toast.innerHTML = icon + "Login Gagal";
            box.appendChild(toast);

            toast.classList.add("errortoast");
            setTimeout(() => {
                toast.remove();
            }, 5000);
        </script>
    @endif
    @if ($massage = Session::get('sukses_daftar'))
        <script>
            let box = document.getElementById('toastBox');
            let toast = document.createElement('div');

            let icon = '<i class="fa-solid fa-check"></i>';
            toast.classList.add('toastt');
            toast.innerHTML = icon + "{{ $massage }}";
            box.appendChild(toast);

            toast.classList.add("sukses");
            setTimeout(() => {
                toast.remove();
            }, 5000);
        </script>
    @endif
</body>

</html>