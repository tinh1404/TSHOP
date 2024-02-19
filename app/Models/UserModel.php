<?php
class UserModel extends CoreModel {
    public function login($email,$pass) {
        return $this->db->pdo_query_one("SELECT * FROM taikhoan WHERE Email=? AND MatKhau=?",$email,$pass);
    }
    public function resign($fullname,$email,$password) {
        return $this->db->pdo_execute("INSERT INTO taikhoan (`HoTen`,`Email`,`MatKhau`,`Quyen`) VALUES (?,?,?,?)",$fullname,$email,$password,'user');
    }
    public function getUser() {
        return $this->db->pdo_query("SELECT * FROM taikhoan");
    }
    public function getUserId($matk) {
        return $this->db->pdo_query_one("SELECT * FROM taikhoan WHERE MaTK=?",$matk);
    }
    public function changeUser($file,$fullname,$phone,$address,$matk) {
        return $this->db->pdo_execute("UPDATE taikhoan SET Anh=?, HoTen=?, Phone=?, DiaChi=? WHERE MaTK=?",$file,$fullname,$phone,$address,$matk);
    }  
    public function checkMail($email) {
        return $this->db->pdo_query_one('SELECT * FROM taikhoan WHERE Email=?',$email);
    }
    public function genOTP($email) {
        $OTP = rand(100000,999999);
        $now = new DateTime();
        $now->add(new DateInterval("PT5M"));
        $HanOTP = $now->format('Y-m-d H:i:s');

        $this->db->pdo_execute('UPDATE taikhoan SET OTP=?, HanOTP=? WHERE Email=?',$OTP,$HanOTP,$email);
        return $OTP;
    }
    public function resetPassword($password,$OTP) {
        //Kiểm tra OTP
        $now = date("Y-m-d H:i:s");
        $kq = $this->db->pdo_query_one('SELECT * FROM taikhoan WHERE OTP =? AND HanOTP>=?',$OTP,$now);
        if($kq) {
            //Còn hạn và đúng OTP
            $this->db->pdo_execute("UPDATE taikhoan SET MatKhau = ? WHERE OTP =? ",$password,$OTP);
            return true;
        }else {
            return false;
        }
    }
}