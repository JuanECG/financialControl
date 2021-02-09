<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo',2);
            $table->text('desc');
            $table->integer('cantidad');
            $table->foreignId('propietario_id')->constrained('users');
            $table->foreignId('cuenta_id')->constrained('cuentas');            
            $table->timestamp('fecha_comienzo')->useCurrent();
            $table->timestamp('fecha_fin')->useCurrent();
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
        Schema::dropIfExists('metas');
    }
}
