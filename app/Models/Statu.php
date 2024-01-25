<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    use HasFactory;
    protected $table = 'Status';
    protected $primaryKey = 'id';
    protected $fillable = [
        "id",
        "dispo"
    ] ;

    public function Ejemplar()
    {
        return $this->hasMany(Ejemplare::class);
    }
}
