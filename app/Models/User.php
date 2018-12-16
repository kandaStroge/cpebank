<?php
namespace App\Models;
class User extends BaseModel
{
    protected $table = 'user';

    public function customers()
    {
        return $this->hasMany('App\Models\Customer','user_id');
    }
}