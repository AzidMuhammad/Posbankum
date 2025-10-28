<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number', 'name', 'nik', 'phone', 'email', 'address',
        'case_category', 'case_description', 'evidence_file', 'status',
        'admin_response', 'responded_at', 'user_id'
    ];

    protected $casts = [
        'responded_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateTicketNumber()
    {
        $date = now()->format('Ymd');
        $lastTicket = self::whereDate('created_at', now())->latest()->first();
        $number = $lastTicket ? intval(substr($lastTicket->ticket_number, -4)) + 1 : 1;
        return 'POSBANKUM-' . $date . '-' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }
}