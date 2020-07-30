<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'full_name', 'email', 'phone', 'address', 'dui', 'nit',  'birthdate', 'registry_number', 'business_item'
    ];

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }

    public function fiscalCredits()
    {
        return $this->hasMany('App\FiscalCredit');
    }
}
