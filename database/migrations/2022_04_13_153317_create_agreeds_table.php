<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Date;
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
        Schema::create('agreeds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->unique();
            $table->string('opportunity_id');
            $table->foreignId('supervisor_id')->references('id')->on('users')->onDelete('cascade')->unique();

           
            $table->string('admin_id');
            $table->string('isReported')->default(0);
            $table->string('company_id');
            $table->foreignId('request_id')->references('id')->on('requests')->onDelete('cascade')->unique();
            $table->timestamp('agreed_at')->useCurrent();
            $table->timestamp('finished_at')->nullable();//8 weeks
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agreeds');
    }
};
