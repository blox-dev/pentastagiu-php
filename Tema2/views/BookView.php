<?php


class BookView
{
    public function loadView(string $filename, array $parameters = [])
    {
        if(!is_null($parameters))
            extract($parameters);

        $filename .= '.view.php';

        require($filename);
    }
}