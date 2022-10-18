<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';
    protected $primarykey = 'id';
    protected $fillable = ['name','houseno','billingfor','expectedamount','amountpaid','balance','datepaid','room_id'];
}
