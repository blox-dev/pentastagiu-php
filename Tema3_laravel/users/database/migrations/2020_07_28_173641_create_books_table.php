<?php

use App\Book;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('author_id');
            $table->bigInteger('publisher_id');
            $table->integer('publish_year');
            $table->timestamps();

            //$table->foreign('author_id')->references('id')->on('authors');
            //$table->foreign('publisher_id')->references('id')->on('publishers');
        });

        for($i = 0 ; $i<30 ; $i++){

        $book = new Book([
            'title' => 'Cartea '.$i,
            'author_id' => $i%3+1,
            'publisher_id' => $i%3+1,
            'publish_year' => 1900+$i
        ]);

        $book->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
