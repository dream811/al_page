<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agent extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'agents';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'level_id',
        'upper_id',
        'tree_list',
        'account',
        'account_number',
        'account_holder',
        'nickname',
        'phone',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'balance',
        'bank_name',
        'alert_on_balance',
        'cash',
        'commission_rate',
        'detail_callback',
        'token',
        'callback_token',
        'callback_url',
        'detail_callback_url',
        'domain_line',
        'gbn',
        'login_at',
        'login_ip',
        'provider_oct',
        'provider_pg',
        'request_balance',
        'state',
        'transfer_wallet'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function upperAgent()
    {
        return $this->belongsTo(Agent::class, 'upper_id', 'id');
    }

    public function level()
    {
        return $this->belongsTo(AgentLevel::class, 'level_id', 'id');
    }
}
