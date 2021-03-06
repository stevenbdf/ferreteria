<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'department_id', 'supplier_id', 'description', 'image_path', 'base_cost', 'profit', 'price'
    ];

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
