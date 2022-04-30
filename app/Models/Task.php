<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function TaskType()
    {
        return $this->belongsTo(TaskType::class, 'tasks_id', 'id');
    }

    public function Owner()
    {
        return $this->belongsTo(User::class, 'owner', 'id');
    }

    public function Admin()
    {
        return $this->belongsTo(User::class, 'admin', 'id');
    }

    public function OnsiteTech()
    {
        return $this->hasOne(OnsiteTech::class, 'tasks_id', 'id');
    }

    public function OutofScope()
    {
        return $this->hasOne(OutofScope::class, 'tasks_id', 'id'); //related table, foreign key from related table, local key
    }

    public function InvoiceRequest()
    {
        return $this->hasOne(InvoiceRequest::class, 'tasks_id', 'id');
    }

    public function OnsiteTechScoping()
    {
        return $this->hasOne(OnsiteTechScoping::class, 'tasks_id', 'id');
    }

    public function ItemInquiry()
    {
        return $this->hasOne(ItemInquiry::class, 'tasks_id', 'id');
    }

    public function WarrantyRepair()
    {
        return $this->hasOne(WarrantyRepair::class, 'tasks_id', 'id');
    }

    public function HardwareReturn()
    {
        return $this->hasOne(HardwareReturn::class, 'tasks_id', 'id');
    }

    public function SO()
    {
        return $this->hasOne(SO::class, 'tasks_id', 'id');
    }
}
