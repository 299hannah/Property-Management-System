<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Room extends Model
{
    use  Notifiable;
    protected $table = 'rooms';
    protected $primarykey = 'id';
    protected $fillable = ['houseno','floor','description','post_id'];
    public function getRouteKeyName(){
        return 'slug';
    }
    // public function profile(){
    //     return $this->hasOne(Profile::class, 'room_id');
    // }
    public function transactions()
    {
        return $this->belongsToMany('App\Models\Transactions','houseno')->withTimestamps();
    }
}
