<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'catalog_name',
    ];
    
    public function items(){
        return $this->hasMany(Item::class, 'catalogs_id','id');
    }
}
