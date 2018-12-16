<?php
namespace App\Models;
class Customer extends BaseModel
{
    protected $table = 'customer';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}