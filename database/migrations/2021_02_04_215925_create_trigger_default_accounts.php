<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerDefaultAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        CREATE TRIGGER tr_User_Default_Account AFTER INSERT ON `users` FOR EACH ROW
            BEGIN
                INSERT INTO cuentas (`nombre`, `tipo`, `saldo`, `propietario_id`, `created_at`,`updated_at`) 
                VALUES ('Efectivo', 'cash', 0, new.id, now(), now());
            END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_User_Default_Account');
    }
}
