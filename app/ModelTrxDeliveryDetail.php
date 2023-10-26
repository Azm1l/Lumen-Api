<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelTrxDeliveryDetail extends Model
{
    public $timestamps = true;
    protected $table = 'trx_delivery_detil';
    protected $fillable = ['delivery_type_id'];
    protected $primaryKey = 'trx_delivery_detil_id';
}
