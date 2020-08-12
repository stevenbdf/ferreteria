<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'address', 'nit', 'registry_number'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
