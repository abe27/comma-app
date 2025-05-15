<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Device extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'device_type_id',
        'name',
        'asset_tag',
        'serial_number',
        'brand',
        'model',
        'status',
        'is_active',
    ];

    protected $casts = [
        'status' => \App\Enums\DeviceStatus::class,
        'is_active' => 'boolean',
    ];

    public function getFullNameAttribute()
    {
        return $this->brand . "(" . $this->asset_tag . ")";
    }

    public function deviceType()
    {
        return $this->belongsTo(DeviceType::class);
    }
}
