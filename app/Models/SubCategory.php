<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'subcategory';
    protected $fillable = [
        'Name',
        'description',
        'color',
        'category_id',
    ];
    public function Category(){
        return $this->belongsTo(Category::class);
    }
}
