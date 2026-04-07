<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use App\Models\Lesson;
use App\Models\Enrollment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Tạo 10 khóa học
        Course::factory(10)->create()->each(function ($course) {
            // Mỗi khóa học có 3-5 bài học
            Lesson::factory(rand(3,5))->create(['course_id' => $course->id]);
        });

        // Tạo 10 học viên
        Student::factory(10)->create();

        // Đăng ký ngẫu nhiên học viên vào các khóa học
        $courses = Course::all();
        Student::all()->each(function ($student) use ($courses) {
            $enrollCourses = $courses->random(rand(2,4));
            foreach ($enrollCourses as $course) {
                Enrollment::firstOrCreate([
                    'course_id' => $course->id,
                    'student_id' => $student->id
                ]);
            }
        });
    }
}
