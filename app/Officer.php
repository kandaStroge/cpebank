<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    protected $table = 'officer';
    protected $primaryKey = 'id';
    public $timestamps = false;



    public function user(){
        return $this->hasOne('App\User');
    }
}
