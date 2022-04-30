<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HardwareReturn extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function Task()
    {
        return $this->hasOne(Task::class, 'id', 'tasks_id');
    }

    public function SO()
    {
        return $this->hasOne(SO::class, 'id', 'so_id');
    }

    public function HardwareType()
    {
        return $this->hasManyThrough(SO_Type::class, SO::class, 'id', 'id', 'so_id', 'type'); //final table , Intermediate table, FK on Intermediate table,  FK on final table, local key on this table, local key on Intermediate table
    }

    public function Approver()
    {
        return $this->hasManyThrough(User::class, SO::class, 'approver', 'id', 'so_id', 'approver');
        //  return $this->belongsTo(User::class, 'approver', 'id');
    }
}
