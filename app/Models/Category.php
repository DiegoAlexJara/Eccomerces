<?php

namespace App\Models;


use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'name',
        'description',
        'color',
    ];
    public function subcategorias()
    {

        return $this->hasMany(SubCategory::class);

    }
    public function Productos()
    {

        return $this->hasMany(Productos::class);
        
    }
}
