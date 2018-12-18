<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
