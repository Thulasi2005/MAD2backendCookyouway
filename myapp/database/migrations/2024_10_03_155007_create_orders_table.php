<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('address'); // To store the address
            $table->text('description')->nullable(); // Additional description
            $table->string('delivery_option'); // Delivery option (Delivery or Self Pickup)
            $table->decimal('total_amount', 10, 2); // Total amount
            $table->string('token'); // Identifier for the user or session
            $table->string('status')->default('pending'); // Order status
            $table->boolean('is_completed')->default(false); // Completion status
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
