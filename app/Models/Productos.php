<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Productos extends Model
{
    use HasFactory;
    
    protected $table = 'producto';

    protected $fillable = 
    [
        'Name',
        'description',
        'price',
        'category_id',
        'marca_id',
        'subcategory_id',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);        
    }

}
