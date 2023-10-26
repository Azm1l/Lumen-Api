<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelConsignee extends Model
{
    public $timestamps = true;
    protected $table = 'consignee';

    protected $primaryKey = 'consignee_id';
    protected $fillable = ['consignee_name'];
    const CREATED_AT = 'create_datetime';
    const UPDATED_AT = 'update_datetime';
}
