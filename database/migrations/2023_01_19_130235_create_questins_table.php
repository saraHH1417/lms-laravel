<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questins', function (Blueprint $table) {
            $table->id();
            $table->text("question");
            $table->text("answer");
            $table->unsignedBigInteger("test_id")->nullable();
            $table->timestamps();

            $table->foreign("test_id")
                ->references("id")
                ->on("tests");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questins');
    }
}
