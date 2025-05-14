<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class VendorAssignment extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'repair_request_id',
        'vendor_id',
        'assignment_by_id',
        'note',
        'action_status_id',
    ];

    protected $casts = [];

    public function repair()
    {
        return $this->belongsTo(RepairRequest::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function assignmentBy()
    {
        return $this->belongsTo(User::class, 'assignment_by_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(ActionStatus::class);
    }
}
