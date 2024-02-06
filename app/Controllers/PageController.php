<?php
class PageController extends CoreController
{
    protected $product;
    public function __construct()
    {
        $this->product = $this->loadModel('Product');
    }
    public function index()
    {
        $data['ProductLimit'] = $this->product->getProductLimit(8);
        $data['ProductHot'] = $this->product->getProductHot(8);
        $this->loadView('home', $data);
    }
    public function about()
    {
        $this->loadView('about');
    }
    public function contact()
    {
        $this->loadView('contact');
    }
    public function product($dm = [], $page = 1)
    {

        $data['ProductCategory'] = $this->product->getCategory();
        // if($id>0) {
        //     $data['ProductCategoryId']= $this->product->getCD($id);
        // }else {
        //     $data['ProductCategoryId']= $this->product->getAll();
        // }
        if (empty($dm)) {
            $data['ProductCategoryId'] = $this->product->getAll();
        } else {

            $data['ProductCategoryId'] = $this->product->pagiPage($dm, $page);
            $data['pagi'] = ceil($this->product->pagi($dm) / 8);
            $data['dm'] = $dm;
            $data['page'] = $page;
        }
        $this->loadView('product', $data);
    }
    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pattern = '/^[^@()&#$%^=\+_]+$/iu';
            $keyword = trim($_POST['search']);
            $result = preg_match($pattern, $keyword);
            if ($result) {
                $search = $this->product->search($keyword);
                // $data['pagi'] = ceil($this->product->pagi($keyword) / 8);
                // $data['page'] = $page;
                if ($search==[]) {
                    $_SESSION['search'] ='Không tìm thấy kết nào';
                }
            } else {
                $search =[];
                $_SESSION['search'] = 'Không tìm thấy kết nào';
            }
        }
        $data['searchProduct'] = $search;
        $this->loadView('searchproduct',$data);
    }
}
