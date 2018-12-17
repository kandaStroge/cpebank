<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Loan extends BaseModel
{

    public $timestamps = false;
    protected $table = 'loan';
    protected $fillable = ['id','amount','interest_rate','time','payback','user_id','asset_id'];

}
