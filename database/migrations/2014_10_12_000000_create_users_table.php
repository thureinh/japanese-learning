<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile_pic');
            $table->string('firstname');
            $table->string('lastname');
            $table->date('dateofbirth');
            $table->string('phone');
            $table->text('address');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('batch_no')->nullable();
            $table->integer('roll_no')->nullable();
            $table->boolean('is_Teacher')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->unique(['batch_no', 'roll_no']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
