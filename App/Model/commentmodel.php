<?php
// session_start();
class CommentModel  extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function comment($comments)
    {
        $sql = "SELECT * FROM $comments";
        return $this->db->select($sql); // truyền tham số table vào select()
    }

    public function deletecomment($posts, $cond)
    {
        return $this->db->delete($posts, $cond);
    }
}