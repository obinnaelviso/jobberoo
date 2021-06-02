<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('salary')->nullable();
            $table->boolean('is_negotiable')->nullable();
            $table->string('company');
            $table->string('location');
            $table->foreignId('category_id')->constrained()->onDelete("cascade");
            $table->foreignId('type_id')->constrained()->onDelete("cascade");
            $table->foreignId('user_id')->constrained()->onDelete("cascade");
            $table->foreignId('status_id')->constrained();
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
        Schema::dropIfExists('jobs');
    }
}
