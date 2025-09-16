<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddNameToConsolesTable extends Migration
{
    public function up()
    {
        Schema::table('consoles', function (Blueprint $table) {
            // ここではまず nullable にして追加（既存データ対応のため安全）
            $table->string('name')->nullable()->after('introduction');
        });

        // 既存レコードに初期値を入れたい場合（任意）
        DB::table('consoles')->whereNull('name')->update(['name' => '未設定']);
    }

    public function down()
    {
        Schema::table('consoles', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
}
