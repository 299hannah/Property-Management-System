<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacantRoom extends Model
{
    protected $table = 'vacantrooms';
    protected $primarykey = 'id';
    protected $fillable = ['houseno','floor','post_id'];
}
