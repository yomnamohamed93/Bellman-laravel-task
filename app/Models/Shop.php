<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array(
        'name',
        'email',
        'website',
        'logo',
        'created_by',
        'updated_by'
    );

    public function getLogoPathAttribute()
    {
        return asset('storage/shops/logos/'.$this->logo);
    }
    public function getFormattedCreationDate()
    {
        return date("d/m/Y", strtotime($this->created_at));
    }
}
