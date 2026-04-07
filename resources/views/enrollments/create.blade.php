@extends('layouts.master')

@section('content')
<h1 class="text-2xl font-bold mb-6">Đăng ký khóa học</h1>
<form action="{{ route('enrollments.store') }}" method="POST" class="space-y-4 max-w-xl">
    @csrf
    <div>
        <label class="block font-semibold mb-1">Chọn khóa học <span class="text-red-500">*</span></label>
        <select name="course_id" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Chọn khóa học --</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block font-semibold mb-1">Tên học viên <span class="text-red-500">*</span></label>
        <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
        <label class="block font-semibold mb-1">Email <span class="text-red-500">*</span></label>
        <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Đăng ký</button>
    </div>
</form>
@endsection
