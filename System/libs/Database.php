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

    public function delete($table, $cond, $limit = 1 ){
        $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
        return $this->exec($sql);
    }

    public function search($table, $name, $value){
        $sql = "SELECT * FROM $table WHERE $name LIKE $value";
        $statement = $this->prepare($sql);
        $statement->execute(array($name, $value));
        return  $statement->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function affectedRows($sql, $email, $password){
        $statement = $this->prepare($sql);
        $statement->execute(array($email, $password));
        return $statement->rowCount(); 
    }

    public function selectadmin($sql, $email, $password){
        $statement = $this->prepare($sql);
        $statement->execute(array($email, $password));
        return  $statement->fetchAll(PDO::FETCH_ASSOC);

    }
}
?>