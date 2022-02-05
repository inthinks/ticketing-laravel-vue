<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OfficialReceipt AS Receipt;
 
use Illuminate\Http\Request;
 
use Validator;
 
class TestController extends Controller
{
    // all Receipts
    public function index()
    {
        $receipts = Receipt::where('status', Receipt::STATUS_ACTIVE)->toArray();
        return array_reverse($receipts);
    }
 
    // add Receipt
    public function add(Request $request)
    {
        $Receipt = new Receipt([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);
        $Receipt->save();
 
        return response()->json('The Receipt successfully added');
    }
 
    // edit Receipt
    public function edit($id)
    {
        $receipt = Receipt::find($id);
        return response()->json($receipt);
    }
 
    // update Receipt
    public function update($id, Request $request)
    {
        $receipt = Receipt::find($id);
        $receipt->update($request->all());
 
        return response()->json('The Receipt successfully updated');
    }
 
    // delete Receipt
    public function delete($id)
    {
        $receipt = Receipt::find($id);
        $receipt->delete();
 
        return response()->json('The Receipt successfully deleted');
    }
}
