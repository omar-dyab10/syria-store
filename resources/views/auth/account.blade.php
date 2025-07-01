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
    <!-- Main Container -->
    <div class="main-container">
        <!-- Initial Account Selection -->
        <div class="account-selection" id="accountSelection">
            <div class="selection-card">
                <div class="selection-image">
                    <img src="{{ asset('assets/image/11785899_4826433 1.png') }}" alt="صورة توضيحية">
                </div>
                    <div class="selection-buttons">
                        <form action="{{ route('login') }}">
                            @csrf
                            <button class="btn login-btn" type="submit">تسجيل الدخول</button>
                        </form>
                        <form action="{{ route('register') }}">
                            @csrf
                            <button class="btn signup-btn" type="submit">إنشاء حساب</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</body>

</html>
