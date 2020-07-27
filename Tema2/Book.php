<?php
    class Book{
        public int $id;
        public string $title;
        public Author $author;
        public Publisher $publisher;
        public int $publish_year;
        public string $created_at;
        public string $updated_at;

        public function __construct(string $title, string $author_name, string $publisher_name, $publish_year)
        {
            $this->title = $title;
            $this->publish_year = $publish_year;
            $this->author = new Author($author_name);
            $this->publisher = new Publisher($publisher_name);
        }
    }