<?php
class Load
{
    public function __construct()
    {
    }
    public function view($filename, $data = false)
    {
        if ($data == true) {
            extract($data);
        }
        include('App/View/' . $filename . '.php');
        // include('App/View/Home/' . $filename . '.php');
        // include('App/View/Admin/List' . $filename . '.php');

    }

    public function model($filename)
    {
        include('App/Model/' . $filename . '.php');
        return new $filename();
    }
}
?>
