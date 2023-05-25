<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $table = 'rental';
    protected $primaryKey = 'rental_id';
    public $timestamps = false;

    protected $fillable = [
        'rental_date',
        'inventory_id',
        'customer_id',
        'return_date',
        'staff_id',
        'last_update',
    ];
}