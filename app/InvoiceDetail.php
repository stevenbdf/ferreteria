<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invoice_id', 'product_id', 'quantity', 'sale_price'
    ];

    protected $table = 'invoice_details';

    public function invoice()
    {
        return $this->belongsTo('App\Invoice');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
