<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ActionStatus extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'name',
        'description',
        'color',
        'is_active',
    ];

    protected $casts = [
        'color' => \App\Enums\Colors::class,
        'is_active' => 'boolean'
    ];
}
