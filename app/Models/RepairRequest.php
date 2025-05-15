<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RepairRequest extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'user_id',
        'device_type_id',
        'device_id',
        'assigned_to',
        'vendor_id',
        'job_date',
        'job_no',
        'name',
        'description',
        'remark',
        'attachments',
        'location',
        'action_status_id',
    ];

    protected $casts = [
        'attachments' => 'array'
    ];

    public function getAssignedAttribute()
    {
        if ($this->vendor_id) {
            return $this->vendor->name;
        } else if ($this->assigned_to) {
            return $this->assignedTo->full_name;
        }
        return '-';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deviceType()
    {
        return $this->belongsTo(DeviceType::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function actionStatus()
    {
        return $this->belongsTo(ActionStatus::class);
    }
}
