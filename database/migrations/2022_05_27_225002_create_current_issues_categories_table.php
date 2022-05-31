<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentIssuesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_issues_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_az')->nullable();
            $table->string('name_en')->nullable();
            $table->string('slug_az')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('title_az')->nullable();
            $table->string('title_en')->nullable();
            $table->text('text_az')->nullable();
            $table->text('text_en')->nullable();
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
        Schema::dropIfExists('current_issues_categories');
    }
}
