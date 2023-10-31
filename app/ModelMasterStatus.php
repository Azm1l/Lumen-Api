<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelMasterStatus extends Model
{
    public $timestamps = true;
    protected $table = 'tbl_master_connot_status';
    protected $primaryKey = 'mst_status_id';
}
