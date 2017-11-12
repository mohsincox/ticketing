<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Ticket extends Model
{
    protected $table = 'tickets';

    public function ticketType()
    {
        return $this->belongsTo(TicketType::class);
    }

    public function ticketStatus()
    {
        return $this->belongsTo(TicketStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
