<?php

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
        });

        $book = new \App\Book([
            'title' => 'Cartea 1',
            'author_id' => 1,
            'publisher_id' => 1,
            'publish_year' => 1999
        ]);

        $book->save();

        $book->newInstance()->fill([
            'title' => 'Cartea 2',
            'author_id' => 2,
            'publisher_id' => 2,
            'publish_year' => 1998])->save();

        $book->newInstance()->fill([
            'title' => 'Cartea 3',
            'author_id' => 3,
            'publisher_id' => 3,
            'publish_year' => 2000])->save();
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
