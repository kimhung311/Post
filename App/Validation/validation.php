<?php
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        //khai báo mảng error để chứa lỗi 
        $error = [];
        if(empty($_POST['email'])){
            $error['email']['required'] = "Email không được để trống";
        }else{
            if(strlen(trim($_POST['name']))<5){
                $error['name']['min'] = "Email phải lớn hơn 5 ký tự";
            }
        }

        if (empty(trim($_POST['email']))){
            $error['email']['required'] = " Email không được để trống";
        }else{
            if(!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)){
                $error['email']['invaild'] = " Email không hợp lệ";
            }
        }
    echo '<pre>';
    print_r($error);
    echo '</pre>';
    }

?>