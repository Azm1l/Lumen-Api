<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelCheckin extends Model
{
    public $timestamps = true;
    protected $table = 'checkin';
    protected $primaryKey = 'id';
}
