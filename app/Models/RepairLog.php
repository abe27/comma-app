<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RepairLog extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'repair_request_id',
        'updated_by_id',
        'old_status_id',
        'new_status_id',
        'note',
    ];

    protected $casts = [];

    public function repair()
    {
        return $this->belongsTo(RepairRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'updated_by_id', 'id');
    }

    public function oldStatus()
    {
        return $this->belongsTo(ActionStatus::class, 'old_status_id', 'id');
    }

    public function newStatus()
    {
        return $this->belongsTo(ActionStatus::class, 'new_status_id', 'id');
    }
}
