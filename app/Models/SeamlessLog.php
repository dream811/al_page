<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SeamlessLog extends Model
{
    use HasFactory;
    protected $table = 'tbl_seamless_log';
    // public $timestamps = false;
    protected $primaryKey = 'idx';
    protected $fillable = [
        'company_type',
        'data_type',
        'data',
        'created_at',
        'updated_at'
    ];

    // public function company()
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
