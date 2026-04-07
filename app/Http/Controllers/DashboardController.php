<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Enrollment;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCourses = Course::count();
        $totalStudents = Student::count();
        $courses = Course::withCount('enrollments')->with('enrollments')->get();
        $totalRevenue = $courses->sum(function($course) {
            return $course->price * $course->enrollments_count;
        });
        $topCourse = $courses->sortByDesc('enrollments_count')->first();
        $latestCourses = Course::orderByDesc('created_at')->take(5)->get();

        // Thống kê doanh thu và số học viên từng khóa
        $courseStats = $courses->map(function($course) {
            return [
                'name' => $course->name,
                'revenue' => $course->price * $course->enrollments_count,
                'student_count' => $course->enrollments_count
            ];
        });

        return view('dashboard', compact('totalCourses', 'totalStudents', 'totalRevenue', 'topCourse', 'latestCourses', 'courseStats'));
    }
}
