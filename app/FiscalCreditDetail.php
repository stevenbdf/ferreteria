<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiscalCreditDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fiscal_credit_id', 'product_id', 'quantity', 'sale_price', 'iva'
    ];

    protected $table = 'fiscal_credit_details';

    public function fiscalCredit()
    {
        return $this->belongsTo('App\FiscalCredit');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
