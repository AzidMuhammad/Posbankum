<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'type', 'number', 'date', 'description', 'file_path', 'download_count'
    ];

    protected $casts = [
        'date' => 'date',
    ];
}