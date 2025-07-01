@extends('dashboard')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div id="ads-section">
        <div class="section-header">
            <h2>إدارة الإعلانات</h2>
        </div>

        <div class="filter-tabs">
            <a href="{{ route('super-admin.advertisementsPending') }}" class="tab-btn active">في انتظار الموافقة <span
                    class="badge-count">12</span></a>
            <a href="{{ route('super-admin.advertisementsApprove') }}" class="tab-btn">المقبولة</a>
            <a href="{{ route('super-admin.advertisementsReject') }}" class="tab-btn">المرفوضة</a>
        </div>

        <div class="ads-container" id="ads-container">
            @foreach ($advertisements as $advertisement)
                <div class="ad-card pending">
                    <div class="ad-header">
                        <h3> {{ $advertisement->title }} </h3>
                        <span class="ad-status status-pending"> {{ $advertisement->status }} </span>
                    </div>
                    <div class="ad-content">
                        <div class="ad-image">
                            <img src="{{ $advertisement->getFirstMediaUrl('images','thumb') }}" alt="الصورة غير متوفرة">
                        </div>
                        <div class="ad-details">
                            <p><strong>اسم صاحب المنشور:</strong> {{ $advertisement->user->first_name . ' ' . $advertisement->user->last_name }} </p>
                            <p><strong>السعر:</strong> {{ $advertisement->price }} </p>
                            <p><strong>صاحب العلاقة:</strong> {{ $advertisement->source }} </p>
                            <p><strong>تاريخ النشر:</strong> {{ $advertisement->created_at }} </p>
                        </div>
                    </div>
                    <div class="ad-actions">
                        <a href="#" class="btn-reject">
                            <i class="fas fa-times"></i> رفض
                        </a>
                        <a href="{{ route('advertisements.show',$advertisement) }}" class="btn-view">
                            <i class="fas fa-eye"></i> عرض التفاصيل
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
