<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        $lastNames = ['Nguyễn', 'Trần', 'Lê', 'Phạm', 'Hoàng', 'Phan', 'Vũ', 'Đặng', 'Bùi', 'Đỗ', 'Hồ', 'Ngô', 'Dương', 'Lý'];
        $middleNames = ['Văn', 'Thị', 'Hữu', 'Đức', 'Minh', 'Quang', 'Thanh', 'Thành', 'Xuân', 'Ngọc', 'Gia', 'Tuấn', 'Anh', 'Thảo'];
        $firstNames = ['Nam', 'Hùng', 'Dũng', 'Sơn', 'Hà', 'Trang', 'Lan', 'Hương', 'Mai', 'Phương', 'Tú', 'Hải', 'Linh', 'Yến', 'Tâm', 'Khoa', 'Hiếu', 'Thắng', 'Tùng', 'Bình'];
        $name = $this->faker->randomElement($lastNames) . ' ' . $this->faker->randomElement($middleNames) . ' ' . $this->faker->randomElement($firstNames);
        $email = $this->faker->unique()->userName . '@gmail.com';
        return [
            'name' => $name,
            'email' => $email,
        ];
    }
}
