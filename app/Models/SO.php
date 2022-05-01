<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SO extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function Task()
    {
        return $this->hasOne(Task::class, 'id', 'tasks_id');
    }

    public function SO_TYPE()
    {
        return $this->hasOne(SO_Type::class, 'id', 'type'); //related table , foreign key from related table, local key

    }

    public function Approver()
    {
        return $this->belongsTo(User::class, 'approver', 'id');
    }

    public function SO_Type_MP()
    {
        return $this->hasOne(SO_Type_MP::class, 'so_id', 'id');
    }

    public function SO_Type_Network()
    {
        return $this->hasOne(SO_Type_Network::class, 'so_id', 'id');
    }

    public function SO_Type_Others()
    {
        return $this->hasOne(SO_Type_Others::class, 'so_id', 'id');
    }

    public function SO_Type_Projector()
    {
        return $this->hasOne(SO_Type_Projector::class, 'so_id', 'id');
    }

    public function SO_Type_ProjectorLamp()
    {
        return $this->hasOne(SO_Type_ProjectorLamp::class, 'so_id', 'id');
    }

    public function SO_Type_Screen()
    {
        return $this->hasOne(SO_Type_Screen::class, 'so_id', 'id');
    }

    public function HardwareReturn()
    {
        return $this->belongsTo(HardwareReturn::class, 'id', 'so_id');  //related table ,  local key, foreign key from related table
    }
}
