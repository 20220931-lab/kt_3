@extends('layouts.master')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard Thống kê</h1>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded shadow">
        <div class="text-gray-500">Tổng số khóa học</div>
        <div class="text-3xl font-bold">{{ $totalCourses }}</div>
    </div>
    <div class="bg-white p-6 rounded shadow">
        <div class="text-gray-500">Tổng số học viên</div>
        <div class="text-3xl font-bold">{{ $totalStudents }}</div>
    </div>
    <div class="bg-white p-6 rounded shadow">
        <div class="text-gray-500">Tổng doanh thu</div>
        <div class="text-3xl font-bold">{{ number_format($totalRevenue, 0, ',', '.') }} đ</div>
    </div>
</div>
<div class="bg-white p-6 rounded shadow mb-8">
    <h2 class="text-lg font-semibold mb-2">Khóa học nhiều học viên nhất</h2>
    @if($topCourse)
        <div class="flex items-center gap-4">
            @if($topCourse->image)
                <img src="{{ asset('storage/'.$topCourse->image) }}" class="w-16 h-16 object-cover rounded" alt="">
            @endif
            <div>
                <div class="font-bold">{{ $topCourse->name }}</div>
                <div class="text-gray-600">Số học viên: <span class="font-semibold">{{ $topCourse->enrollments_count }}</span></div>
            </div>
        </div>
    @else
        <div class="text-gray-400">Chưa có dữ liệu</div>
    @endif
</div>
<div class="bg-white p-6 rounded shadow mb-8">
    <h2 class="text-lg font-semibold mb-2">Thống kê doanh thu & số học viên từng khóa</h2>
    <table class="min-w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">Khóa học</th>
                <th class="px-4 py-2">Số học viên</th>
                <th class="px-4 py-2">Doanh thu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courseStats as $stat)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $stat['name'] }}</td>
                <td class="px-4 py-2 text-center">{{ $stat['student_count'] }}</td>
                <td class="px-4 py-2">{{ number_format($stat['revenue'], 0, ',', '.') }} đ</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-lg font-semibold mb-2">5 khóa học mới nhất</h2>
    <ul class="list-disc pl-6">
        @foreach($latestCourses as $course)
            <li>{{ $course->name }} <span class="text-gray-500">({{ $course->created_at->format('d/m/Y') }})</span></li>
        @endforeach
    </ul>
</div>
@endsection
