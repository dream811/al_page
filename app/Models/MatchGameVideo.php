<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MatchGameVideo extends Model
{
    use HasFactory;
    protected $table = 'tbl_match_game_video';
    // public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'video_id',
        'game_id',
        'status',
        // 'created_at',
        // 'updated_at'
    ];

    public function video()
    {
        return $this->belongsTo(VideoCompany::class, 'video_id', 'id');
    }
    
    public function game()
    {
        return $this->belongsTo(GameCompany::class, 'game_id', 'id');
    }
    
    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->format('Y-m-d H:i:s');
    // }

    // public function getUpdatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->format('Y-m-d H:i:s');
    // }
}
