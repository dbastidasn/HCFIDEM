<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamo';
    protected $fillable = ['monto', 'monto_pendiente', 'tipo_pago', 'cuotas', 'numero_cuota', 'cuotas_pendientes', 'interes', 'monto_total', 'valor_cuota', 'fecha_inicial', 'fecha_final', 'observacion', 'activo', 'usuario_id', 'cliente_id', 'latitud','longitud'];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'id');
    }
}
