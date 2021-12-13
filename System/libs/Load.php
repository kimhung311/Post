<?php
class Load
{
    public function __construct()
    {
    }
    public function view($filename, $data = false)
    {
        if ($data == false) {
            extract($filename, $data);
        }
        // include('App/View/Home/' . $filename . '.php');
        // include('App/View/' . $filename . '.php');
        include('App/View/Admin/List-admin/' . $filename . '.php');
    }

    public function model($filename)
    {
        include('App/Model/' . $filename . '.php');
        return new $filename();
    }
}