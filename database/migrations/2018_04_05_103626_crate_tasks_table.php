<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('nastavnik_id');
            $table->unsignedInteger('student_id')->nullable();
            $table->string('naziv_rada');
            $table->string('naziv_rada_na_engleskom');
            $table->text('zadatak_rada')->nullable();
            $table->enum('tip_studija', ['strucni', 'preddiplomski', 'diplomski'])->default('preddiplomski');
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
        Schema::dropIfExists('tasks');
    }
}
