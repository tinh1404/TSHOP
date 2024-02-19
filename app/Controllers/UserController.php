<?php
class UserController extends CoreController
{
    protected $user;
    public function __construct()
    {
        $this->user = $this->loadModel('User');
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            checkEmail($_POST['email']);
            checkPass($_POST['password']);
            if (empty($_SESSION['Email']) && empty($_SESSION['password'])) {
                $kq = $this->user->login($_POST['email'], md5($_POST['password']));
                if ($kq) {
                    if ($kq['Quyen'] == 'admin') {
                        $_SESSION['admin'] = $kq;
                        header('location:' . APPURL . 'admin/index');
                        return;
                    }
                    $_SESSION['user'] = $kq;
                    header('location: ' . APPURL);
                    return;
                } else {
                    showNoti('Sai email hoặc mật khẩu', "danger");
                }
            }
        }
        $this->loadView('login');
    }
    public function resign()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            checkName($_POST['fullname']);
            checkEmail($_POST['email']);
            checkLike($_POST['email'], 'Email', 'MaTK', $this->user->getUser(), 'Email đã tồn tại');
            checkPass($_POST['password']);
            checkCofirmPass($_POST['ConfirmPass']);
            if (empty($_SESSION['fulname']) && empty($_SESSION['Email'])  && empty($_SESSION['password']) && empty($_SESSION['ConfirmPass'])) {
                $_SESSION['dangky'] = 'Đăng ký tài khoản thành công';
                $this->user->resign($_POST['fullname'], $_POST['email'], md5($_POST['password']));
                header('location: ' . APPURL . 'user/login');
            }
        }
        $this->loadView('resign');
    }
    public function forgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kq =  $this->user->checkMail($_POST['email']);
            if ($kq) {
                //Đúng -> có email -> gửi mail

                $senderName = "TSHOP";
                $senderEmail = "tinhttps30422@fpt.edu.vn";
                $senderEmailPassword = "xovg uqfj azoi dfni";

                $OTP = $this->user->genOTP($_POST['email']);

                $recieverEmail = $_POST['email'];
                $subject = "Thay đổi mật khẩu";
                $body = "Sử dụng mã OTP được cung cấp sau đây để đặt lại mặt khẩu của bạn. Má OTP của bạn là <strong>".$OTP."</strong>. Mã OTP có hiệu lực trong vòng 5 phút.";

                $mailer = new Mail($senderName, $senderEmail, $senderEmailPassword);
                $mailer->sendMail($recieverEmail, $subject, $body);

                header('Location:'.APPURL.'user/resetPassword');
            } else {
                //Sai -> không có email -> báo lỗi
                showNoti("Email vừa nhập không tồn tại!", 'warning');
            }
        }
        $this->loadView('forgotPassword');
    }
    public  function resetPassword() {
        if($_SERVER['REQUEST_METHOD'] =='POST') {
            if($_POST['password'] !== $_POST['password2']) {
                showNoti('Mật khẩu không khớp nhau!','warning');
            }else {
                $kq= $this->user->resetPassword($_POST['password'],$_POST['OTP']);
                if($kq) {
                    showNoti("Mật khẩu đã được thay đổi",'success');
                    header('Location:'.APPURL.'user/login');
                }else {
                    showNoti("Mã OTP không đúng hoặc đã hết hạn",'warning');
                }
            }
        }
        $this->loadView('resetPassword');
    }
    public function logout()
    {
        unset($_SESSION['user']);
        header('location: ' . APPURL);
    }
    public function info()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // move_uploaded_file();
            // print_r(isset($_FILES["avatar"]["tmp_name"]));
            // print_r(!empty($_FILES["avatar"]['tmp_name']));
            checkUploadImg($_FILES['avatar']);
            checkName($_POST['fullname']);
            checkPhone($_POST['phone']);
            if (empty($_SESSION['img'])) {
                move_uploaded_file($_FILES['avatar']['tmp_name'], '..\public\upload\avatar\\' . $_FILES['avatar']['name']);
                $this->user->changeUser($_FILES['avatar']['name'], $_POST['fullname'], $_POST['phone'], $_POST['address'], $_SESSION['user']['MaTK']);
                // header('location: ' . APPURL . 'page/index');
            }
        }
        $_SESSION['user'] = $this->user->getUserId($_SESSION['user']['MaTK']);
        $this->loadView('infouser');
    }
}
