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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            /* $table->string('email'); */
            $table->string('slug');
            $table->longText('contenido')->nullable();

            $table->enum('status', [1,2])->default(1);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('categoria_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete("cascade");
            //$table->bigInteger('categoria_id')->unsigned();
           // $table->bigInteger('user_id')->unsigned();

            //$table->foreign('categoria_id')->references('id')->on('Categorias')->onDelete("cascade");
            //$table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");

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
        Schema::dropIfExists('posts');
    }
};
