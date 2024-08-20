<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('experts')->nullable();
            $table->integer('partners')->nullable();
            $table->integer('it_experience')->nullable();
            $table->integer('happy_clients')->nullable();
            $table->integer('open_source_stack')->nullable();
            $table->integer('dot_net_stack')->nullable();
            $table->integer('database_stack')->nullable();
            $table->integer('frontend_stack')->nullable();
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
        Schema::dropIfExists('performances');
    }
}
