<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('activity_id');
            $table->string('activity_name')->nullable();
            $table->string('activity_address')->nullable();
            $table->date('activity_date')->nullable();
            $table->time('activity_time')->nullable();
            $table->date('activity_todate')->nullable();
            $table->time('activity_totime')->nullable();
            $table->integer('hour')->nullable();
            $table->boolean('assessment_status')->default(0);
            $table->string('activity_detail')->nullable();
            $table->string('activity_image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
