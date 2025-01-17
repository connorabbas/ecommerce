<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lunar\Base\Migration;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table($this->prefix.'carts', function (Blueprint $table) {
            $table->foreignId('customer_id')->after('user_id')
                ->nullable()
                ->constrained($this->prefix.'customers');
        });
    }

    public function down(): void
    {
        Schema::table($this->prefix.'carts', function (Blueprint $table) {
            if ($this->canDropForeignKeys()) {
                $table->dropForeign(['customer_id']);
            }
            $table->dropColumn('customer_id');
        });
    }
};
