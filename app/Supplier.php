<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'address', 'nit', 'registry_number'
    ];

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
