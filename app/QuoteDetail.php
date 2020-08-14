<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteDetail extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quote_id', 'product_id', 'quantity', 'sale_price'
    ];

    protected $table = 'quote_details';

    public function quote()
    {
        return $this->belongsTo('App\Quote');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
