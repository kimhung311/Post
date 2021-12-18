<?php
class Main
{
    public $url;
    public $controllerName = 'login';
    public $methobName = 'index';
    public $controllerPath = 'App/Controller/Admin/';
    public $controller;

    function __construct()
    {
        $this->geturl();
        $this->loadController();
        $this->callMethod();
    }

    public function geturl()
    {
        $this->url = isset($_GET['url']) ? $_GET['url'] : NULL; // nếu có $_GET['url'] thì lấy nó và ngược lại

        if ($this->url != NULL) {
            $this->url = rtrim($this->url, '/'); //  rtrim tự đông cắt cát ký tự dư ở phần cuối dấu / trên thanh url
            $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL)); //explode là phá huỷ:  phá huỷ dấu '/' trong chuỗi url
        } else {
            unset($this->url); //xoá bỏ url
        }
    }
    public function loadController()
    { // check thư mục là class bên trong
        if (!isset($this->url[0])) { // nếu người dùng ko truyền url vào thì mặc định nó sẽ chạy   và ngược lại
            include $this->controllerPath . $this->controllerName . '.php';
            $this->controller = new $this->controllerName();
            $login = new login();   //khởi tạo  đên login
        } else {
            $this->controllerName = $this->url[0];
            $fileName = $this->controllerPath . $this->controllerName . '.php';
            if (file_exists($fileName)) {
                include $fileName;
                if (class_exists($this->controllerName)) { // kiểm tra file và class trong file có tồn tịa hay ko
                    $this->controller = new $this->controllerName();
                }
            }
        }
    }
    public function callMethod()
    { // gọi hàm
        if (isset($this->url[2])) {
            $this->methobName = $this->url[1];
            if (method_exists($this->controller, $this->methobName)) { // kiểm tra sự tổn tại của 1 hàm 
                $this->controller->{$this->methobName}($this->url[2]);
            } else { //nếu ko tồn tại hàm
                header("Location:" . BASE_URL . "admin/notfound");
            }
        } else {
            if (isset($this->url[1])) { // kiểm tra sự tổn tại của 1 hàm 
                $this->methobName = $this->url[1];
                if (method_exists($this->controller, $this->methobName)) {
                    $this->controller->{$this->methobName}();
                } else {
                    header("Location:" . BASE_URL . "admin/notfound");
                }
            } else { //nếu ko tồn tại hàm
                if (method_exists($this->controller, $this->methobName)) {
                    $this->controller->{$this->methobName}();
                } else {
                    header("Location:" . BASE_URL . "admin/notfound");
                }
            }
        }
    }
}