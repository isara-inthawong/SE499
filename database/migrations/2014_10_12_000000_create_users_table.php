<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Crypt;

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
            $table->bigIncrements('user_id');
            $table->string('student_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('major_id')->nullable();
            $table->unsignedBigInteger('role_id')->default(2);
            $table->string('user_image')->default('profile-default.jpg');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('users')->insert(
            [
                [
                    'student_id' => '6001260052',
                    'first_name' => 'Admin',
                    'last_name' => 'lastNameAdmin',
                    'tel' => '0864351412',
                    'email' => 'bell7672@gmail.com',
                    'password' => Hash::make('qqqqwwww'), //password is ”qqqqwwww”
                    // 'password' => Crypt::encryptString('qqqqwwww'), //password is ”qqqqwwww”
                    'major_id' => 1,
                    'role_id' => 1,
                    'user_image' => 'profile-default.jpg',
                ],
                [
                    'student_id' => '5901260052',
                    'first_name' => 'FirstNameMember',
                    'last_name' => 'LastNameMember',
                    'tel' => '0864351412',
                    'email' => 'member@member.com',
                    'password' => Hash::make('qqqqwwww'), //password is ”qqqqwwww”
                    // 'password' => Crypt::encryptString('qqqqwwww'), //password is ”qqqqwwww”
                    'major_id' => 1,
                    'role_id' => 2,
                    'user_image' => 'profile-default.jpg',
                ]
            ]
        );
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
