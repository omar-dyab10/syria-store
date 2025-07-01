<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انضم إلينا - Syrian Store</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/join-us-style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        #dynamic-attributes-container {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #e9ecef;
        }

        #dynamic-attributes-container h3 {
            color: #495057;
            margin-bottom: 15px;
            font-size: 1.1em;
            border-bottom: 2px solid #007bff;
            padding-bottom: 8px;
        }

        #dynamic-attributes-fields {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }

        #dynamic-attributes-fields .form-group {
            margin-bottom: 0;
        }

        #dynamic-attributes-fields input,
        #dynamic-attributes-fields select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
        }

        #dynamic-attributes-fields input:focus,
        #dynamic-attributes-fields select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
        }

        .loading-message {
            text-align: center;
            color: #6c757d;
            font-style: italic;
        }

        .error-message {
            text-align: center;
            color: #dc3545;
            font-weight: 500;
        }

        .no-attributes-message {
            text-align: center;
            color: #6c757d;
            font-style: italic;
        }
    </style>
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
            {{-- <div class="search-container">
                <input type="text" placeholder="ابحث عن طلبك..." class="search-input">
                <button class="search-btn">🔍</button>
            </div> --}}

            <!-- Navigation Buttons -->
            {{-- <div class="nav-buttons">
                <a href="add-ad.html" class="nav-btn add-ad-btn">أضف إعلانك</a>
                <a href="join-us.html" class="nav-btn join-btn" id="coloor">انضم إلينا</a>
                <a href="account.html" class="nav-btn account-btn">حسابي</a>
            </div> --}}
        </div>
    </nav>

    <div class="container">
        <div class="form-card">
            <h2>إضافة منتج جديد</h2>
            <form enctype="multipart/form-data" action="{{ route('advertisements.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="product-title">عنوان المنتج</label>
                    <input name="title" type="text" id="product-title" placeholder="مثال: أريكة للبيع">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="source">مصدر المنتج</label>
                    <select name="source" id="source">
                        <option value="">اختر المصدر</option>
                        <option value="owner" {{ old('source') == 'owner' ? 'selected' : '' }}>صاحب المنتج</option>
                        <option value="Real estate office"
                            {{ old('source') == 'Real estate office' ? 'selected' : '' }}>مكتب عقاري</option>
                    </select>
                    @error('source')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">التصنيف</label>
                    <select name="category_id" id="category">
                        <option value="">اختر التصنيف</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Dynamic Attributes Container -->
                <div id="dynamic-attributes-container" style="display: none;">
                    <h3>خصائص إضافية</h3>
                    <div id="dynamic-attributes-fields"></div>
                </div>

                <div class="form-group">
                    <label for="price">السعر(دولار)</label>
                    <input name="price" type="number" id="price">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="number">رقم العقار</label>
                    <input name="number" type="number" id="number">
                    @error('number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group-inline">
                    <div class="form-group">
                        <label for="location_id">المدينة</label>
                        <select name="location_id" id="city">
                            <option value="">جميع المحافظات</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name_ar }}</option>
                            @endforeach
                        </select>
                        @error('location_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="area">المنطقة(الحي)</label>
                        <input name="area" type="text" id="area">
                        @error('area')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">وصف المنتج</label>
                    <textarea name="description" id="description" rows="5"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product-images">صور المنتج</label>
                    <div class="image-upload-box">
                        <p>اسحب وأفلت الصور هنا أو انقر للتحميل</p>
                        <input type="file" name="photos[]" id="product-images" multiple accept="image/*">
                    </div>
                    @error('photos.*')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="submit-btn">نشر المنتج</button>
            </form>
        </div>
    </div>
    <!-- Footer -->
    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categorySelect = document.getElementById('category');
            const dynamicAttributesContainer = document.getElementById('dynamic-attributes-container');
            const dynamicAttributesFields = document.getElementById('dynamic-attributes-fields');

            // عند تغيير التصنيف
            categorySelect.addEventListener('change', function() {
                const categoryId = this.value;

                if (categoryId) {
                    // إظهار حالة التحميل
                    dynamicAttributesContainer.style.display = 'block';
                    dynamicAttributesFields.innerHTML = '<p class="loading-message">جاري تحميل الخصائص...</p>';

                    // جلب الخصائص الديناميكية
                    fetch(`/api/categories/${categoryId}/dynamic-attributes`)
                        .then(response => response.json())
                        .then(attributes => {
                            if (attributes.length > 0) {
                                displayDynamicAttributes(attributes);
                            } else {
                                dynamicAttributesFields.innerHTML = '<p class="no-attributes-message">لا توجد خصائص إضافية لهذا التصنيف</p>';
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching dynamic attributes:', error);
                            dynamicAttributesFields.innerHTML = '<p class="error-message">حدث خطأ في تحميل الخصائص</p>';
                        });
                }
            });

            function displayDynamicAttributes(attributes) {
                dynamicAttributesFields.innerHTML = '';

                attributes.forEach(attribute => {
                    const formGroup = document.createElement('div');
                    formGroup.className = 'form-group';

                    const label = document.createElement('label');
                    label.textContent = attribute.name_ar;
                    label.setAttribute('for', `attr_${attribute.id}`);

                    let input;

                    // Determine input type based on attribute name
                    if (attribute.name_en.toLowerCase().includes('number') ||
                        attribute.name_en.toLowerCase().includes('area') ||
                        attribute.name_en.toLowerCase().includes('floor')) {
                        input = document.createElement('input');
                        input.type = 'number';
                        input.min = '0';
                    } else if (attribute.name_en.toLowerCase().includes('furnished') ||
                        attribute.name_en.toLowerCase().includes('balcony') ||
                        attribute.name_en.toLowerCase().includes('parking') ||
                        attribute.name_en.toLowerCase().includes('elevator') ||
                        attribute.name_en.toLowerCase().includes('air conditioning') ||
                        attribute.name_en.toLowerCase().includes('heating') ||
                        attribute.name_en.toLowerCase().includes('swimming pool') ||
                        attribute.name_en.toLowerCase().includes('garage') ||
                        attribute.name_en.toLowerCase().includes('security system')) {
                        // Create select for yes/no options
                        input = document.createElement('select');
                        const option1 = document.createElement('option');
                        option1.value = '';
                        option1.textContent = 'اختر';
                        const option2 = document.createElement('option');
                        option2.value = 'نعم';
                        option2.textContent = 'نعم';
                        const option3 = document.createElement('option');
                        option3.value = 'لا';
                        option3.textContent = 'لا';
                        input.appendChild(option1);
                        input.appendChild(option2);
                        input.appendChild(option3);
                    } else {
                        input = document.createElement('input');
                        input.type = 'text';
                    }

                    input.id = `attr_${attribute.id}`;
                    input.name = `dynamic_attributes[${attribute.id}]`;
                    input.placeholder = `أدخل ${attribute.name_ar}`;

                    formGroup.appendChild(label);
                    formGroup.appendChild(input);
                    dynamicAttributesFields.appendChild(formGroup);
                });
            }
        });
    </script>

</body>

</html>
