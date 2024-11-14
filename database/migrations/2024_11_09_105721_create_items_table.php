<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->constrained();
            $table->string('name');
            $table->text('specification')->nullable();
            $table->tinyInteger('stock');
            $table->string('seri')->nullable();
            $table->string('merk')->nullable();
            $table->fullText(['name', 'specification']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropFullText(['name', 'specification']);
        });
        
        Schema::dropIfExists('items');
    }
};
