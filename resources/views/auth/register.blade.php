<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حسابي - Syrian Store</title>
    <link rel="stylesheet" href="{{ asset('assets/account-style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<div class="main-container">
    <div class="form-container" id="signupForm">
        <div class="form-card">
            <div class="form-image">
                <img src="{{ asset('assets/image/Frame 2671 (1).png') }}" alt="إنشاء حساب">
            </div>
            <div class="form-content">
                <h2>إنشاء حساب</h2>
                <p class="form-subtitle">هل لديك حساب؟ <a href="#">تسجيل الدخول</a></p>

                <form class="signup-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="name-row">
                        <div class="input-group">
                            <label for="firstName">الاسم الأول</label>
                            <input type="text" id="firstName" name="first_name" placeholder="محمود">
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-group">
                            <label for="lastName">الاسم الأخير</label>
                            <input type="text" id="lastName" name="last_name" placeholder="الشامي">
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="signupEmail">البريد الإلكتروني</label>
                        <input type="email" id="signupEmail" name="email" placeholder="myhab77@gmail.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="signupPassword">كلمة المرور</label>
                        <input type="password" id="signupPassword" name="password" placeholder="••••••••••••">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="confirmPassword">تأكيد كلمة المرور</label>
                        <input type="password" id="confirmPassword" name="password_confirmation"
                            placeholder="••••••••••••">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-options">
                        <label class="checkbox-container">
                            <input type="checkbox" id="agreeTerms" name="terms">
                            <span class="checkmark"></span>
                            أوافق على الشروط والأحكام
                        </label>
                        @error('terms')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="submit-btn">إنشاء حساب</button>
                    <div class="divider">
                        <span>أو</span>
                    </div>

                </form>
                    <div class="social-login">
                        <button type="submit" class="social-btn twitter-btn">
                            <img class="social-icon" src="{{ asset('assets/image/Vector.svg') }}" alt="">
                        </button>
                <form action="{{ route('auth.google') }}">
                    @csrf
                    <button type="submit" class="social-btn google-btn">
                        <img class="social-icon" src="{{ asset('assets/image/devicon_google.svg') }}" alt="">
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>
