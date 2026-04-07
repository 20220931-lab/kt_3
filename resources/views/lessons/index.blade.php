@extends('layouts.master')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Bài học của khóa: {{ $course->name }}</h1>
    <a href="{{ route('lessons.create', $course->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Thêm bài học</a>
</div>
<table class="min-w-full bg-white rounded shadow overflow-hidden">
    <thead class="bg-gray-200">
        <tr>
            <th class="px-4 py-2">Thứ tự</th>
            <th class="px-4 py-2">Tiêu đề</th>
            <th class="px-4 py-2">Video URL</th>
            <th class="px-4 py-2">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lessons as $lesson)
        <tr class="border-b">
            <td class="px-4 py-2 text-center">{{ $lesson->order }}</td>
            <td class="px-4 py-2 font-semibold">{{ $lesson->title }}</td>
            <td class="px-4 py-2">
                @if($lesson->video_url)
                    <a href="{{ $lesson->video_url }}" target="_blank" class="text-blue-600 hover:underline">Xem video</a>
                @else
                    <span class="text-gray-400">Không có</span>
                @endif
            </td>
            <td class="px-4 py-2">
                <a href="{{ route('lessons.edit', $lesson->id) }}" class="text-blue-600 hover:underline mr-2">Sửa</a>
                <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="inline" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
