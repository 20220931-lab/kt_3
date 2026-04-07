<form action="{{ $action }}" method="POST" class="space-y-4 max-w-xl">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif
    <div>
        <label class="block font-semibold mb-1">Tiêu đề <span class="text-red-500">*</span></label>
        <input type="text" name="title" value="{{ old('title', $lesson->title ?? '') }}" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
        <label class="block font-semibold mb-1">Nội dung</label>
        <textarea name="content" class="w-full border rounded px-3 py-2">{{ old('content', $lesson->content ?? '') }}</textarea>
    </div>
    <div>
        <label class="block font-semibold mb-1">Video URL</label>
        <input type="url" name="video_url" value="{{ old('video_url', $lesson->video_url ?? '') }}" class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block font-semibold mb-1">Thứ tự <span class="text-red-500">*</span></label>
        <input type="number" name="order" min="0" value="{{ old('order', $lesson->order ?? 0) }}" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">{{ $buttonText }}</button>
    </div>
</form>
