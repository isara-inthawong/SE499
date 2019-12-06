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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('major')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['member', 'admin'])->default('member');
            $table->string('user_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            [
                [
                    'first_name' => 'FAdmin',
                    'last_name' => 'LAdmin',
                    'email' => 'admin@admin.com',
                    'major' => 'SE',
                    'tel' => '0864351412',
                    'password' => Hash::make('qqqqwwww'), //password is ”qqqqwwww”
                    // 'password' => Crypt::encryptString('qqqqwwww'), //password is ”qqqqwwww”
                    'role' => 'admin',
                    'user_image' => 'profile-default.jpg',
                ],
                [
                    'first_name' => 'FMember',
                    'last_name' => 'LMember',
                    'email' => 'member@member.com',
                    'major' => 'SE',
                    'tel' => '0864351412',
                    'password' => Hash::make('qqqqwwww'), //password is ”qqqqwwww”
                    // 'password' => Crypt::encryptString('qqqqwwww'), //password is ”qqqqwwww”
                    'role' => 'member',
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
