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
        'job_no',
        'name',
        'description',
        'location',
        'action_status_id',
    ];

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

    public function actionStatus()
    {
        return $this->belongsTo(ActionStatus::class);
    }
}
