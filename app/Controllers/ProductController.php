<?php
class ProductController extends CoreController
{
    protected $product;
    protected $order;
    protected $voucher;
    public function __construct()
    {
        $this->product = $this->loadModel('Product');
        $this->order = $this->loadModel('Order');
        $this->voucher = $this->loadModel('Voucher');
    }
    public function detail($id)
    {
        $data['ProductDetail'] = $this->product->getId($id);
        $data['ProductRandom'] = $this->product->getRandom($data['ProductDetail']['MaDM']);
        $this->loadView('detail', $data);
    }
    public function  addToCart($MaSP)
    {
        if (isset($_SESSION['user'])) {
            $MaTK = $_SESSION['user']['MaTK'];
            $cart = $this->order->getCartByUser($MaTK);
            if (!$cart) {
                $this->order->addCart($MaTK);
                $cart = $this->order->getCartByUser($MaTK);
            }
            $this->order->addProduct($cart['MaDH'], $MaSP);
            $_SESSION['success'] = 'Thêm vào giỏ hàng thành công';
            // header('location: '.APPURL.'product/detail/'.$MaSP);
        } else {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            $timthay = false;
            $i = 0;
            foreach ($_SESSION['cart'] as $sp) {
                if ($sp['MaSP'] == $MaSP) {
                    $_SESSION['cart'][$i]['SoLuong']++;
                    $timthay = true;
                    break;
                }
                $i++;
            }
            if (!$timthay) {
                array_push($_SESSION['cart'], [
                    "MaSP" => $MaSP,
                    "SoLuong" => 1
                ]);
            }
            $_SESSION['success'] = 'Thêm vào giỏ hàng thành công';
        }

        header('location: ' . APPURL . 'product/detail/' . $MaSP);
    }

    public function cart($url = [], $id = 0)
    {
        if (empty($cart)) {
            $cart = [];
        }
        if (isset($_SESSION['user'])) {
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                $cart = $this->order->getCartByUser($_SESSION['user']['MaTK']);
                if (!$cart) {
                    $this->order->addCart($_SESSION['user']['MaTK']);
                    $cart = $this->order->getCartByUser($_SESSION['user']['MaTK']);
                };
                $i = 0;
                $CartArr = $_SESSION['cart'];
                foreach ($CartArr as $cartnew) {
                    $this->order->addProductToCart($cart['MaDH'], $cartnew['MaSP'], $cartnew['SoLuong']);
                }
            }
            $cart = $this->order->getProductInCart($_SESSION['user']['MaTK']);
            if (isset($cart[0]['MaGG'])) {
                $data['voucher'] = $this->voucher->getById($cart[0]['MaGG']);
            }
        } else {
            if (!empty($_SESSION['cart'])) {
                $cart = $this->product->getProductInCart($_SESSION['cart']);
                $i = 0;
                foreach ($cart as $item) {
                    if ($url == 'more') {
                        if ($item['MaSP'] == $id) {
                            $_SESSION['cart'][$i]['SoLuong']++;
                            header('location:' . APPURL . 'product/cart');
                        }
                    }
                    if ($url == 'less') {
                        if ($item['MaSP'] == $id) {
                            $_SESSION['cart'][$i]['SoLuong']--;
                            header('location:' . APPURL . 'product/cart');
                        }
                    }
                    if ($url == 'delete') {
                        if ($_SESSION['cart'][$i]['MaSP'] == $id) {
                            unset($_SESSION['cart'][$i]);
                            $_SESSION['cart'] = array_values($_SESSION['cart']);
                            header('location:' . APPURL . 'product/cart');
                        }
                    }
                    $i++;
                }
            }
        }
        $data['cart'] = $cart;

        $this->loadView('cart', $data);
    }
    public function cartItem($MaDH, $MaSP, $loai)
    {

        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                if ($_SESSION['cart'][$i]['MaSP'] == $MaSP) {
                    if ($loai == 'more') {
                        $_SESSION['cart'][$i]['SoLuong']++;
                    } elseif ($loai == 'less') {
                        $_SESSION['cart'][$i]['SoLuong']--;
                    } elseif ($loai == 'delete') {
                        if ($_SESSION['cart'][$i]['MaSP'] == $MaSP) {
                            unset($_SESSION['cart'][$i]);
                            $_SESSION['cart'] = array_values($_SESSION['cart']);
                            header('location:' . APPURL . 'product/cart');
                        }
                    }
                }
            }
            if ($loai == 'more') {
                $this->order->increateItem($MaDH, $MaSP);
            } elseif ($loai == 'less') {
                $this->order->descreateItem($MaDH, $MaSP);
            } elseif ($loai = 'delete') {
                $this->order->deleteProduct($MaSP);
            }
        } else {
            if ($loai == 'more') {
                $this->order->increateItem($MaDH, $MaSP);
            } elseif ($loai == 'less') {
                $this->order->descreateItem($MaDH, $MaSP);
            } elseif ($loai = 'delete') {
                $this->order->deleteProduct($MaSP);
            }
        }
        header('location: ' . APPURL . 'product/cart');
    }

}
