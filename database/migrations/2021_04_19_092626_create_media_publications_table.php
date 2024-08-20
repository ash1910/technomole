<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaPublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_publications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en')->nullable();
            $table->string('title_bn')->nullable();
            $table->string('image')->nullable();
            $table->date('date')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_bn')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('media_publications');
    }
}
