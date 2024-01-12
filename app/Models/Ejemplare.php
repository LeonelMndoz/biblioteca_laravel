<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejemplare extends Model
{
    use HasFactory;
    protected $table = "Ejemplares";
    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'clave',
        'statu_id',
        'librodetalle_id'
    ];

    public function status(){
        return $this->belongsTo(Statu::class);
    }

    public function prestamo(){
        return $this->belongsTo(Prestamo::class);
    }

    public function librodetalle(){
        return $this->belongsTo(LibroDetalle::class);
    }  

}
