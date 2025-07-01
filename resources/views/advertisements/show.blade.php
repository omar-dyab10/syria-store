<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل العقار - Syrian Store</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/property-details-style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <h2>Syrian Store</h2>
            </div>
            <div class="search-container">
                <input type="text" placeholder="ابحث عن طلبك..." class="search-input">
                <button class="search-btn">🔍</button>
            </div>

            <div class="nav-buttons">
                <button class="nav-btn add-ad-btn">أضف إعلانك</button>
                <a href="join-us.html" class="nav-btn join-btn" id="coloor">انضم إلينا</a>
                <a href="account.html" class="nav-btn account-btn">حسابي</a>
            </div>
        </div>
    </nav>
    <div class="breadcrumb">
        الرئيسية > العقارات > فيلا طابقين فاخرة للبيع
    </div>
    <div class="details-container">
        <div class="main-content">
            <div class="property-main-image" style="background: transparent;">
                <div class="mt-2" style="background: transparent;">
                    @if ($advertisement->hasMedia('images'))
                        <img src="{{ $advertisement->getFirstMediaUrl('images', 'medium') }}" alt="الصورة الرئيسية">
                    @else
                        <div class="no-image-placeholder">
                            <i class="fas fa-image"></i>
                            <p>لا توجد صورة رئيسية</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="property-price-title">
                <span class="price">{{ $advertisement->price }} $</span>
                <h1 class="title">{{ $advertisement->title }}</h1>
            </div>
            <p class="property-description">
                {{ $advertisement->description }}
            </p>
            <div class="property-thumbnails">
                @if ($advertisement->hasMedia('images'))
                    @foreach ($advertisement->getMedia('images') as $image)
                        <div class="thumbnail">
                            <img src="{{ $image->getUrl('thumb') }}" alt="صورة الإعلان" class="thumbnail-image"
                                onclick="showFullImage('{{ $image->getUrl('medium') }}')"
                                style="width: 100%; height: 100%; object-fit: cover; cursor: pointer;">
                        </div>
                    @endforeach
                @else
                    <div class="no-thumbn ails">
                        <p>لا توجد صور إضافية</p>
                    </div>
                @endif
            </div>
            <div class="similar-ads-section">
                <h2>إعلانات مشابهة</h2>
                <div class="properties-grid">
                    @foreach ($advertisements as $advertisement)
                        <div class="property-card">
                            <div class="property-image"> <img
                                    src="{{ $advertisement->getFirstMediaUrl('images', 'thumb') }}" alt="">
                            </div>
                            <div class="property-info">
                                <h3> {{ $advertisement->title }} </h3>
                                <button class="details-btn">عرض التفاصيل</button>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        @if ($dynamicAttributesValues->count() > 0)
            <div class="sidebar">
                <h2>تفاصيل العقار:</h2>
                @foreach ($dynamicAttributesValues as $dynamicAttributesValue)
                    <div class="detail-item">
                        <span> {{ $dynamicAttributesValue->attribute->name_ar }} </span>
                        <span>{{ $dynamicAttributesValue->value_ar }}</span>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Footer -->
    @include('layouts.footer')
</body>

</html>
