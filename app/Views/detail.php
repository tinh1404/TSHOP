<div class="container">
    <div class="card mb-3 border-0">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="<?= $ProductDetail['Anh'] ?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h5 class="card-title"><?= $ProductDetail['TenSP'] ?></h5>
                    <p>Số lượng còn: <?= $ProductDetail['SoLuongSP'] ?></p>
                    <p>Giá: <?= number_format($ProductDetail['Gia'], 0, ',', ',') ?>đ</p>

                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="col-md-5 text-start alert alert-warning" role="alert">
                            <?= $_SESSION['success'] ?>
                        </div>
                    <?php endif;
                    unset($_SESSION['success']) ?>
                    <a href="#" class="btn btn-outline-success ">Mua ngay</a>
                    <a href="<?= APPURL ?>product/addToCart/<?= $ProductDetail['MaSP'] ?>" class="btn btn-secondary ">Thêm giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>

    <h2>Mô tả</h2>
    <p><?= $ProductDetail['MoTa'] ?></p>
    <hr>

    <h2>Có thể bạn thích</h2>
    <div class="card-group ">
        <?php foreach ($ProductRandom as $product) : ?>
            <div class="card mx-3 border-0 ">
                <img src="<?= $product['Anh'] ?>" class="card-img-top mx-auto" style="width:70%" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $product['TenSP'] ?></h5>
                    <p><?= number_format($product['Gia'], 0, ',', ',') ?>đ</p>
                </div>
                <a href="<?=APPURL?>product/detail/<?= $product['MaSP'] ?>" class="btn btn-outline-success w-100 rounded-0">Xem</a>
            </div>
        <?php endforeach; ?>
    </div>


</div>
