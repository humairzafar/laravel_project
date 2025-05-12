<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customertable extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ="customerstable";
    protected $primaryKey ="customer_id";
    public $timestamps = false;
}
