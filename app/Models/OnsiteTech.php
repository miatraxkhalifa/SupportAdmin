<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OnsiteTech extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function Approver()
    {
        return $this->belongsTo(User::class, 'approver', 'id');
    }
}
