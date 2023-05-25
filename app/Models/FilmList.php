<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilmList extends Model
{
    protected $table ='film_list';
    protected $primaryKey ='fid';
    public $timestamps = false;
}