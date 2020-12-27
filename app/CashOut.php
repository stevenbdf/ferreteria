<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashOut extends Model
{

    protected $table = 'cash_out';

    protected $fillable = [
        'user_id', 'total_sales'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
