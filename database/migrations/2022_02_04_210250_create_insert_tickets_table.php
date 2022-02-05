<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Ticket;

class CreateInsertTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            [
                'title'=>'Bali 1', 
                'description'=>'Jl. Sunda No.8, Gondangdia, Kec. Menteng, Kota Jakarta Pusat, DKI Jakarta,',
                'stock' => 20,
                'price' => 200000,
                'status' => 10,
            ],
            [
                'title'=>'Jakarta', 
                'description'=>'Jl. Sunda No.8, Gondangdia, Kec. Menteng, Kota Jakarta Pusat, DKI Jakarta,',
                'stock' => 10,
                'price' => 100000,
                'status' => 10,
            ],
            [
                'title'=>'Papua', 
                'description'=>'Jl. Sunda No.8, Gondangdia, Kec. Menteng, Kota Jakarta Pusat, DKI Jakarta,',
                'stock' => 8,
                'price' => 800000,
                'status' => 10,
            ]
        ];

        Ticket::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('insert_tickets');
    }
}
