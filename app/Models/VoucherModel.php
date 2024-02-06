<?php
class VoucherModel extends CoreModel {
    public function checkVoucher($MaGG) {
        //Kiểm tra có tồn tại?
        $voucher = $this->db->pdo_query_one("SELECT * FROM magiamgia WHERE MaGG=?",$MaGG);
        if(!$voucher) {
            $_SESSION['voucher1'] = 'Mã giảm giá không tồn tại';
            return false;
        }
        //Voucher còn lượt sử dụng?
        if($voucher['SoLuong']<=0) {
            $_SESSION['voucher1'] = 'Mã giảm giá không còn';
            return false;
        }
        //Voucher còn hạn?
        $now = new DateTime();
        if(new DateTime($voucher['NgayBatDau']) <= $now && $now >= new DateTime($voucher['NgayKetThuc'])) {
            $_SESSION['voucher1'] = 'Mã giảm giá không còn hạn sử dụng';
            return false;
        }
        return true;
    }
    public function getById($MaGG) {
        return $this->db->pdo_query_one("SELECT * FROM magiamgia WHERE MaGG=?",$MaGG);
    }
}