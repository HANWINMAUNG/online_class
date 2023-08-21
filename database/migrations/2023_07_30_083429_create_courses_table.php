<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->unsignedBigInteger('instructor_id');
            $table->decimal('price', 9, 3);
            $table->Text('cover_photo')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->longText('summary')->nullable();
            $table->timestamps();
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
           
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
