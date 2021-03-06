<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'status', 'office_id', 'customer_id', 'user_id', 'date'
    ];

    public $incrementing = false;

    protected $appends = ['total'];

    public function office()
    {
        return $this->belongsTo('App\Office');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function invoiceDetails()
    {
        return $this->hasMany('App\InvoiceDetail');
    }

    public function getTotalAttribute()
    {
        return round($this->invoiceDetails->reduce(function ($carry, $invoiceDetail) {
            return $carry += $invoiceDetail->subTotal;
        }, 0), 2);
    }
}
