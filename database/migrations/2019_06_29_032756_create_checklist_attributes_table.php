<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('object_id');
            $table->string('object_domain');
            $table->string('due');
            $table->string('description');
            $table->string('is_completed');
            $table->string('completed_at');
            $table->string('task_id');
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
        Schema::dropIfExists('checklist_attributes');
    }
}
