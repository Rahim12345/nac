<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu_az')->nullable();
            $table->string('menu_en')->nullable();
            $table->string('slug_az')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('src')->nullable();
            $table->string('title_az')->nullable();
            $table->string('title_en')->nullable();
            $table->string('button_az')->nullable();
            $table->string('button_en')->nullable();
            $table->string('link')->nullable();
            $table->string('text_az')->nullable();
            $table->string('text_en')->nullable();
            $table->boolean('default')
                ->default(1)
                ->comment('1 - default, 0 - then added');
            $table->boolean('shown')
                ->default(1)
                ->comment('1 - default, 0 - then hide');
            $table->boolean('parent_id')
                ->default(0)
                ->comment('0 - parent');
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
        Schema::dropIfExists('menus');
    }
}
