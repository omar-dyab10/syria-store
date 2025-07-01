@extends('dashboard')
@section('content')
    <div id="add-user-modal" class="modal content-section active">
        <div class="modal-content">
            <div class="modal-header">
                <h3>إضافة مستخدم جديد</h3>
                <a href="{{ route('users.index') }}" class="close">&times;</a>
            </div>
            <form class="modal-form" action="{{ route("users.update",$user) }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>الاسم الأول</label>
                    <input type="text" value="{{ old('first_name',$user->first_name) }}" name="first_name">
                    @error("first_name")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>الاسم الثاني</label>
                    <input type="text" value="{{ old('last_name',$user->last_name) }}" name="last_name">
                    @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" value="{{ old('email',$user->email) }}" name="email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" value="{{ old('password',$user->password) }}" name="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>نوع الحساب</label>
                    <select required name="role">
                        <option value="">اختر نوع الحساب</option>
                        <option value="admin">مدير</option>
                        <option value="user">مستخدم عادي</option>
                    </select>
                    @error('role')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-primary">إضافة</button>
                </div>
            </form>
        </div>
    </div>
@endsection
