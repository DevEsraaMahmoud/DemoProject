<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public $fillable = [
        'name'
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }
}
