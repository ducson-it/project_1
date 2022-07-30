<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatefacilitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }
// Sai chính tả rồi em kvakaaa. e thaays roi ak kho vai
// Em sửa trong file thôi, đừng sửa file nhé, quy tắc cứng của laravel rồi
// vaang aj. the em phai create lai migrate a.
//  Em sửa lại tên file như cũ nhé, đặt sai tên table cũng được :)). Migrate cẩn thận .khi  khởi tạo là oke thôi. vaang ạ
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facilites');
    }
}
