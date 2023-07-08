<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RUser extends Model
{
    use HasFactory;
    protected $table = 'tbl_users';
    // public $timestamps = false;
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'uuid',
        'agent_id',
        'account',
        'nickname',
        'password',
        'token',
        'balance',
        'login_at',
        'login_ip',
        'created_at',
        'updated_at'
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
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
