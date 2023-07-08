<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Vendor extends Model
{
    use HasFactory;
    protected $table = 'tbl_vendors';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'vendor_key',
        'name',
        'maintance',
        'sort',
        'zero_win',
        'category',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }

    public function games()
    {
        return $this->hasMany(Game::class, 'receiver_id', 'id');
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
