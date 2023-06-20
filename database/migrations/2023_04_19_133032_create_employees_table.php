<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('address')->default('null');
            $table->string('image')->default('null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};

// composer create-project laravel/laravel:^9.0 example-app (example-app = ProjectName)
// php artisan make:migration create_employees_table คำสั่งสร้างตารางข้อมูล
// php artisan migrate คำสั่งส่งข้อมูลตารางที่สร้างไปฐานข้อมูล
// php artisan make:controller EmployeeController คำสั่งสร้าง Controller
// php artisan make:model Employee คำสั่งสร้าง Model
// php artisan vendor:publish --tag=laravel-pagination รันคำสั่งนี้เมื่อมีการใช้งาน Pagination
