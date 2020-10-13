<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersContactHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers_contact_histories', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_id');
            $table->date('contact_date')->nullable();
            $table->string('contact_type')->nullable();
            $table->string('contact_summary')->nullable();
            $table->string('meeting_agenda')->nullable();
            $table->string('meeting_notes')->nullable();
            $table->string('meeting_actions')->nullable();
            $table->string('meeting_decisions')->nullable();
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
        Schema::dropIfExists('suppliers_contact_histories');
    }
}
