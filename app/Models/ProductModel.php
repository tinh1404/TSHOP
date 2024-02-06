<?php
class ProductModel extends CoreModel
{
    public function getALl()
    {
        return $this->db->pdo_query('SELECT MaSP,TenSP,Anh,Gia FROM sanpham');
    }
    public function getProductCategory() {
        return $this->db->pdo_query('SELECT * FROM sanpham sp INNER JOIN danhmuc dm ON sp.MaDM = dm.MaDM');
    }
    public function getProductHot($limit = 6)
    {
        return $this->db->pdo_query('SELECT MaSP,TenSP,Anh,Gia,LuotThich FROM sanpham WHERE LuotThich > 500 ORDER BY LuotThich DESC LIMIT ' . $limit);
    }
    public function getProductLimit($limit = 6)
    {
        return $this->db->pdo_query('SELECT MaSP,TenSP,Anh,Gia FROM sanpham LIMIT ' . $limit);
    }
    public function getId($id)
    {
        return $this->db->pdo_query_one("SELECT * FROM sanpham WHERE MaSP=?", $id);
    }
    public function getCategory()
    {
        return $this->db->pdo_query("SELECT TenDM,MaDM FROM danhmuc");
    }
    public function getCD($id)
    {
        return $this->db->pdo_query("SELECT * FROM sanpham WHERE MaDM=? ", $id);
    }
    public function getRandom($dm)
    {
        return $this->db->pdo_query("SELECT * FROM sanpham WHERE MaDM=? ORDER BY rand() LIMIT 3", $dm);
    }
    public function pagiPage($key, $page = 1)
    {
        $start = ($page - 1) * 8;
        return $this->db->pdo_query("SELECT * FROM sanpham sp INNER JOIN danhmuc dm ON sp.MaDM=dm.MaDM WHERE dm.TenDM LIKE '%$key%' OR sp.TenSP LIKE '%$key%' LIMIT $start,8");
    }
    public function pagi($key)
    {
        return $this->db->pdo_query_value("SELECT COUNT(*) FROM  sanpham sp INNER JOIN danhmuc dm ON sp.MaDM=dm.MaDM WHERE dm.TenDM LIKE '%$key%' ");
    }
    public function getProductInCart($cart)
    {
        if (!empty($cart)) {
            $arrayId = array_column($cart, 'MaSP');
            $arrayIdNew = implode(",", $arrayId);
            $ds = $this->db->pdo_query("SELECT TenSP,SoLuongSP AS TonKho,Anh,TenSP,MaSP,Gia FROM sanpham WHERE MaSP IN($arrayIdNew)");
            return array_map(function ($ds, $cart) {
                return $ds + $cart;
            }, $ds, $cart);
        }
    }
    public function search($keyword) {
        return $this->db->pdo_query("SELECT * FROM sanpham sp INNER JOIN danhmuc dm ON sp.MaDM=dm.MaDM WHERE sp.TenSP LIKE '%$keyword%' OR dm.TenDM LIKE '%$keyword%'");
    }
}
