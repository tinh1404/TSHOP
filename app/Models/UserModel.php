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
}