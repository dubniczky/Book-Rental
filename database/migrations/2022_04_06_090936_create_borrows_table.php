<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reader_id')->
                    unsigned()->
                    foreign()->
                    references('id')->
                    on('users');
            $table->bigInteger('book_id')->
                    unsigned()->
                    foreign()->
                    references('id')->
                    on('books');
            $table->enum('status', [ 'PENDING', 'REJECTED', 'ACCEPTED', 'RETURNED' ]);
            $table->dateTime('request_processed_at')->nullable();
            $table->bigInteger('request_managed_by')->
                    unsigned()->
                    nullable()->                    
                    foreign()->
                    references('id')->
                    on('users');
            $table->dateTime('deadline')->nullable();
            $table->dateTime('returned_at')->nullable();
            $table->bigInteger('return_managed_by')->
                    unsigned()->
                    nullable()->                    
                    foreign()->
                    references('id')->
                    on('users');
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
        Schema::dropIfExists('borrows');
    }
}
