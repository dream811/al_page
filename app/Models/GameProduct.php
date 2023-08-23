<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GameProduct extends Model
{
    use HasFactory;
    protected $table = 'tbl_game_products';
    // public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_key',
        'vendor_key',
        'game_type',
        'name',
        'name_ko',
        'product_code',
        'created_at',
        'updated_at'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }
    
    public function vcompany()
    {
        return $this->belongsTo(VideoCompany::class, 'agent_id', 'id');
    }

    public function agentStatus()
    {
        return $this->hasOne(VideoCompany::class, 'id', 'id');
    }

    public function gameStatus()
    {
        return $this->hasOne(AgentCompany::class, 'game_id', 'id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
