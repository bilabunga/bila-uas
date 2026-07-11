<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'tagline',
        'description',
        'image',
        'date',
        'location',
        'quota',
        'category_id',
        'user_id',
    ];

    // Event dibuat oleh satu user (admin)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Event memiliki satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Event memiliki banyak pendaftaran
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}