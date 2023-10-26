<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelTrxDelivery extends Model
{
    public $timestamps = true;
    protected $table = 'trx_delivery';

    protected $primaryKey = 'econnote_number';
    protected $fillable = ['delivery_date'];
    const CREATED_AT = 'create_datetime';
    const UPDATED_AT = 'update_datetime';
}
