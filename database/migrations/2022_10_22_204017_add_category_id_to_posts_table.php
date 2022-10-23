<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignIdFor(Category::class)->nullable()->after('id')->constrained()->cascadeOnUpdate()->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeignIdFor(Category::class);
            $table->dropColumn('category_id');
        });
    }
};
