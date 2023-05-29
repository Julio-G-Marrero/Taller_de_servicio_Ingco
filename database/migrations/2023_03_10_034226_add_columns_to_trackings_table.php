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
        Schema::table('trackings', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained()->onDelete('cascade');   
            $table->foreignId('user_id')->constrained()->onDelete('cascade');   
            $table->string('descripcion');   
            $table->string('evidencia');   
            $table->integer('costo');   

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trackings', function (Blueprint $table) {
            $table->dropForeign('trackings_order_id_foreign');
            $table->dropForeign('trackings_user_id_foreign');

            // $table->dropColumn(['descripcion','evidencia','costo']);        
            $table->dropColumn(['descripcion','evidencia','costo','order_id','user_id']);        
        });
    }
};
