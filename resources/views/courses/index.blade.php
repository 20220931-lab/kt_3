@extends('layouts.master')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Danh sách khóa học</h1>
    <a href="{{ route('courses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Thêm khóa học</a>
</div>
<table class="min-w-full bg-white rounded shadow overflow-hidden">
    <thead class="bg-gray-200">
        <tr>
            <th class="px-4 py-2">Ảnh</th>
            <th class="px-4 py-2">Tên</th>
            <th class="px-4 py-2">Giá</th>
            <th class="px-4 py-2">Trạng thái</th>
            <th class="px-4 py-2">Số bài học</th>
            <th class="px-4 py-2">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr class="border-b">
            <td class="px-4 py-2">
                @if($course->image)
                    <img src="{{ asset('storage/'.$course->image) }}" alt="{{ $course->name }}" class="w-16 h-16 object-cover rounded">
                @else
                    <span class="text-gray-400">No image</span>
                @endif
            </td>
            <td class="px-4 py-2 font-semibold">{{ $course->name }}</td>
            <td class="px-4 py-2">{{ number_format($course->price, 0, ',', '.') }} đ</td>
            <td class="px-4 py-2">
                @if($course->status === 'published')
                    <span class="bg-green-200 text-green-800 px-2 py-1 rounded text-xs">Published</span>
                @else
                    <span class="bg-gray-300 text-gray-700 px-2 py-1 rounded text-xs">Draft</span>
                @endif
            </td>
            <td class="px-4 py-2 text-center">{{ $course->lessons_count }}</td>
            <td class="px-4 py-2">
                <a href="{{ route('courses.edit', $course) }}" class="text-blue-600 hover:underline mr-2">Sửa</a>
                @if($course->deleted_at)
                    <form action="{{ route('courses.restore', $course->id) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-green-600 hover:underline">Khôi phục</button>
                    </form>
                @else
                    <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Xóa</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-4">
    {{ $courses->links() }}
</div>
@endsection
