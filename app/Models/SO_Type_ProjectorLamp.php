<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SO_Type_ProjectorLamp extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
}
