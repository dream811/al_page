<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AgentLevel extends Model
{
    use HasFactory;
    protected $table = 'tbl_agent_level';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'ename',
        'key',
        'zero_win',
    ];

    
    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->format('Y-m-d H:i:s');
    // }

    // public function getUpdatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->format('Y-m-d H:i:s');
    // }
}
