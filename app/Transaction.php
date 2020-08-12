<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'office_id', 'date', 'type', 'description', 'quantity', 'stock', 'amount', 'cost'
    ];

    public function getAmountAttribute()
    {
        return number_format($this->attributes['amount'], 2);
    }

    public function getCostAttribute()
    {
        return number_format($this->attributes['cost'], 2);
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function office()
    {
        return $this->belongsTo('App\Office');
    }
}
