<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_packages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->float('disk');
            $table->float('traffic');
            $table->integer('domain');
            $table->float('discount')->default(0);
            $table->float('price_npr');
            $table->float('price_usd');
            $table->boolean('is_published')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('restrict');
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
        Schema::drop('web_packages');
    }
}
