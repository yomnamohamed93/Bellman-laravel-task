<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use  SoftDeletes;

    protected $table = 'admins';

    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $fillable = array(
        'name',
        'email',
        'password',
        'status',
        'host_id',
        'super_admin',
        'account_type',
        'remember_token',
        'created_by',
        'updated_by'
    );

    public function getFormattedCreationDate()
    {
        return date("d/m/Y", strtotime($this->created_at));
    }

}
