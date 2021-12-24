<?php
class CategoryModel  extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function category($categories)
    {
        if (isset($_GET['page']) && !empty($GET['page'])) {
            $currentPage = (int) strip_tags($_GET['page']);
        } else {
            $currentPage = 1;
        }
        $sql = "SELECT COUNT(*) AS id FROM $categories ";
        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        $nbArticles = (int) $result['id'];
        // var_dump($sql);   
        // die();    
        $parPage = 3;
        $pages = ceil($nbArticles / $parPage);
        $premier = ($currentPage  * $parPage) - $parPage;

        $sql = "SELECT * FROM $categories LIMIT  :premier,  :parpage ";

        $query = $this->db->prepare($sql);
        $query->bindValue(':premier', $premier, PDO::PARAM_INT);
        $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        // var_dump($parPage);   

        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
        return $this->db->select($sql); // truyền tham số table vào select()
    }

    public function insertcategory($categories, $data)
    {
        return $this->db->insert($categories, $data);
    }

    public function categorybyid($category, $cond)
    {
        $sql = "SELECT * FROM $category WHERE $cond ";
        return $this->db->select($sql);
    }

    public function updatecategory($categories, $data, $cond)
    {
        return $this->db->update($categories, $data, $cond);
    }

    public function deletecategory($posts, $cond)
    {
        return $this->db->delete($posts, $cond);
    }
}   