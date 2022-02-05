<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficialReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'payment_type',
        'purchase_date',
        'referrence_no',
        'ticket_id',
        'status'
    ];

    CONST STATUS_PAID = 10;

    /**
     * Get the receipts.
     */
    public function receipts()
    {
        return $this->hasOne(Ticket::class);
    }
}
