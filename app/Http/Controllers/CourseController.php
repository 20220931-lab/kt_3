<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::withCount('lessons')
            ->with('enrollments')
            ->paginate(10);
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(CourseRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']) . '-' . uniqid();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }
        Course::create($validated);
        return redirect()->route('courses.index')->with('success', 'Thêm khóa học thành công!');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(CourseRequest $request, Course $course)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']) . '-' . uniqid();
        if ($request->hasFile('image')) {
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }
        $course->update($validated);
        return redirect()->route('courses.index')->with('success', 'Cập nhật khóa học thành công!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Đã xóa (ẩn) khóa học!');
    }

    public function restore($id)
    {
        $course = Course::withTrashed()->findOrFail($id);
        $course->restore();
        return redirect()->route('courses.index')->with('success', 'Khôi phục khóa học thành công!');
    }
}
