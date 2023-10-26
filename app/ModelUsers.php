<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelUsers extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_sys_user';
    protected $primaryKey = 'user_id';
    protected $fillable = ['username', 'password', 'user_fullname', 'email', 'role_id', 'photo', 'description', 'last_login', 'status', 'update_by', 'update_time'];
}
