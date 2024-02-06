<?php
class AdminModel extends CoreModel {
    public function getUserId($id) {
        return $this->db->pdo_query_one("SELECT * FROM taikhoan WHERE MaTK = ?",$id);
    }
    public function deleteUserId($id) {
        return $this->db->pdo_execute("DELETE FROM taikhoan WHERE MaTK=?",$id);
    }
    public function getCategoryId($id) {
        return $this->db->pdo_query_one("SELECT * FROM danhmuc WHERE MaDM =?",$id);
    }
    public function updateCategory($tendm,$madm) {
        $this->db->pdo_execute("UPDATE danhmuc SET TenDM =? WHERE MaDM=?",$tendm,$madm);
    }
    public function addCategory($tendm) {
        return $this->db->pdo_execute("INSERT INTO danhmuc (`TenDM`) VALUES  (?)",$tendm);
    }
    public function deleteCategory($id) {
        return $this->db->pdo_execute("DELETE FROM danhmuc WHERE MaDM=?",$id);
    }
    // public function checkCategoryInProduct($id) {
    //     return $this->db->pdo_query("SELECT * FROM sanpham sp INNER JOIN danhmuc dm WHERE sp.MaDM=dm.MaDM AND sp.MaDM =?",$id);
    // }
    public function deletProduct($id) {
        return $this->db->pdo_execute("DELETE FROM sanpham WHERE MaSP=?",$id);
    }
}