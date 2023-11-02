<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelMasterLocation extends Model
{
    public $timestamps = true;
    protected $table = 'locations';
    protected $fillable = ['name', 'address', 'latitude', 'longitude', 'radius'];
    protected $primaryKey = 'id';
}
