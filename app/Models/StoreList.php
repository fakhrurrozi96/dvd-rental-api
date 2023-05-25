<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreList extends Model
{
    protected $table ='store_list';
    protected $primaryKey = 'store_id';
    public $timestamps = false;
}