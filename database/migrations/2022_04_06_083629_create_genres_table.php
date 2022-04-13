<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->enum('style', [
                'primary',
                'secondary',
                'success',
                'danger',
                'warning',
                'info',
                'light',
                'dark'
            ]);
            $table->timestamps();
            $table->softDeletes();
        });

        # Create multi to multi connection table for book and genre
        Schema::create('book_genre', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_id')->
                    unsigned()->
                    foreign()->
                    references('id')->
                    on('books')->
                    onDelete('cascade');
            $table->bigInteger('genre_id')->
                    unsigned()->
                    foreign()->
                    references('id')->
                    on('genre')->
                    onDelete('cascade');
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
        Schema::dropIfExists('genres');
        Schema::dropIfExists('book_genre');
    }
}
