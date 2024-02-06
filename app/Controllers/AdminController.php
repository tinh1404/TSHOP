<?php
class AdminController extends CoreController
{
    protected $admin;
    protected $user;
    protected $product;
    protected $order;
    public function __construct()
    {
        $this->admin = $this->loadModel('Admin');
        $this->user = $this->loadModel('User');
        $this->product = $this->loadModel('Product');
        $this->order = $this->loadModel('Order');
    }
    public function index()
    {
        $data['billProducts'] = $this->order->getAllBill();
        $data['StatusGH'] = $this->order->countBill('gio-hang');
        $data['StatusAccept'] = $this->order->countBill('cho-xac-nhan');
        $data['StatusStart'] = $this->order->countBill('chuan-bi-hang');
        $data['CountGo'] = $this->order->countBill('dang-giao-hang');
        $data['CountSuccess'] = $this->order->countBill('giao-thanh-cong');
        $data['CountCancel'] = $this->order->countBill('huy-don');
        $this->loadView('admin',$data);
    }
    public function logout()
    {
        unset($_SESSION['admin']);
        header('location: ' . APPURL);
    }
    public function category($url = [], $id = 0)
    {

        if ($url == 'edit') {
            $this->categoryedit($id);
            return;
        } elseif ($url == 'add') {
            $this->categoryadd($id);
            return;
        } elseif ($url == 'delete') {
            print_r($id);
            $this->categorydelete($id);
            return;
        }
        $data['categoryList'] = $this->product->getCategory();
        $this->loadView('categoryAdmin', $data);
    }
    public function categoryedit($id)
    {
        $category =$this->admin->getCategoryId($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            checkLike($_POST['category'], 'TenDM', 'MaDM', $this->product->getCategory(), 'Tên danh mục  đã tồn tại', $id);
            
            if(empty($_SESSION['TenDM'])) {
                $this->admin->updateCategory($_POST['category'],$category['MaDM']);
                header('location: '.APPURL.'admin/category');
            }
        }

        $data['categoryId'] = $category;
        $this->loadView('categoryAdminEdit', $data);
    }
    public function categoryadd($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['category'])) {
                $_SESSION['TenDM'] = 'Tên danh mục không được để trống';
            }
            checkLike($_POST['category'], 'TenDM', 'MaDM', $this->product->getCategory(), 'Tên danh mục  đã tồn tại', $id);
        }
        if (empty($_SESSION['TenDM'])) {
            if (isset($_POST['category'])) {
                $this->admin->addCategory($_POST['category']);
                header('location:' . APPURL . 'admin/category');
            }
        }
        $this->loadView('categoryAdminAdd');
    }
    public function categorydelete($id)
    {
        $this->admin->deleteCategory($id);
        header('location:'.APPURL.'admin/category');
    }
    public function bill($url=[],$id=0,$trangthai='cho-xac-nhan')
    {
        if($url=='approve') {
            $this->billSeen($id,$trangthai);
            return;
        }elseif ($url=='seen') {
            $this->billSeenLast($id);
            return;
        }elseif ($url=='submit') {
            $this->order->billSumit($id,$trangthai);
            header('location:'.APPURL.'admin/bill');
        }
        $data['billProducts'] = $this->order->getAllBill();
        $this->loadView('billAdmin',$data);
    }
    public function billSeen($id,$trangthai) {
        $data['billSeen'] = $this->order->billSeen($id);
        $data['trangthai'] =$trangthai;
        $this->loadView('billSeen',$data);
    }
    public function billSeenLast($id) {
        $data['billSeen'] = $this->order->billSeen($id);
        $this->loadView('billSeenLast',$data);
    }
    public function product($url = [], $id = 0)
    {
        if ($url === 'edit') {
            $this->productedit($id);
            return;
        } elseif ($url == 'add') {
            // $this->categoryadd($id);
            return;
        } elseif ($url == 'delete') {
            $this->productdelete($id);
            return;
        }
        $data['getProducts'] = $this->product->getProductCategory();
        $this->loadView('productAdmin',$data);
    }
    public function productedit($id)
    {
        // $category =$this->admin->getCategoryId($id);
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     checkLike($_POST['category'], 'TenDM', 'MaDM', $this->product->getCategory(), 'Tên danh mục  đã tồn tại', $id);
            
        //     if(empty($_SESSION['TenDM'])) {
        //         $this->admin->updateCategory($_POST['category'],$category['MaDM']);
        //         header('location: '.APPURL.'admin/category');
        //     }
        // }

        // $data['categoryId'] = $category;
        $data['product'] = $this->product->getId($id);
        $data['danhmuc'] = $this->product->getCategory();
        $this->loadView('productAdminEdit',$data);
    }
    public function productdelete($id)
    {
        $this->admin->deletProduct($id);
        header('location:'.APPURL.'admin/product');
    }
    public function user($url = [], $id = 0)
    {
        if ($url === 'edit') {
            $this->useredit($id);
            return;
        } elseif ($url === 'delete') {
            $this->userdelete($id);
            return;
        } elseif ($url === 'add') {
            $this->useradd();
            return;
        }
        $data['userAll'] = $this->user->getUser();
        $this->loadView('userAdmin', $data);
    }
    public function useredit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            checkUploadImg($_FILES['avatar']);
            checkName($_POST['fullname']);
            checkEmail($_POST['email']);
            checkLike($_POST['email'], 'Email', 'MaTK', $this->user->getUser(), 'Email đã tồn tại', $id);
            checkPhone($_POST['phone']);
            checkLike($_POST['phone'], 'Phone', 'MaTK', $this->user->getUser(), 'Số điện thoại đã tồn tại', $id);
            checkPass($_POST['password']);
        }
        $data['userId'] = $this->admin->getUserId($id);
        $this->loadView('userAdminEdit', $data);
    }
    public function userdelete($id)
    {
        $this->admin->deleteUserId($id);
        header('location:' . APPURL . 'admin/user');
    }
    public function useradd()
    {

        $this->loadView('userAdminAdd');
    }
    public function voucher() {
        $this->loadView('voucherAdmin');
    }
}
