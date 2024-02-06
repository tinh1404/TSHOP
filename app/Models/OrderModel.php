<?php
class OrderModel extends CoreModel {
    public function getCartByUser($MaTK) {
        return $this->db->pdo_query_one("SELECT * FROM donhang WHERE MaTK =? AND TrangThai='gio-hang'",$MaTK);
    }
    public function addCart($MaTK) {
        return $this->db->pdo_execute("INSERT INTO donhang(`MaTK`) VALUES(?)",$MaTK);
    }
    public function addProduct($MaDH,$MaSP) {
        $kq = $this->hasCart($MaDH,$MaSP);
        if($kq) {
            return $this->db->pdo_execute("UPDATE chitietdonhang SET SoLuong = SoLuong + 1 WHERE MaDH=? AND MaSP=?",$MaDH,$MaSP);
        }else {
            return $this->db->pdo_execute("INSERT INTO chitietdonhang(`MaDH`,`MaSP`) VALUES(?,?)",$MaDH,$MaSP);
        }
    }
    public function hasCart($MaDH,$MaSP) {
        return $this->db->pdo_query_one("SELECT * FROM chitietdonhang WHERE MaDH=? AND MaSP=?",$MaDH,$MaSP);
    }
    public function getProductInCart($MaTK) {
        return $this->db->pdo_query("SELECT dh.MaDH, sp.MaSP,sp.TenSP,sp.Gia,ct.SoLuong,sp.SoLuongSp AS TonKho,sp.Anh,dh.MaGG  FROM donhang dh INNER JOIN chitietdonhang ct ON dh.MaDH=ct.MaDH INNER JOIN sanpham sp ON sp.MaSP=ct.MaSP WHERE dh.MaTK=? AND dh.TrangThai ='gio-hang' ",$MaTK);
    }
    public function deleteProduct($id) {
        return $this->db->pdo_execute("DELETE FROM chitietdonhang WHERE MaSP=?",$id);
    }
    public function increateItem($MaDH,$MaSP) {
        return $this->db->pdo_execute("UPDATE chitietdonhang SET SoLuong = SoLuong+1 WHERE MaDH=? AND MaSP=?",$MaDH,$MaSP);
    }
    public function descreateItem($MaDH,$MaSP) {
        return $this->db->pdo_execute("UPDATE chitietdonhang SET SoLuong = SoLuong-1 WHERE MaDH=? AND MaSP=?",$MaDH,$MaSP);
    }
    public function addVoucher($MaDH,$voucher) {
        return $this->db->pdo_execute('UPDATE donhang SET MaGG=? WHERE MaDH=?',$voucher,$MaDH);
    }
    public function addOrder($MaDH,$soluong,$tongtien) {
        //Chốt đơn
        $this->db->pdo_execute("UPDATE donhang SET SoLuongSP=?,TongTien=?,NgayDat=?,TrangThai='cho-xac-nhan' WHERE MaDH=?",$soluong,$tongtien,date('y-m-d h:i:s'),$MaDH);
        //Chốt giá
        $this->db->pdo_execute("UPDATE chitietdonhang ct SET GiaBan =(
            SELECT Gia FROM sanpham sp WHERE sp.MaSP=ct.MaSP
            ) WHERE MaDH=?",$MaDH);
    }
    public function getBill($MaTK) {
        return $this->db->pdo_query("SELECT * FROM donhang WHERE MaTK=? AND TrangTHai!='gio-hang' ORDER BY MaDH DESC",$MaTK);
    }      
    public function addProductToCart($MaDH,$MaSP,$SoLuong) {
        $kq = $this->hasCart($MaDH,$MaSP);
        if($kq) {
            return $this->db->pdo_execute("UPDATE chitietdonhang SET SoLuong = ?  WHERE MaDH=? AND MaSP=?",$SoLuong,$MaDH,$MaSP);
        }else {
            return $this->db->pdo_execute("INSERT INTO chitietdonhang (`MaDH`,`MaSP`,`SoLuong`) VALUES (?,?,?)",$MaDH,$MaSP,$SoLuong);
        }
    }
    public function cancelBill($MaDH) {
        return $this->db->pdo_execute("UPDATE donhang SET TrangThai='huy-don' WHERE MaDH=?",$MaDH);
    }
    public function getAllBill() {
        return $this->db->pdo_query("SELECT * FROM donhang dh INNER JOIN taikhoan tk ON dh.MaTK=tk.MaTK WHERE dh.TrangThai != 'gio-hang'");
    }
    public function countBill($status) {
        return $this->db->pdo_query("SELECT COUNT(*) AS CountStatus FROM donhang WHERE TrangThai= ?",$status);
    }
    public function billSeen($id) {
        return $this->db->pdo_query("SELECT * FROM chitietdonhang ct INNER JOIN sanpham sp ON ct.MaSP=sp.MaSP WHERE MaDH=?",$id);
    }
    public function billSumit($id,$trangthai) {
        return $this->db->pdo_execute("UPDATE donhang SET TrangThai =? WHERE MaDH=?",$trangthai,$id);
    }
}