<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'catalogs_id',
        'description',
        'price',
        'images'
    ];

    protected $with = ['catalog'];

    public function catalog(){
        return $this->belongsTo(Catalog::class,'catalogs_id','id');
    }
}
