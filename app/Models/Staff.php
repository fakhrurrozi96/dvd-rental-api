<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table ='staff';
    protected $primaryKey = 'staff_id';
    public $timestamps=false;

    protected $fillable = [
        'first_name',
        'last_name',
        'address_id',
        'email',
        'store_id',
        'active',
        'username',
        'password',
        'last_update',
        'picture',
    ];
}