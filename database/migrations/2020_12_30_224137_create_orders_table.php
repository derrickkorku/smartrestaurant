<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->foreignId('user_id');
            $table->boolean('is_take_away')->default(false);
            $table->string('note')->nullable();
            $table->decimal('total', 10,2);
            $table->decimal('tax', 10,2)->default(0.00);
            $table->decimal('sub_total', 10,2);
            $table->enum('status', ['new', 'received', 'processed', 'delivered', 'paid'])->default('new');
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
        Schema::dropIfExists('orders');
    }
}
