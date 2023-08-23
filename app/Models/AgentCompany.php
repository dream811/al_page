<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AgentCompany extends Model
{
    use HasFactory;
    protected $table = 'tbl_agent_company';
    // public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'agent_id',
        'company_id',
        'vendor_id',
        'game_id',
        'status',
        'type',
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
