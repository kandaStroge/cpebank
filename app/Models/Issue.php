<?php
namespace App\Models;
class Issue extends BaseModel
{
    protected $table = 'issue';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}