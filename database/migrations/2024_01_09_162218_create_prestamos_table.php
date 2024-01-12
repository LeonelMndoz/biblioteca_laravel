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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->date('fechaprestamo');
            $table->date('fechadevolucion');

            // LLAVE FORANEA PARA EJEMPLARES
            $table->unsignedBigInteger('ejemplare_id');
            $table->foreign('ejemplare_id')->references('id')->on('ejemplares')->onDelete('cascade')->onUpdate('cascade');

            // LLAVE FORANEA USUARIOS
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('prestamos', function (Blueprint $table) {
            $table->dropForeign(['ejemplare_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('prestamos');
    }
};

