<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
    protected $table="Prestamos";
    protected $primaryKey= "id";
    protected $fillable = [
        'id',
        'fechaprestamo',
        'fechadevolucion',
        'user_id',
        'ejemplare_id',

    ];

    //RELACIONES
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ejemplare(){
        return $this->hasMany(Ejemplare::class);
    }


}
