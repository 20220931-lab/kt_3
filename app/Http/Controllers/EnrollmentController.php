<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Student;
use App\Http\Requests\EnrollmentRequest;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function create()
    {
        $courses = Course::published()->get();
        return view('enrollments.create', compact('courses'));
    }

    public function store(EnrollmentRequest $request)
    {
        $validated = $request->validated();
        $student = Student::firstOrCreate([
            'email' => $validated['email']
        ], [
            'name' => $validated['name']
        ]);
        Enrollment::firstOrCreate([
            'course_id' => $validated['course_id'],
            'student_id' => $student->id
        ]);
        return redirect()->route('enrollments.index')->with('success', 'Đăng ký thành công!');
    }

    public function index(Request $request)
    {
        $courseId = $request->input('course_id');
        $courses = Course::withCount('enrollments')->get();
        $enrollments = Enrollment::with('student', 'course')
            ->when($courseId, function($q) use ($courseId) {
                $q->where('course_id', $courseId);
            })
            ->paginate(10);
        return view('enrollments.index', compact('enrollments', 'courses', 'courseId'));
    }
}
