<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('checklist_id');
            $table->string('object_domain');
            $table->string('object_id');            
            $table->string('description');
            $table->string('is_completed')->nullable();
            $table->string('due')->nullable();
            $table->integer('urgency');
            $table->string('completed_at')->nullable();
            $table->string('last_update_by');
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
        Schema::dropIfExists('attributes');
    }
}
