<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['member', 'admin'])->default('member');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            [
                [
                    'name' => 'Admin',
                    'email' => 'admin@admin.com',
                    'password' => Hash::make('qqqqwwww'), //password is ”qqqqwwww”
                    // 'password' => Crypt::encryptString('qqqqwwww'), //password is ”qqqqwwww”
                    'role' => 'admin',
                ],
                [
                    'name' => 'Member',
                    'email' => 'member@member.com',
                    'password' => Hash::make('qqqqwwww'), //password is ”qqqqwwww”
                    // 'password' => Crypt::encryptString('qqqqwwww'), //password is ”qqqqwwww”
                    'role' => 'member',
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
