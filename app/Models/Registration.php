<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'name',
        'email',
        'phone',
        'status',
        'created_at',
        'updated_at'
    ];

    // Pendaftaran dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Pendaftaran untuk satu event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}