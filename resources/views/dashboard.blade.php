<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم المسؤول</title>
    <link rel="stylesheet" href="{{ asset('assets/admin-style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="admin-container">
        <aside class="sidebar">
            <div class="logo">
                <a href="{{ route('welcome') }}">
                    <h2>Syrian Store</h2>
                </a>
            </div>
            <nav class="main-nav">
                <ul>

                    <li><a href="{{ route('users.index') }}" class="nav-link"><i class="fas fa-users"></i> إدارة
                            المستخدمين</a></li>
                    <li><a href="{{ route('super-admin.advertisementsPending') }}" class="nav-link"><i
                                class="fas fa-ad"></i> إدارة الإعلانات</a></li>
                    <li><a href="#" class="nav-link"><i class="fas fa-edit"></i> الحقول الديناميكية</a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header class="admin-header">
                <h1 id="page-title">لوحة القيادة</h1>
                <div class="user-info dropdown">
                    <div class="user-menu-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>مرحباً، المسؤول</span>
                        <i class="fas fa-user-circle ms-2"></i>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    تسجيل الخروج
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </header>
            @yield('content')
            <!-- إدارة الإعلانات -->
            {{-- <div id="ads-section" class="content-section">
                <div class="section-header">
                    <h2>إدارة الإعلانات</h2>
                </div>

                <div class="filter-tabs">
                    <button class="tab-btn active" onclick="filterAds('pending')">في انتظار الموافقة <span class="badge-count">12</span></button>
                    <button class="tab-btn" onclick="filterAds('approved')">المقبولة</button>
                    <button class="tab-btn" onclick="filterAds('rejected')">المرفوضة</button>
                </div>

                <div class="ads-container" id="ads-container">
                    <div class="ad-card pending">
                        <div class="ad-header">
                            <h3>إعلان شقة في دمشق</h3>
                            <span class="ad-status status-pending">في انتظار الموافقة</span>
                        </div>
                        <div class="ad-content">
                            <div class="ad-image">
                                <img src="https://via.placeholder.com/200x150" alt="شقة في دمشق">
                            </div>
                            <div class="ad-details">
                                <p><strong>المالك:</strong> محمد أحمد</p>
                                <p><strong>السعر:</strong> 400,000 ليرة سورية</p>
                                <p><strong>المساحة:</strong> 100 متر مربع</p>
                                <p><strong>تاريخ النشر:</strong> 2025-06-29</p>
                            </div>
                        </div>
                        <div class="ad-actions">
                            <button class="btn-approve" onclick="approveAd(1)">
                                <i class="fas fa-check"></i> موافقة
                            </button>
                            <button class="btn-reject" onclick="rejectAd(1)">
                                <i class="fas fa-times"></i> رفض
                            </button>
                            <button class="btn-view" onclick="viewAd(1)">
                                <i class="fas fa-eye"></i> عرض التفاصيل
                            </button>
                        </div>
                    </div>

                    <div class="ad-card pending">
                        <div class="ad-header">
                            <h3>إعلان مكتب تجاري</h3>
                            <span class="ad-status status-pending">في انتظار الموافقة</span>
                        </div>
                        <div class="ad-content">
                            <div class="ad-image">
                                <img src="https://via.placeholder.com/200x150" alt="مكتب تجاري">
                            </div>
                            <div class="ad-details">
                                <p><strong>المالك:</strong> سارة خالد</p>
                                <p><strong>السعر:</strong> 800,000 ليرة سورية</p>
                                <p><strong>المساحة:</strong> 80 متر مربع</p>
                                <p><strong>تاريخ النشر:</strong> 2025-06-28</p>
                            </div>
                        </div>
                        <div class="ad-actions">
                            <button class="btn-approve" onclick="approveAd(2)">
                                <i class="fas fa-check"></i> موافقة
                            </button>
                            <button class="btn-reject" onclick="rejectAd(2)">
                                <i class="fas fa-times"></i> رفض
                            </button>
                            <button class="btn-view" onclick="viewAd(2)">
                                <i class="fas fa-eye"></i> عرض التفاصيل
                            </button>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- الحقول الديناميكية -->
            {{-- <div id="dynamic-fields-section" class="content-section">
                <div class="section-header">
                    <h2>إدارة الحقول الديناميكية</h2>
                    <button class="btn-primary" onclick="openModal('add-field-modal')">
                        <i class="fas fa-plus"></i> إضافة حقل جديد
                    </button>
                </div>

                <div class="fields-container">
                    <div class="field-card">
                        <div class="field-header">
                            <h3>نوع التدفئة</h3>
                            <span class="field-type">قائمة منسدلة</span>
                        </div>
                        <div class="field-options">
                            <span class="option-tag">مركزي</span>
                            <span class="option-tag">فردي</span>
                            <span class="option-tag">بدون</span>
                        </div>
                        <div class="field-actions">
                            <button class="btn-action btn-edit" onclick="editField(1)"><i class="fas fa-edit"></i></button>
                            <button class="btn-action btn-delete" onclick="deleteField(1)"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <div class="field-card">
                        <div class="field-header">
                            <h3>عدد مواقف السيارات</h3>
                            <span class="field-type">رقم</span>
                        </div>
                        <div class="field-options">
                            <span class="option-tag">من 0 إلى 10</span>
                        </div>
                        <div class="field-actions">
                            <button class="btn-action btn-edit" onclick="editField(2)"><i class="fas fa-edit"></i></button>
                            <button class="btn-action btn-delete" onclick="deleteField(2)"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <div class="field-card">
                        <div class="field-header">
                            <h3>المرافق المتاحة</h3>
                            <span class="field-type">متعدد الخيارات</span>
                        </div>
                        <div class="field-options">
                            <span class="option-tag">مصعد</span>
                            <span class="option-tag">حديقة</span>
                            <span class="option-tag">مسبح</span>
                            <span class="option-tag">جيم</span>
                        </div>
                        <div class="field-actions">
                            <button class="btn-action btn-edit" onclick="editField(3)"><i class="fas fa-edit"></i></button>
                            <button class="btn-action btn-delete" onclick="deleteField(3)"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div> --}}
        </main>
    </div>

    <!-- النوافذ المنبثقة -->
    <!-- إضافة مستخدم -->
    {{-- <div id="add-user-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>إضافة مستخدم جديد</h3>
                <span class="close" onclick="closeModal('add-user-modal')">&times;</span>
            </div>
            <form class="modal-form">
                <div class="form-group">
                    <label>الاسم الكامل</label>
                    <input type="text" required>
                </div>
                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" required>
                </div>
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" required>
                </div>
                <div class="form-group">
                    <label>نوع الحساب</label>
                    <select required>
                        <option value="">اختر نوع الحساب</option>
                        <option value="admin">مدير</option>
                        <option value="user">مستخدم عادي</option>
                    </select>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-primary">إضافة</button>
                    <button type="button" class="btn-secondary" onclick="closeModal('add-user-modal')">إلغاء</button>
                </div>
            </form>
        </div>
    </div> --}}

    <!-- إضافة عقار -->
    {{-- <div id="add-property-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>إضافة عقار جديد</h3>
                <span class="close" onclick="closeModal('add-property-modal')">&times;</span>
            </div>
            <form class="modal-form">
                <div class="form-group">
                    <label>عنوان العقار</label>
                    <input type="text" required>
                </div>
                <div class="form-group">
                    <label>السعر</label>
                    <input type="number" required>
                </div>
                <div class="form-group">
                    <label>المساحة (متر مربع)</label>
                    <input type="number" required>
                </div>
                <div class="form-group">
                    <label>عدد الغرف</label>
                    <input type="number" required>
                </div>
                <div class="form-group">
                    <label>الوصف</label>
                    <textarea rows="4"></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-primary">إضافة</button>
                    <button type="button" class="btn-secondary"
                        onclick="closeModal('add-property-modal')">إلغاء</button>
                </div>
            </form>
        </div>
    </div> --}}

    <!-- إضافة حقل ديناميكي -->
    {{-- <div id="add-field-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>إضافة حقل ديناميكي</h3>
                <span class="close" onclick="closeModal('add-field-modal')">&times;</span>
            </div>
            <form class="modal-form">
                <div class="form-group">
                    <label>اسم الحقل</label>
                    <input type="text" required>
                </div>
                <div class="form-group">
                    <label>نوع الحقل</label>
                    <select required onchange="toggleFieldOptions(this.value)">
                        <option value="">اختر نوع الحقل</option>
                        <option value="text">نص</option>
                        <option value="number">رقم</option>
                        <option value="select">قائمة منسدلة</option>
                        <option value="checkbox">متعدد الخيارات</option>
                    </select>
                </div>
                <div class="form-group" id="field-options" style="display: none;">
                    <label>الخيارات (مفصولة بفاصلة)</label>
                    <textarea rows="3" placeholder="خيار 1, خيار 2, خيار 3"></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-primary">إضافة</button>
                    <button type="button" class="btn-secondary"
                        onclick="closeModal('add-field-modal')">إلغاء</button>
                </div>
            </form>
        </div>
    </div> --}}


</body>

</html>
