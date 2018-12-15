<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function officers(){
        return $this->hasOne('App\Officer', 'user_id');
    }


}
