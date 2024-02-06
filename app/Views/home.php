<div class="container">
    <div class="card mb-3 mt-4 border-0" style="max-width: 100%;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?=APPURL?>public/img/home.webp" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">Trải nghiệm mới mẻ cùng TSHOP</h2>
                    <p class="card-text">Thời trang là cách bạn tự biểu hiện mình mà không cần phải nói một lời nào.</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Phần Sản Phẩm -->
    <h1 class="text-center text-uppercase mt-4">Sản phẩm Hot</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach ($ProductHot as $product) : ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?=$product['Anh']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?=$product['TenSP']?></h5>
                        <p><?=number_format($product['Gia'],0,',',',')?>đ</p>
                    </div>
                    <a href="?url=product/detail/<?=$product['MaSP']?>" class="btn btn-outline-success w-100 rounded-0">Xem</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Phần Sản Phẩm -->
    <h1 class="text-center text-uppercase mt-4">Sản phẩm</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach ($ProductLimit as $product) : ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?=$product['Anh']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?=$product['TenSP']?></h5>
                        <p><?=number_format($product['Gia'],0,',',',')?>đ</p>
                    </div>
                    <a href="?url=product/detail/<?=$product['MaSP']?>" class="btn btn-outline-success w-100 rounded-0">Xem</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- End Phần Sản Phẩm -->
</div>

