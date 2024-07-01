<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('vin');
            $table->string('model', 30);
            $table->string('color', 30)->nullable();
            $table->unsignedSmallInteger('year')->nullable();
            $table->boolean('is_sold')->default(false);
            $table->softDeletes();
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
                //->onDelete('cascade');
                //->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
