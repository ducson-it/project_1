<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use  App\Models\User;

use  App\Models\Facility;

use  App\Models\Shift;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user_doctor' => $this->faker->unique()->User::where('role', '=', 2)->random()->pluck('id'),
            // user_id nhes. Tránh quá nhiều tên id khóa ngoại nhé
            //vang ạ
            'id_user_doctor' => $this->faker->Facility::where('role', '=', 2)->random()->pluck('id'),
            'id_user_doctor' => $this->faker->User::where('role', '=', 2)->random()->pluck('id'),
            'level' => $this->faker->randomElement(['giáo sư', 'tiến sĩ', 'thạc sĩ'])
        //em convention sai thì phải. cho e hỏi ý tưởng của e ntn có đúng không và cách a thường làm ntn ạ
        // Thật ra factory đơn giản chỉ là tạo dữu liệu ảo. Mình chỉ cần tạo seeder 10 dữ liệu là đủ rồi nhé.
        // Factory dành cho dự án lớn trên 15 dev để chạy dữ liệu ảo, test lỗi không thêm thủ công bằng crud đỡ mất thời gian á
        // e hiểu mà, nhưng vì khi em random thì khóa ngoại nó lấy dữ liệu lung tung bèng lên. em truy vấn hơi lằng nhằng
        // nên em muốn lấy khóa ngoại của nó ak. nếu cách làm của em không ổn thì anh thử làm 1 ví dụ Doctor này cho em xem cách
        // thường ngày anh làm được không ạ.
        //
        ];
    }
}
