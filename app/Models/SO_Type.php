<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SO_Type extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function SO_Type_MP()
    {
        return $this->hasOne(SO_Type_MP::class, 'so_id', 'id'); //related table , foreign key from related table, local key
    }

    public function SO_Type_Network()
    {
        return $this->hasOne(SO_Type_Network::class, 'so_id', 'id'); //related table , foreign key from related table, local key
    }
}
