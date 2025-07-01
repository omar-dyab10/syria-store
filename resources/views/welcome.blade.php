<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syrian Store - متجر العقارات السوري</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-container">
            <!-- Logo -->
            <div class="logo">
                <h2>Syrian Store</h2>
            </div>

            <!-- Search Bar -->
            <div class="search-container">
                <input type="text" placeholder="ابحث عن طلبك..." class="search-input">
                <img class="search-btn" src="{{ asset('assets/image/Group 2667.svg') }}" alt="icon">
            </div>

            <!-- Navigation Buttons -->
            <div class="nav-buttons">
                <a href="{{ route('advertisements.create') }}" class="nav-btn add-ad-btn">أضف إعلانك</a>
                @guest
                <a href="{{ route('account') }}" class="nav-btn join-btn" id="coloor">انضم إلينا</a>
                @endguest
                @auth
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-btn join-btn" id="coloor">تسجيل خروج</button>
                </form>
                @endauth
                <a href="#" class="nav-btn account-btn">حسابي</a>
                @role('super-admin')
                <a href="{{ route('admin.dashboard') }}" class="nav-btn account-btn"> لوحة التحكم </a>
                @endrole
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>اختر العقار الذي يناسب موقعك</h1>
                <p>منصة إلكترونية شاملة لبيع وشراء العقارات</p>
                <p>الأدوات الشرائية والخدمات في سوريا</p>
                <p>تصميم وتطوير لتجربة مستخدم سهلة وآمنة</p>
                <button class="hero-btn">هيا بنا</button>
            </div>
            <div class="hero-image">
                <div class="placeholder-image">صورة العقار الرئيسية</div>
            </div>
        </div>
    </section>

    <!-- Advanced Search Section -->
    <section class="search-section">
        <div class="search-filters">
            <div class="filter-group">
                <label>ابحث عن طلبك</label>
                <input type="text" placeholder="ابحث عن طلبك..." class="filter-input">
            </div>

            <div class="filter-group">
                <label>جميع المحافظات</label>
                <select class="filter-select">
                    <option value="">جميع المحافظات</option>
                    <option value="damascus">دمشق</option>
                    <option value="aleppo">حلب</option>
                    <option value="homs">حمص</option>
                    <option value="hama">حماة</option>
                    <option value="lattakia">اللاذقية</option>
                    <option value="tartous">طرطوس</option>
                    <option value="idlib">إدلب</option>
                    <option value="daraa">درعا</option>
                    <option value="sweida">السويداء</option>
                    <option value="quneitra">القنيطرة</option>
                    <option value="deir-ez-zor">دير الزور</option>
                    <option value="raqqa">الرقة</option>
                    <option value="hasaka">الحسكة</option>
                    <option value="rif-damascus">ريف دمشق</option>
                </select>
            </div>

            <div class="filter-group">
                <label>النوع</label>
                <select class="filter-select">
                    <option value="">النوع</option>
                    <option value="new">جديد</option>
                    <option value="used">مستعمل</option>
                </select>
            </div>

            <div class="filter-group">
                <label>نوع العقار</label>
                <select class="filter-select">
                    <option value="">نوع العقار</option>
                    <option value="land">أرض</option>
                    <option value="apartment">شقة</option>
                    <option value="villa">فيلا</option>
                    <option value="office">مكتب</option>
                </select>
            </div>

            <div class="filter-group">
                <label>أدنى سعر</label>
                <select class="filter-select">
                    <option value="">أدنى سعر</option>
                    <option value="50000">50,000 ل.س</option>
                    <option value="100000">100,000 ل.س</option>
                    <option value="500000">500,000 ل.س</option>
                    <option value="1000000">1,000,000 ل.س</option>
                </select>
            </div>

            <div class="filter-group">
                <label>أقصى سعر</label>
                <select class="filter-select">
                    <option value="">أقصى سعر</option>
                    <option value="1000000">1,000,000 ل.س</option>
                    <option value="5000000">5,000,000 ل.س</option>
                    <option value="10000000">10,000,000 ل.س</option>
                    <option value="50000000">50,000,000 ل.س</option>
                </select>
            </div>
        </div>
    </section>

    <!-- Properties Section -->
    <section class="properties">
        <h2 class="section-title">العقارات</h2>
        <div class="properties-grid">
            <!-- Property Card 1 -->
            @foreach ($advertisements as $advertisement)
                <div class="property-card">
                    <div class="property-image"><img src="{{ $advertisement->getFirstMediaUrl('images','medium') }}" alt="الصورة غير متوفرة"></div>
                    <div class="property-info">
                        <h3>{{ $advertisement->title ?? 'عنوان الإعلان' }}</h3>
                        <a href="{{ route('advertisements.show', $advertisement) }}" class="details-btn">عرض التفاصيل</a>
                    </div>
                </div>
            @endforeach
            {{ $advertisements->links('pagination::bootstrap-5') }}
        </div>
    </section>
    <!-- Footer -->
    @include("layouts.footer")

</body>

</html>
