<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemInquiry extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function Task()
    {
        return $this->belongsTo(Task::class, 'id', 'tasks_id');
    }
}
