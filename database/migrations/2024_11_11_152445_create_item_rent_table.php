<?php

use App\Models\Item;
use App\Models\Rent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_rent', function (Blueprint $table) {
            $table->foreignIdFor(Item::class)->constrained();
            $table->foreignIdFor(Rent::class)->constrained();
            $table->tinyInteger('qnt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_rent');
    }
};
