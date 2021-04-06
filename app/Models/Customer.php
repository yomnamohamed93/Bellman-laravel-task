<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use  SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'shop_id',
        'created_by',
        'updated_by'
    ];
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    /**
     * @param $value
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function getFormattedCreationDate()
    {
        return date("d/m/Y", strtotime($this->created_at));
    }
}
