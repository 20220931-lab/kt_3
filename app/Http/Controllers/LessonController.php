<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use App\Http\Requests\LessonRequest;

class LessonController extends Controller
{
    public function create($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('lessons.create', compact('course'));
    }

    public function store(LessonRequest $request, $courseId)
    {
        $validated = $request->validated();
        $validated['course_id'] = $courseId;
        Lesson::create($validated);
        return redirect()->route('courses.edit', $courseId)->with('success', 'Thêm bài học thành công!');
    }

    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('lessons.edit', compact('lesson'));
    }

    public function update(LessonRequest $request, $id)
    {
        $lesson = Lesson::findOrFail($id);
        $validated = $request->validated();
        $lesson->update($validated);
        return redirect()->route('courses.edit', $lesson->course_id)->with('success', 'Cập nhật bài học thành công!');
    }

    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);
        $courseId = $lesson->course_id;
        $lesson->delete();
        return redirect()->route('courses.edit', $courseId)->with('success', 'Đã xóa bài học!');
    }
}
