<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Sanctum\HasApiTokens;


class Agent extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'agent';

    public function categories()
    {
        return $this->belongsToMany('App\Models\category','category_agents')->withTimestamps();
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'status',
        'post_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'password_confirmation',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->belongsToMany(post::class,'posts')->withTimestamps();
    } 
    
    public function profagent()
    {
        return $this->hasOne(Profile::class, 'agent_id');
    }
   

}

