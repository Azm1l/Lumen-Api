<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelMasterLocation extends Model
{
    public $timestamps = true;
    protected $table = 'tbl_master_location';
    protected $fillable = ['location_name', 'location_address', 'location_latitude', 'location_longitude'];
    protected $primaryKey = 'location_id';
}
