<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function sku()
    {
        return $this->belongsTo('App\Models\Sku');
    }
}
