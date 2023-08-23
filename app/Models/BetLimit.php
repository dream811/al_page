<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BetLimit extends Model
{
    use HasFactory;
    protected $table = 'tbl_limits';
    // public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'agent_id',
        'type',
        'vendor_key',
        'game_key',
        'game_info',
        'max_bet',
        'created_at',
        'updated_at'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }
    
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_key', 'vendor_key');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_key', 'game_key');
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
