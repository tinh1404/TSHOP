<div class="container">
    <!-- Đường dẫn -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= APPURL ?>page/index">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
        </ol>
    </nav>
    <!--End Đường dẫn -->


    <div class="row">
        <div class="col-md-2">
            <h4>Danh mục</h4>
            <div class="list-group list-group-flush">
                <?php foreach ($ProductCategory as $category) : ?>
                    <a href="<?= APPURL ?>page/product/<?= $category['TenDM'] ?>" class="list-group-item list-group-item-action"><?= $category['TenDM'] ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-10">
            <h4>Sản phẩm</h4>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php foreach ($ProductCategoryId as $product) : ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?= $product['Anh'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['TenSP'] ?></h5>
                                <p <p><?= number_format($product['Gia'], 0, ',', ',') ?>đ</p>
                            </div>
                            <a href="<?= APPURL ?>product/detail/<?= $product['MaSP'] ?>" class="btn btn-outline-success w-100 rounded-0">Xem</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination d-flex justify-content-center mt-4">
                    <li class="page-item <?= ($page <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="<?= APPURL ?>page/product/<?= $dm ?>/<?=$page-1?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $pagi; $i++) : ?>
                        <li class="page-item <?= ($page == $i) ? 'active' : ''; ?>">
                            <a class="page-link" href="<?= APPURL ?>page/product/<?= $dm ?>/<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?=($page>=$pagi)?'disabled':'';?>">
                        <a class="page-link" href="<?= APPURL ?>page/product/<?= $dm ?>/<?=$page+1?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</div>