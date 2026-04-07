<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="space-y-4 max-w-xl">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif
    <div>
        <label class="block font-semibold mb-1">Tên khóa học <span class="text-red-500">*</span></label>
        <input type="text" name="name" value="{{ old('name', $course->name ?? '') }}" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
        <label class="block font-semibold mb-1">Giá <span class="text-red-500">*</span></label>
        <input type="number" name="price" min="1" value="{{ old('price', $course->price ?? '') }}" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
        <label class="block font-semibold mb-1">Mô tả</label>
        <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $course->description ?? '') }}</textarea>
    </div>
    <div>
        <label class="block font-semibold mb-1">Ảnh khóa học</label>
        <input type="file" name="image" class="w-full border rounded px-3 py-2">
        @if(!empty($course->image))
            <img src="{{ asset('storage/'.$course->image) }}" alt="Ảnh hiện tại" class="w-24 h-24 object-cover mt-2 rounded">
        @endif
    </div>
    <div>
        <label class="block font-semibold mb-1">Trạng thái <span class="text-red-500">*</span></label>
        <select name="status" class="w-full border rounded px-3 py-2" required>
            <option value="draft" {{ old('status', $course->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ old('status', $course->status ?? '') == 'published' ? 'selected' : '' }}>Published</option>
        </select>
    </div>
    <div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">{{ $buttonText }}</button>
    </div>
</form>
