<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiscalCredit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'office_id', 'customer_id', 'user_id', 'date'
    ];

    public $incrementing = false;

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

    public function fiscalCreditDetails()
    {
        return $this->hasMany('App\FiscalCreditDetail');
    }
}
