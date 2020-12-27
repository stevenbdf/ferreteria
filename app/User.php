<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'username', 'password', 'type', 'phone', 'dui', 'nit', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

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

    public function cashOuts()
    {
        return $this->hasMany('App\CashOut');
    }
}
