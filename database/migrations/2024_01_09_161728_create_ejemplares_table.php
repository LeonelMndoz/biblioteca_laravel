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
        Schema::create('ejemplares', function (Blueprint $table) {
            $table->id();
        
            $table->string('clave');

            //LLAVE FORANEA PARA STATUS
            $table->unsignedBigInteger('statu_id');
            $table->foreign('statu_id')
            ->references('id')
            ->on('status')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            //Llave foranea para id de libro
            $table->unsignedBigInteger('librodetalle_id');
            $table->foreign('librodetalle_id')
            ->references('id')
            ->on('librodetalles')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::table('ejemplares', function (Blueprint $table) {
            $table->dropForeign(['statu_id']); 
        });
        Schema::dropIfExists('ejemplares');
        
        Schema::table('librodetalles', function (Blueprint $table) {
            $table->dropForeign(['librodetalle_id']); 
        });
        Schema::dropIfExists('librodetalles');
    }
};
