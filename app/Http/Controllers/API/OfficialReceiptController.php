<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OfficialReceipt AS Receipt;
use App\Models\Ticket;
 
use Illuminate\Http\Request;
 
use Validator;
 
class OfficialReceiptController extends Controller
{
    // all Receipts
    public function index()
    {
        $receipts = Receipt::where('status', Receipt::STATUS_ACTIVE)->toArray();
        $code = 404;
        $message = 'Failed';
        $data = [];

        if (!empty($receipts)){
            $code = 200;
            $message = success;
            $data = $receipts;
        }

        $response = response([
            'code' => $code,
            'message' => $message,
            'data' => $receipt
        ]);

        return $response;
    }
 
    // add Receipt
    public function add(Request $request)
    { 
        $payload = json_decode($request->getContent(), true);
        $receipt = new Receipt([
            'amount' => $payload['amount'],
            'ticket_id' => $payload['ticket_id'],
            'referrence_no' => random_int(100000, 999999),
            'status' => Receipt::STATUS_PAID,
            'purchase_date' => date('Y-m-d H:i:s'),
            'payment_type' => $payload['payment_type']
        ]);

        $data = [];
        try {
            $receipt->save();
            $code = 200;
            $message = 'Success';
            $data = $receipt;
            Ticket::decreaseStock($receipt->ticket_id);    
        } catch (\Exception $e) {
            $code = 500;
            $message = $e->getMessage();
        }
 
        return response([
            'data' => $data,
            'message' =>$message,
            'code' => $code
        ]);
    }
}
