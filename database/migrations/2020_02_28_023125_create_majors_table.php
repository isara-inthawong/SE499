<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majors', function (Blueprint $table) {
            $table->bigIncrements('major_id');
            $table->string('major');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('majors')->insert([
            ['major' => 'วิศวกรรมซอฟต์แวร์'], ['major' => 'วิทยาการคอมพิวเตอร์'], ['major' => 'วิทยาศาสตร์และเทคโนโลยีอาหาร']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('majors');
    }
}
