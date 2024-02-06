<?php
function checkName($fullname)
{
    if (empty(trim($fullname))) {
        $_SESSION['fullname'] = 'Họ và tên bắt buộc phải nhập';
    } else {
        $pattern = '~^[^\s][^\d!@#$%^&*()_=\-+|.<>?`\~]{4,}[^\s!@#$%^&*()_=\-+|.<>?`\~]$~ui';
        if (!preg_match($pattern, $fullname)) {
            $_SESSION['fullname'] = 'Họ và tên không hợp lệ';
        }
    };
}
function checkEmail($email)
{
    if (empty(trim($email))) {
        $_SESSION['Email'] = 'Email bắt buộc phải nhập';
    } else {
        $pattern = '/^[^\s0-9][a-zA-Z-_#0-9]+@[a-z]{2,}\.[a-z]{2,}+$/';
        if (!preg_match($pattern, $email)) {
            $_SESSION['Email'] = 'Email không hợp lệ';
        }
    };
}
function checkPhone($phone)
{
    if (empty(trim($phone))) {
        $_SESSION['Phone'] = 'Số điện thoại bắt buộc phải nhập';
    } else {
        $pattern = '/^0[0-9]{9}$/';
        if (!preg_match($pattern, $phone)) {
            $_SESSION['Phone'] = 'Số điện thoại không hợp lệ';
        }
    };
}
function checkPass($password)
{
    if (empty(trim($password))) {
        $_SESSION['password'] = 'Password bắt buộc phải nhập';
    } else {
        $pattern = '/^(?=.*[A-Z].*[A-Z])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z])(?=.*[!@#\$%\^\*\(\)-\+]).{8,}$/';
        if (!preg_match($pattern, $password)) {
            $_SESSION['password'] = 'Password yếu yêu cầu lớn hơn 8 kí tự và có 2 kí tự hoa,số và đặc biệt';
        }
    };
}
function checkCofirmPass($password)
{
    if (empty(trim($password))) {
        $_SESSION['ConfirmPass'] = 'Password bắt buộc phải nhập';
    } else {
        if (!($_POST['password'] == $password)) {
            $_SESSION['ConfirmPass'] = 'Password không trùng khớp';
        }
    }
}
function checkLike($post, $nameCheck, $idCheck,$arrs, $text,$id=0)
{
    foreach ($arrs as $arr) {
        if($arr[$idCheck] == $id) {
            if ($arr[$nameCheck] == $post) {
                return;
            }
        }
        if ($arr[$nameCheck] == $post) {
            $_SESSION[$nameCheck] = $text;
        }
    }
}
function showNoti($content, $type)
{
    $_SESSION['noti'] = '<div class="alert alert-' . $type . '" role="alert">
    ' . $content . '
  </div>';
}
function checkNoti()
{
    if (isset($_SESSION['noti'])) {
        echo $_SESSION['noti'];
        unset($_SESSION['noti']);
    }
}
function checkUploadImg($img,$limitData=10000000)
{
    if(!empty($img['tmp_name'])) {
        $check = getimagesize($img["tmp_name"]);
        //Ktra có phải ảnh không
        if ($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            // print_r($check);
        } else {
            $_SESSION['img'] ="File is not an image.";
            return;
        }   
        //Ktra ảnh có trùng 
        if(file_exists('..\public\upload\avatar\\'.$_FILES['avatar']['name'])) {
            $_SESSION['img'] ="Ảnh đã trùng.";
            return;
        }        
        //Ktra size của ảnh
        if($img["size"] > $limitData) {
            $_SESSION['img'] ="Kích thước ảnh quá lớn";
            return;
        }
        //Ktra đuôi ảnh
        $fileType = pathinfo('..\public\upload\avatar\\'.$_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $allowtypes    = array('jng', 'jpeg', 'jpg');
        if(!in_array($fileType,$allowtypes)) {
            $_SESSION['img'] ="Ảnh được upload chỉ có đuôi JPG, JPEG, PNG";
            return;
        }
        // unlink('../public/upload\avatar/'.$_FILES['avatar']['name']);

    }else {
        $_SESSION['img'] ="Chưa chọn ảnh đại diện";

    }
    
}
