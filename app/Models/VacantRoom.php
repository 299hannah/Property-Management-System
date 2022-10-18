<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class VacantRoom extends Model
{
    use  Notifiable;
    protected $table = 'vacantrooms';
    protected $primarykey = 'id';
    protected $fillable = ['houseno','floor','post_id'];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function profile(){
        return $this->hasOne(Profile::class, 'vacantroom_id');
    }
}
