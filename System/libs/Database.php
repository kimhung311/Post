<?php
class Database extends PDO
{

    public function __construct($connect, $user, $pass)
    {

        parent::__construct($connect, $user, $pass, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
    }
    public function select($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC)
    {
        $statement = $this->prepare($sql);

        foreach ($data as $key => $value) {
            $statement->bindParam($key, $value);
        }
        $statement->execute();
        return  $statement->fetchAll($fetchStyle);
    }

    public function selectRowOnly($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC)
    {
        $statement = $this->prepare($sql);

        foreach ($data as $key => $value) {
            $statement->bindParam($key, $value);
        }
        $statement->execute();
        return  $statement->fetch($fetchStyle);
    }

    public function insert($table, $data)
    {
        $keys = implode(",", array_keys($data));  // array_key  là các value được   thêm vào , implode thêm vào 1 ký tụ vào chuỗi
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table($keys) VALUES($values)";
        // var_dump($data);
        $statement = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement->execute();
    }

    public function update($table, $data, $cond)
    {
        $updateKeys = NULL;
        foreach ($data as $key => $value) {
            $updateKeys .= "$key = :$key,";
        }
        $updateKeys = rtrim($updateKeys, ",");  // ngắt dất phẩy cuối hàng khi add giá trị
        $sql = "UPDATE $table SET $updateKeys WHERE $cond";
        $statement = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement->execute();
    }

    public function delete($table, $cond, $limit = 1)
    {
        $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
        return $this->exec($sql);
    }


    public function deletePostComment($posts, $comments, $postId)
    {
        $sql = "DELETE $posts.*,$comments.* FROM $posts INNER JOIN $comments ON $posts.id = $comments.post_id WHERE $posts.id = $postId";
        // var_dump($sql); 
        // die();
          // var_dump($sql); ta hén bị ngày chỗ delete post này á tú  ta dùng câu lệnh này trên sql thì ok nhưng khi   xoá trong ni lại ko dc
        // die(); à từ nhầm chỗ
        return $this->exec($sql);
    }

    public function deleteCategory($user,$posts,$categories, $comments, $cond)
    {
        $sql = " DELETE $user.*, $posts.*, $categories.*, $comments.* FROM (($user
            INNER JOIN $posts ON $user.$cond = $posts.user_id)
            INNER JOIN $categories ON $user.$cond = $categories.user_id
            INNER JOIN $comments ON $user.$cond= $comments.user_id) WHERE $user.$cond";
      
        return $this->exec($sql);
    }
    // DELETE posts.*,comments.* FROM posts INNER JOIN comments ON posts.id = comments.post_id WHERE posts.id= 231;
    public function search($table, $name, $value)
    {
        $sql = "SELECT * FROM $table WHERE $name LIKE $value";
        $statement = $this->prepare($sql);
        $statement->execute(array($name, $value));
        return  $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function affectedRows($sql, $email, $password)
    {
        $statement = $this->prepare($sql);
        $statement->execute(array($email, $password));
        return $statement->rowCount();
    }

    public function selectAdmin($sql, $email, $password)
    {
        $statement = $this->prepare($sql);
        $statement->execute(array($email, $password));
        return  $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}