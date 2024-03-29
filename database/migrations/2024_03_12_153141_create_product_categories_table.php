<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->uuid("category_id")->primary()->nullable()->default(Str::uuid());
            $table->string("name");
            $table->timestamps();
        });


        Schema::table("products", function (Blueprint $table) {
            $table->foreignUuid("category_id")->nullable()->references("category_id")->on("product_categories")->nullOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
