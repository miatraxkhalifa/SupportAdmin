<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutofScope extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function Task()
    {
        return $this->hasOne(Task::class, 'id', 'tasks_id');
    }

    public function InvoiceRequest()
    {
        return $this->belongsTo(InvoiceRequest::class, 'id', 'quote_id');  //related table ,  local key, foreign key from related table,
    }
}
