<?php
        // Code PHP xử lý validate
    $error = array();
    $data = array();
    if (!empty($_POST['contact_action']))
    {
        // Lấy dữ liệu
        $data['fullname'] = isset($_POST['fullname']) ? $_POST['fullname'] : '';
        $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
        $data['content'] = isset($_POST['content']) ? $_POST['content'] : '';

        // Kiểm tra định dạng dữ liệu
        require('./validate.php');
        if (empty($data['fullname'])){
            $error['fullname'] = 'Bạn chưa nhập tên';
        }

        if (empty($data['email'])){
            $error['email'] = 'Bạn chưa email';
        }
      

        if (empty($data['content'])){
            $error['content'] = 'Bạn chưa nhập nội dung';
        }

        // Lưu dữ liệu
        if (!$error){
            echo 'Dữ liệu có thể lưu trữ';
            // Code lưu dữ liệu tại đây
            // ...
        }
        else{
            echo 'Dữ liệu bị lỗi, không thể lưu trữ';
        }
    }