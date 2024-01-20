<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loans', function( Blueprint $table ){
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('institution_id')->unsigned();
            $table->foreign('institution_id')->references('id')->on('institutions');
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('number')->nullable();
            $table->string('description')->nullable();
            $table->date('opened_at')->nullable();
            $table->decimal('interest_rate', 5, 3)->default(0);
            $table->decimal('remaining_balance', 10, 3)->default(0);
            $table->decimal('original_balance', 10, 3)->default(0);
            $table->decimal('payment_amount', 10, 3)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
