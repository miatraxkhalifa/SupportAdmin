<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function Task()
    {
        return $this->hasOne(Task::class, 'id', 'tasks_id');
    }

    public function OutofScope()
    {
        return $this->hasOne(OutofScope::class, 'id', 'quote_id'); //related table , foreign key from related table, local key
    }
}
