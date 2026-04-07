@extends('layouts.master')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Danh sách học viên</h1>
    <form method="GET" action="{{ route('enrollments.index') }}" class="flex gap-2">
        <select name="course_id" class="border rounded px-2 py-1">
            <option value="">-- Tất cả khóa học --</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded">Lọc</button>
    </form>
</div>
<table class="min-w-full bg-white rounded shadow overflow-hidden">
    <thead class="bg-gray-200">
        <tr>
            <th class="px-4 py-2">Tên học viên</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Khóa học</th>
            <th class="px-4 py-2">Ngày đăng ký</th>
        </tr>
    </thead>
    <tbody>
        @foreach($enrollments as $enrollment)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $enrollment->student->name }}</td>
            <td class="px-4 py-2">{{ $enrollment->student->email }}</td>
            <td class="px-4 py-2">{{ $enrollment->course->name }}</td>
            <td class="px-4 py-2">{{ $enrollment->created_at->format('d/m/Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-4">
    {{ $enrollments->links() }}
</div>
<div class="mt-6">
    <h2 class="font-semibold">Tổng số học viên: <span class="text-blue-600">{{ $enrollments->total() }}</span></h2>
    @if($courseId)
        @php
            $selectedCourse = $courses->firstWhere('id', $courseId);
        @endphp
        @if($selectedCourse)
            <h2 class="font-semibold mt-2">Doanh thu khóa học: <span class="text-green-600">{{ number_format($selectedCourse->price * $selectedCourse->enrollments_count, 0, ',', '.') }} đ</span></h2>
        @endif
    @endif
</div>
@endsection
