<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RepairStatus extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'repair_request_id',
        'seq',
        'assigned_to',
        'comment',
        'action_status_id',
    ];

    protected $casts = [];

    public function repair()
    {
        return $this->belongsTo(RepairRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

    public function repairStatus()
    {
        return $this->belongsTo(RepairStatus::class);
    }
}
