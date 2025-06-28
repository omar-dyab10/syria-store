<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حسابي - Syrian Store</title>
    <link rel="stylesheet" href="{{ asset('assets/account-style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main-container">
        <div class="form-container" id="loginForm">
            <div class="form-card">
                <div class="form-image">
                    <img src="{{ asset('assets/image/Frame 2671.png') }}" alt="تسجيل الدخول">
                </div>
                <div class="form-content">
                    <h2>تسجيل الدخول</h2>
                    <p class="form-subtitle">لا تملك حساباً؟ <a href="#">إنشاء حساب</a></p>

                    <form class="login-form" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <label for="loginEmail">البريد الإلكتروني</label>
                            <input type="email" id="loginEmail" placeholder="myhab77@gmail.com" name="email" required>
                        </div>

                        <div class="input-group">
                            <label for="loginPassword">كلمة المرور</label>
                            <input type="password" id="loginPassword" placeholder="••••••••••••" name="password" required>
                        </div>

                        <div class="form-options">
                            <label class="checkbox-container">
                                <input type="checkbox" id="rememberMe" name="terms">
                                <span class="checkmark"></span>
                                أوافق على الشروط والأحكام
                            </label>
                        </div>

                        <button type="submit" class="submit-btn">تسجيل الدخول</button>

                        <div class="divider">
                            <span>أو</span>
                        </div>

                    </form>
                    <div class="social-login">
                        <button type="button" class="social-btn twitter-btn">
                            <img class="social-icon" src="{{ asset('assets/image/Vector.svg') }}" alt="">
                        </button>
                        <form action="{{ route('auth.google') }}">
                            @csrf
                            <button type="submit" class="social-btn google-btn">
                                <img class="social-icon" src="{{ asset('assets/image/devicon_google.svg') }}"
                                    alt="">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
