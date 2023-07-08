<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AgentPTransaction extends Model
{
    use HasFactory;
    protected $table = 'tbl_agent_point_transactions';
    // public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'agent_id',
        'transaction_id',
        'amount',
        'before',
        'vendor',
        'game',
        'game_id',
        'game_type',
        'created_at',
        'updated_at',
        'is_bonus',
        'is_free_game',
        'is_jackpot',
        'is_promo',
        'match_id',
        'original_id',
        'original_at',
        'processed_at',
        'provider',
        'referer_id',
        'round_id',
        'state',
        'status',
        'timestamp',
        'detail',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }
    
    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function gameType()
    {
        return $this->belongsTo(GameType::class, 'game_type', 'id');
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
