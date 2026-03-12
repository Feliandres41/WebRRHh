<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'collaborator_id',
        'type',
        'start_date',
        'end_date',
        'salary',
        'terminated_at',
        'termination_reason'
    ];

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class);
    }
}