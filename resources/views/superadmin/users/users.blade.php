@extends('dashboard')
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div id="users-section" class="content-section active">
        <div class="section-header">
            <h2>إدارة المستخدمين</h2>
            <form action="{{ route('users.create') }}">
                @csrf
                <button class="btn-primary">
                    <i class="fas fa-plus"></i> إضافة مستخدم جديد
                </button>
            </form>
        </div>

        <div class="filter-tabs">
            <a href="{{ route('users.index') }}" class="tab-btn active">جميع المستخدمين</a>
            <a href="{{ route('super-admin.admins') }}" class="tab-btn">المدراء</a>
        </div>

        <div class="users-table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>الاسم الأول</th>
                        <th>الاسم الثاني</th>
                        <th>البريد الإلكتروني</th>
                        <th>نوع الحساب</th>
                        <th>تاريخ التسجيل</th>
                        <th>رقم الهاتف</th>
                        <th>الرقم الوطني</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody id="users-tbody">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="badge badge-admin">{{ $user->roles->first()->name ?? 'null' }}</span></td>
                            <td>{{ $user->created_at }}</td>
                            <td><span class="phone"> {{ $user->phone ?? 'الحساب غير مُعرَّف' }}</span></td>
                            <td><span class="national-number"> {{ $user->national_number ?? 'الحساب غير مُعرَّف' }}</span>
                            </td>
                            <td>
                                <a href="{{ route('users.edit', $user) }}" class="btn-action btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('users.destroy', $user) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn-action btn-delete"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
