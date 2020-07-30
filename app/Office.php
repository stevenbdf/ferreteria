<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'address', 'invoice_correlative', 'fiscal_credit_correlative', 'registry_number', 'nit'
    ];

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
