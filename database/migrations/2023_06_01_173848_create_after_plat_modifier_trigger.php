<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER after_plat_update
        AFTER UPDATE ON plats
        FOR EACH ROW
        BEGIN
            INSERT INTO plat_modifier
            VALUES (OLD.id, OLD.nom, OLD.prix, OLD.description, OLD.photo,OLD.created_at,OLD.updated_at);
        END
    ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS after_plat_update');
    }
};
