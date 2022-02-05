<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\OfficialReceipt;


class Ticket extends Model
{
    use HasFactory;

    CONST STATUS_ACTIVE = 10;
    CONST STATUS_INACTIVE = 0;
    protected $fillable = [
        'title',
        'description',
        'stock',
        'price'
    ];

    /**
     * Get the receipts.
     */
    public function receipts()
    {
        return $this->hasMany(OfficialReceipt::class);
    }

    public static function decreaseStock($ticket_id) {
        $ticket = Static::find($ticket_id);
        $ticket->stock = $ticket->stock - 1 ;
        $ticket->save();
    }


}
