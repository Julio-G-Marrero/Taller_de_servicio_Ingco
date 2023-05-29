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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('correo_cliente');
            $table->string('tel');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('giro_comercial');
            $table->string('folio_compra');
            $table->string('comprobante');
            $table->date('fecha_adquisicion');
            $table->string('codigo_interno');
            $table->string('numero_serie');
            $table->text('accesorios');
            $table->string('uso_equipo');
            $table->text('descripcion');        
            $table->text('autorizada');        
            $table->string('comprobanteCobro');
            $table->string('comprobantePago');
            $table->string('estadoCobro');

            $table->foreignId('estatu_id')->constrained()->onDelete('cascade')->default(1);   
            $table->foreignId('tienda_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            
            $table->dropForeign('orders_tienda_id_foreign');
            $table->dropForeign('orders_user_id_foreign');
            $table->dropForeign('orders_estatu_id_foreign');
            $table->dropColumn(['nombre','apellidos','correo_cliente','tel','direccion','ciudad','estado','giro_comercial','folio_compra','comprobante','fecha_adquisicion','codigo_interno','numero_serie','accesorios','uso_equipo','descripcion','autorizada','comprobanteCobro','comprobantePago','estadoCobro']);
        });
    }
};
