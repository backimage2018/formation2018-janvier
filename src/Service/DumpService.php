<?php
namespace App\Service;

class DumpService
{

    public function _construct()
    {}

    public function dump($message)
    {
        echo "<pre>";
        var_dump($message);
        echo "</pre>";
    }
}
?>