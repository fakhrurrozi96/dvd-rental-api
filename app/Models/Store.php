<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';
    protected $primaryKey = 'store_id';
    public $timestamps = false;

    protected $fillable = [
        'manager_staff_id',
        'address_id',
        'last_update',
    ];
}