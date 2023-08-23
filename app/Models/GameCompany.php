<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GameCompany extends Model
{
    use HasFactory;
    protected $table = 'tbl_game_companies';
    // public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'key',
        'maintenance',
        'nCompType',
        'created_at',
        'updated_at'
    ];

    // public function agent()
    // {
    //     return $this->belongsTo(User::class, 'agent_id', 'id');
    // }
    
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
