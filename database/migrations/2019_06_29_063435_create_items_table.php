<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('template_id');
            $table->integer('checklist_id');
            $table->integer('assignee_id');            
            $table->string('description');
            $table->string('urgency');
            $table->integer('is_complete');            
            $table->string('due');
            $table->string('due_interval');
            $table->string('due_unit');
            $table->string('created_by');
            $table->timestamps('completed_at');
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
        Schema::dropIfExists('items');
    }
}
