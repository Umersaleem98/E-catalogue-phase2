<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <title>Login</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="post" action="{{ 'register' }}">
                <h1>Create Account</h1>

                @csrf
                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <label for="password_confirmation" hidden>Confirm Password</label>
                <input type="password"name="password_confirmation" id="password_confirmation"
                    placeholder="password confirmation">
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="{{ url('login') }}" method="post">
                @csrf
                <h1>Sign In</h1>

                <span>or use your email password</span>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                <input type="password" name="password" placeholder="Password">
                {{-- <a href="#">→ Forget Your Password? ←</a> --}}
                <button name="submit" type="submit">Sign In</button>
                @if ($errors->any())
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first() }}
                    </div>
                @endif
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left" style="background-color: #004476">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right" style="background-color: #004476">
                    {{-- <h1>Hello, Friend!</h1> --}}
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('style/js.js') }}"></script>
</body>

</html>
