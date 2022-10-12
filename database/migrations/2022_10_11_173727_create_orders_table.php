<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('delivery_address_id');
            $table->unsignedBigInteger('invoice_address_id');
            $table->unsignedTinyInteger('status')
                ->default(0);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->restrictOnDelete();
            $table->foreign('delivery_address_id')
                ->references('id')
                ->on('addresses')
                ->restrictOnDelete();
            $table->foreign('invoice_address_id')
                ->references('id')
                ->on('addresses')
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['delivery_address_id']);
            $table->dropForeign(['invoice_address_id']);
        });

        Schema::dropIfExists('orders');
    }
};
