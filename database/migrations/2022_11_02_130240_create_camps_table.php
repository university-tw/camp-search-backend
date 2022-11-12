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
        Schema::create('camps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('apply_notice')->nullable();
            $table->string('school');
            $table->string('department');
            $table->date('start');
            $table->date('end');
            $table->date('apply_end');
            $table->string('url')->nullable();

            $table->integer('status')->default(0);

            $table->foreignId('created_by')->nullable();

            $table->boolean('recommend')->default(false);
            $table->integer('priority')->default(0);
            $table->json('tags')->nullable();

            $table->text('comment')->nullable();

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
        Schema::dropIfExists('camps');
    }
};
