<?php
class post extends DController
{
    public function __construct()
    {
        parent::__construct(); // parent từ cha nó DController
    }
    public function post_detail()
    {
        echo ' chi tiết bài post';
    }
}