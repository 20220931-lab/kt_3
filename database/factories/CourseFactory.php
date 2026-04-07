<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        $subjects = [
            'Toán cao cấp', 'Vật lý đại cương', 'Hóa học đại cương', 'Kinh tế vi mô',
            'Kinh tế vĩ mô', 'Lập trình C', 'Lập trình Python', 'Cơ sở dữ liệu',
            'Xác suất thống kê', 'Tiếng Anh chuyên ngành', 'Quản trị học', 'Tư duy phản biện',
            'Kỹ năng mềm', 'Pháp luật đại cương', 'Triết học Mác-Lênin', 'Tư tưởng Hồ Chí Minh',
            'Cấu trúc dữ liệu', 'Mạng máy tính', 'Phân tích thiết kế hệ thống', 'Quản trị mạng'
        ];
        $name = $this->faker->unique()->randomElement($subjects);
        return [
            'name' => $name,
            'slug' => $this->faker->unique()->slug,
            'price' => $this->faker->numberBetween(200000, 1500000),
            'description' => $this->faker->paragraph,
            'image' => null,
            'status' => $this->faker->randomElement(['draft', 'published']),
        ];
    }
}
