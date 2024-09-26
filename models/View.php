<?php

class View
{
    private $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function getViewData()
    {
        return $this->data;        
    }

    public function render($filePath)
    {
        extract($this->data);

        require_once($filePath); // Now, all extracted variables are available
    }
}
