<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers',function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('activation_code', 60)->nullable();
            $table->integer('country_id')->unsigned();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('company')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->boolean('is_subscribed')->default(0);
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::drop('customers');
    }
}
