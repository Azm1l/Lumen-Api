<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelCheckOut extends Model
{
    public $timestamps = true;
    protected $table = 'tbl_checkout';
    protected $primaryKey = 'id';
}
