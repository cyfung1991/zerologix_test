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
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->dateTime('created_at');
            $table->softDeletes();
        });

        Schema::create('user_favourited_webinar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('webinar_id')->constrained('webinars')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_webinar', function (Blueprint $table) {
            $table->dropForeign('user_webinar_webinar_id_foreign');
        });
        Schema::dropIfExists('webinars');
        Schema::dropIfExists('user_webinar');
    }
};
