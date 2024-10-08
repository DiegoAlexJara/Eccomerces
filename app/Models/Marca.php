<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{

    use HasFactory;
    protected $table = 'marcas';

    protected $fillable = [
        'name',
        'description',
        'color',
    ];
    public function Productos()
    {

        return $this->hasMany(Productos::class);
        
    }

}
