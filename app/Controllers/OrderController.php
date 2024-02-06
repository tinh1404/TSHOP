<?php
class OrderController extends CoreController
{
    protected $order;
    protected $voucher;
    public function __construct()
    {
        $this->order = $this->loadModel('Order');
        $this->voucher = $this->loadModel('Voucher');
    }
    public function addVoucher()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            unset($_SESSION['voucher']);
            $kq = $this->voucher->checkVoucher($_POST['voucher']);
            if ($kq) {
                $this->order->addVoucher($_POST['MaDH'], $_POST['voucher']);
                $_SESSION['voucher'] = $_POST['voucher'];
            }
            header('location: ' . APPURL . 'product/cart');
        }
    }
    public function addOrder() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->order->addOrder($_POST['MaDH'],$_POST['soluong'],$_POST['tongtien']);
            unset($_SESSION['cart']);
            header('location: '.APPURL.'product/cart');
        }
    }
    public function infoBill($url=[],$MaDH=0) {
        if($url == 'cancel') {
            $this->order->cancelBill($MaDH);
            header('Location:'.APPURL.'order/infoBill');
        }
        $data['bills'] = $this->order->getBill($_SESSION['user']['MaTK']);
        $this->loadView('infobill',$data);
    }

}
