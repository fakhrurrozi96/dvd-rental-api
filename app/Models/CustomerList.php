<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerList extends Model
{
    protected $table ='customer_list';
    protected $primaryKey ='id';
    public $timestamps = false;
}