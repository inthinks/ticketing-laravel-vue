<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
 
use Illuminate\Http\Request;
 
use Validator;
 
class TicketController extends Controller
{
    // all Tickets
    public function index()
    {
        $tickets = Ticket::where('status', Ticket::STATUS_ACTIVE)->get()->toArray();
        $code = 404;
        $message = 'Failed';
        $data = [];

        if (!empty($tickets)){
            $code = 200;
            $message = 'success';
            $data = $tickets;
        }

        $response = response([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);

        return $response;
    }
 
    // Retrieve Ticket
    public function detail($id, Request $request)
    {
        $ticket = Ticket::find($id);
        $code = 404;
        $message = 'Failed';
        $data = [];

        if ($ticket) {
            $code = 200;
            $message = 'success';
            $data = $ticket;
        }

        $response = response([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);

        return $response;
    }

}
