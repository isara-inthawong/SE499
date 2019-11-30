<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateMoonJamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moon_james', function (Blueprint $table) {
            $table->bigIncrements('#');
            $table->string('sticker_id');
            $table->integer('sticker_grouup');
            $table->integer('sticker_version')->nullable();
            $table->timestamps();
        });

        DB::table('moon_james')->insert(
            [
                ['sticker_id' => '1', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '2', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '3', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '4', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '5', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '6', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '7', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '8', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '9', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '10', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '11', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '12', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '13', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '14', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '15', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '16', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '17', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '21', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '100', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '101', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '102', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '103', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '104', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '105', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '106', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '107', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '108', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '109', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '110', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '111', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '112', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '113', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '114', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '115', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '116', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '117', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '118', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '119', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '120', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '121', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '122', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '123', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '124', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '125', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '126', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '127', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '128', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '129', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '130', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '131', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '132', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '133', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '134', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '135', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '136', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '137', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '138', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '139', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '401', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '402', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '403', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '404', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '405', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '406', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '407', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '408', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '409', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '410', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '411', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '412', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '413', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '414', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '415', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '416', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '417', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '418', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '419', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '420', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '421', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '422', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '423', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '424', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '425', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '426', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '427', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '428', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '429', 'sticker_grouup' => '1', 'sticker_version' => '100'],
                ['sticker_id' => '430', 'sticker_grouup' => '1', 'sticker_version' => '100'],
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
        Schema::dropIfExists('moon_james');
    }
}
