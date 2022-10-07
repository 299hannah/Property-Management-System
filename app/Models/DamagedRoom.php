<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamagedRoom extends Model
{
    protected $table = 'damagedrooms';
    protected $primarykey = 'id';
    protected $fillable = ['houseno','floor','description','post_id'];
}
