<?php

class Author
{
    public int $id;
    public string $name;
    public string $created_at;
    public string $updated_at;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}