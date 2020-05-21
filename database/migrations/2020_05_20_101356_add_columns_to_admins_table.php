<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            //
            $table->string('category')->nullable();
            $table->string('coupon')->nullable();
            $table->string('product')->nullable();
            $table->string('order')->nullable();
            $table->string('blog')->nullable();
            $table->string('newsletter')->nullable();
            $table->string('seo')->nullable();
            $table->string('report')->nullable();
            $table->string('role')->nullable();
            $table->string('return')->nullable();
            $table->string('contact')->nullable();
            $table->string('review')->nullable();
            $table->string('setting')->nullable();
            $table->integer('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            //
            $table->dropColumn('category');
            $table->dropColumn('coupon');
            $table->dropColumn('product');
            $table->dropColumn('order');
            $table->dropColumn('blog');
            $table->dropColumn('newsletter');
            $table->dropColumn('seo');
            $table->dropColumn('report');
            $table->dropColumn('role');
            $table->dropColumn('return');
            $table->dropColumn('contact');
            $table->dropColumn('review');
            $table->dropColumn('setting');
            $table->dropColumn('type');
        });
    }
}
