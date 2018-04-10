<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_id');
            $table->string('asset_id');
            $table->string('spare_serial');
            $table->string('spare_type');
            $table->string('spare_description');
            $table->string('spare_image');
            $table->string('spare_manufacturar_id');
            $table->string('minimum_stock');
            $table->string('current_stock');
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
        Schema::dropIfExists('spares');
    }
}
