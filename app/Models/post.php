<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\Models\category','category_posts')->withTimestamps();
    }

    public function admins()
    {
        return $this->belongsToMany('App\Models\admin','post_id')->withTimestamps();
    }
 
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function agents()
    {
        return $this->belongsToMany('App\Models\agent','post_id')->withTimestamps();
    }

}
