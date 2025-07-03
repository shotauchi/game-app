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
        Schema::table('games', function (Blueprint $table) {
            // 外部キー制約がある場合は先に削除
            if (Schema::hasColumn('games', 'console_id')) {
                $table->dropColumn('console_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->unsignedBigInteger('console_id')->nullable();
            // 必要に応じて外部キー制約も復元
            // $table->foreign('console_id')->references('id')->on('consoles')->onDelete('cascade');
        });
    }
};
