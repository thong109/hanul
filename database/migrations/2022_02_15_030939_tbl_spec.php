<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSpec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_spec', function (Blueprint $table) {
            $table->bigIncrements('spec_id');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('youtube');
            $table->string('instagram');
            $table->string('zalo');
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
        Schema::dropIfExists('tbl_spec');
    }
}
