<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroDetalle extends Model
{
    use HasFactory;
    protected $table ="LibroDetalles";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'titulo',
        'autor',
        'añopublicacion',
        'editorial',
        'existencia',
        'portada',
        'pdf'
    ];

    public function ejemplare(){
        return $this->hasMany(Ejemplare::class);
    }  
    

}
