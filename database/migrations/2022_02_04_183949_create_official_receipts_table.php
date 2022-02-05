<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficialReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('official_receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('referrence_no')->nullable(false);
            $table->decimal('amount', $precision = 20, $scale = 2)->nullable(false);
            $table->string('payment_type')->nullable(false);
            $table->dateTime('purchase_date', $precision = 0)->nullable(false);
            $table->integer('status')->nullable(false);
            $table->integer('ticket_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('official_receipts', function (Blueprint $table) {
            $table->dropForeign(['ticket_id']);
            $table->dropColumn('ticket_id');
            $table->drop('official_receipts');
        });
    }
}
